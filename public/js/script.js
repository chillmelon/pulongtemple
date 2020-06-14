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

function porgressCircle() {
    console.log("progressCircle");
    var percent = $(".water").data("percent");
    var topDistant = 105 - percent + "%";
    console.log(topDistant);
    $(".water").css("top", topDistant);
}