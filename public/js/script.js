$(window).scroll(function() {

  //获取滚动条的高度
  var scrollTop = $(this).scrollTop();
  //获取一个屏幕的高度
  var windowHeight = document.body.clientHeight;

  console.log("div本身的高度:" + $('#rightdiv').height());
  console.log("距离顶部的的位置" + scrollTop);

  //把需要的div滚动到底部就固定div不让移动了
  if (scrollTop > $('#rightdiv').height() - windowHeight) {
    $("#rightdiv").css("position", "fixed"); //固定div让其不随着滚动条的滚动而滚动
    $("#rightdiv").css("bottom", "10px");
  } else {
    $("#rightdiv").css("position", "static"); //恢复div可以跟随滚动条滚动
  }

});