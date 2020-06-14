function moveProgressBar(pid) {
    console.log("moveProgressBar");
    var getPercent = document.getElementById(pid).dataset.percent / 100;
    var getProgressWrapWidth = $('.progress-wrap').width();
    var progressTotal = getPercent * getProgressWrapWidth;
    var animationLength = 2500;
    // on page load, animate percentage bar to data percentage length
    // .stop() used to prevent animation queueing
    console.log(progressTotal);
    console.log('#'+pid+' .progress-bar');
    $('#'+pid+' .progress-bar').stop().animate({left: progressTotal}, animationLength);
}
