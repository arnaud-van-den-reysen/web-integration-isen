//Wait to run your initialization code until the DOM is fully loaded. This is needed
// when wanting to access elements that are later in the HTML than the <script>.
if(document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', afterLoaded);
} else {
    //The DOMContentLoaded event has already fired. Just run the code.
    afterLoaded();
}

function afterLoaded() {
    //Your initialization code goes here. This is from where your code should start
    //  running if it wants to access elements placed in the DOM by your HTML files.
    //  If you are wanting to access DOM elements inserted by JavaScript, you may need
    //  to delay more, or use a MutationObserver to see when they are inserted.
    let preview = document.getElementById("preview");

    let recordingTimeMS = 5000;

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false
        }).then(stream => {
            preview.srcObject = stream;
            preview.captureStream = preview.captureStream || preview.mozCaptureStream
            return new Promise(resolve => preview.onplaying = resolve);
        }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
        .then (recordedChunks => {
            let recordedBlob = new Blob(recordedChunks, { type: "video/webm" });
            
            let formData = new FormData();
            formData.append('video', recordedBlob);
            //fetch('videos', {method: "POST", headers: { "Content-type": "video/webm" }, body: formData});

            xhr('videos/php/upload_video.php', formData, function (fName) {
                console.log("Video succesfully uploaded !");
            });

            function xhr(url, data, callback) {
                var request = new XMLHttpRequest();
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        callback(location.href + request.responseText);
                    }
                };
                request.open('POST', url);
                request.send(data);
            }
            console.log("UPLOAD BORDEL!")
        })
    };
}

function startRecording(stream, lengthInMS) {
    let recorder = new MediaRecorder(stream);
    let data = [];

    recorder.ondataavailable = event => data.push(event.data);
    recorder.start();

    let stopped = new Promise((resolve, reject) => {
        recorder.onstop = resolve;
        recorder.onerror = event => reject(event.name);
    });

    let recorded = wait(lengthInMS).then(
        () => recorder.state == "recording" && recorder.stop()
    );

    return Promise.all([
        stopped,
        recorded
    ])
    .then(() => data);
}

function wait(delayInMS) {
    return new Promise(resolve => setTimeout(resolve, delayInMS));
}
