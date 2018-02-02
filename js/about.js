$(document).ready(function () {
  resize();
  $(window).resize(function(){
    resize();
  })
})
function resize() {
  if($(window).width() > 768){
  var cntwidth = $(".about-cnt").width() - 5 ;
  var imgwidth = (cntwidth / 2) - 50;
  $(".about-cnt").removeAttr('style');
  if($(window).width() <= 1060){
    $("#ira").width(imgwidth);
    $("#ira").height(imgwidth);
    $("#houses").width(imgwidth);
    $("#houses").height(imgwidth);
  } else {
    $(".desc-img img").removeAttr('style');
  }
  $("#houses").insertBefore("#ira");
  var iraw = $("#ira").width();
  var irao = $("#ira").offset().left;
  $(".description").width(iraw);
  $(".description").css("margin-left",irao-230);
} else {
  $(".about-cnt").width($(window).width()-50)
  var cntwidth = $(".about-cnt").width() - 5;
  var imgwidth = (cntwidth);
  $(".description").width(cntwidth);
  $(".description").css("margin-left",0);
  $(".desc-img img").width(imgwidth);
  $(".desc-img img").height(imgwidth);
  $("#houses").width(imgwidth);
  $("#houses").height(imgwidth);
  $("#houses").insertAfter(".description")
}
}
