function indexProgressBar(pid) {
    console.log("indexProgressBar");
    var getPercent = document.getElementById(pid).dataset.percent / 100;
    var getProgressWrapWidth = $('.progress-wrap').width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 2500;
    // on page load, animate percentage bar to data percentage length
    // .stop() used to prevent animation queueing
    $('#'+pid+' .progress-bar').stop().animate({left: progressTotal}, animationLength);
}
