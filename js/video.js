(() => {
    //video start

    //variables
    console.log("JS is running");

    const player = document.querySelector('video');
    const videoControls = document.querySelector('#video-controls');
    const playButton = document.querySelector('#play-button');
    const pauseButton = document.querySelector('#pause-button');
    const stopButton = document.querySelector('#stop-button');

    player.controls = false;
    videoControls.classList.remove('hidden');
    videoControls.style.display = 'flex';

    //functions

    function playVideo() {
        console.log("play called");
        player.play();
    }

    function pauseVideo() {
        console.log("pause called");
        player.pause();
    }

    function stopVideo() {
        console.log("stop called");
        player.pause();
        player.currentTime = 1;
    }

    //event listeners

    playButton.addEventListener("click", playVideo);
    pauseButton.addEventListener("click", pauseVideo);
    stopButton.addEventListener("click", stopVideo);

    //video end
})();