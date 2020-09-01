let recordingTimeMS = 5000;


function log(msg) {
    //logElement.innerHTML += msg + "\n";
}

function wait(delayInMS) {
    return new Promise(resolve => setTimeout(resolve, delayInMS));
}

function startRecording(stream, lengthInMS) {
    let recorder = new MediaRecorder(stream);
    let data = [];

    recorder.ondataavailable = event => data.push(event.data);
    recorder.start();
    log(recorder.state + " for " + (lengthInMS/1000) + " seconds...");

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

function stop(stream) {
    stream.getTracks().forEach(track => track.stop());
}

startButton.addEventListener("click", function() {
    navigator.mediaDevices.getUserMedia({
        // Pour déterminer si on prend la caméra et/ou la vidéo
        video: true,
        audio: false
    }).then(stream => {
            //On créer un bouton invisible qui capturera et servira a Download la vidéo
            var downloadButton = URL.createObjectURL(blob);
            document.body.appendChild(downloadButton);
            downloadButton.style = "display: none";
            downloadButton.href = stream;
            //ça je crois que c'est à la fin de la capture
            return new Promise(resolve => preview.onplaying = resolve);
          }).then(() => startRecording(preview.captureStream(), recordingTimeMS))
          .then (recordedChunks => {
            let recordedBlob = new Blob(recordedChunks, { type: "video/webm" });

            //on fait une URL avec les données vidéos
            recording.src = URL.createObjectURL(recordedBlob); 
            //que l'on ajoute a downloadButton et on clique sur le bouton pour forcer le DL après je crois que ça ne sauvegarde pas
            downloadButton.href = recording.src;
            downloadButton.download = "RecordedVideo.webm";
            downloadButton.click();
            window.URL.revokeObjectURL(recording.src);

            log("Successfully recorded " + recordedBlob.size + " bytes of " +
                recordedBlob.type + " media.");
          })
          .catch(log);
    }, false);

    window.onbeforeunload = function(){
        myfun();
        
      };


        // navigator.mediaDevices.getUserMedia -> to get the video & audio stream from user
        // MediaRecorder (constructor) -> create MediaRecorder instance for a stream
        // MediaRecorder.ondataavailable -> event to listen to when the recording is ready
        // MediaRecorder.start -> start recording
        // MediaRecorder.stop -> stop recording (this will generate a blob of data)
        // URL.createObjectURL -> to create a URL from a blob, which we use as video src

        var recorder, liveStream;

        window.onload = function () {
        // get video & audio stream from user
        navigator.mediaDevices.getUserMedia({
            audio: false,
            video: true
        })
        .then(function (stream) {
            liveStream = stream;
            recorder = new MediaRecorder(liveStream);

            recorder.addEventListener('dataavailable', onRecordingReady);

            recordButton.disabled = true;
            stopButton.disabled = false;

            recorder.start();
            });
        };
        
        window.onbeforeunload = function(){
            recorder.stop();
          };
        
