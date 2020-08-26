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

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false
        }).then(stream => {
            preview.srcObject = stream;
            preview.captureStream = preview.captureStream || preview.mozCaptureStream;
        })
    };
}