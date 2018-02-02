$(document).ready(function(){
$(window).resize(function(){if(opn)sizing(); mobdesc()})
$(".gallery-bg").click(function(){showimg();})
$(".gallery").mouseenter(function(){$(".navbuttns").animate({opacity:"0.9"},500)})
$(".gallery").mouseleave(function(){$(".navbuttns").animate({opacity:"0"},500)})
$(".image").append("<div class='mob-desc'><span></span></div>");
mobdesc();
})
function sizing(){$(".top").not(".navbuttns img").width($(window).width()/1.6);while($(".top").height()>$(window).height()-100){$(".top").width($(".top").width()-1);}$(".gallery").width($(".top").width())
$(".gallery").height($(".top").height())
$(".gallery").css("left",($(window).width()/2)-($(".gallery").width()+20)/2);$(".gallery").css("top",($(window).height()/2)-(($(".gallery").height()+20)/1.9));$(".navbuttns").width($(".gallery").width());$(".navbuttns button").css("margin-top",($(".navbuttns").height()/2-$(".navbuttns button").height())+20)
$(".gallery-bg").height($("body").height())
$(".gallery-bg").width($("body").width())}var opn;function showimg(img){
if($(window).width()>=768){var topimg=$(img).clone(img).appendTo(".images");$(topimg).addClass("top");desc();var allnext=$(img).parent().parent().nextAll().children().children();$(allnext).clone().appendTo(".images");$(".images span").remove();var indexofopn=$(img).parent().parent().index()
for(var i=0;i<indexofopn;i++){$("#content .image:eq("+i+")").children().children().clone().appendTo(".images");}$(".gallery img").attr("onClick","")
openglr();sizing();}else{opn=true;openglr();}}function openglr(){opn=opn?false:true;if(opn){$("html *").not(".gallery-bg,.gallery,.gallery *").css("z-index","-1");$("html").css("overflow","hidden");$('.gallery-bg').css("display","block");$('.gallery').css("display","block");}else{$("html *").css("z-index","auto");$("html").css("overflow","auto");$('.gallery-bg').css("display","none");$('.gallery').css("display","none");$(".images").empty();}}function previmg(){img=$(".gallery img.top"); ;if($(".images img:first").attr("class")=="top"){prev=$(".images img:eq("+($("#content img").length-1)+")");prev.addClass("top");img.removeClass("top");}prev=img.prev();prev.addClass("top");img.removeClass("top");sizing();desc();$(".images span").remove();}function nextimg(){img=$(".gallery img.top");next=img.next();next.addClass("top");img.removeClass("top");if(!next.length){next=$(".images img:first");next.addClass("top");}sizing();desc();$(".images span").remove();}
function desc(){
  var i = $(".top");
   var raw_name = $(i).attr("src");
   raw_name = raw_name.substr(17,raw_name.length);
   var name = raw_name.split("?")[0].split(".")[0];
  if(typeof sessionStorage["data_publication"] == "undefined"){
   $.post("/php/publication.php",{name:name},function(data){
     console.log(JSON.parse(data));
     var text = JSON.parse(data);
     $(".desc").text(text[parseInt(name)]);
     sessionStorage["data_publication"] = JSON.stringify(JSON.parse(data));
   })
 } else {
  var text = JSON.parse(sessionStorage["data_publication"]);
   $(".desc").text(text[parseInt(name)]);
 }
}
function mobdesc(){
  if($(window).width() <= 768){
    if(typeof sessionStorage["data_publication"] == "undefined"){
      $.ajax({
   type: "POST",
   url: "/php/publication.php",
   data: {name:name},
   success: function(data){
     sessionStorage["data_publication"] = JSON.stringify(JSON.parse(data));
     for (var i = 0; i < $(".mob-desc").length; i++) {
       var im = $(".image a img")[i];
        var raw_name = $(im).attr("src");
        raw_name = raw_name.substr(17,raw_name.length);
        var name = raw_name.split("?")[0].split(".")[0];
        var text = JSON.parse(data);
       $($(".mob-desc span")[i]).text(text[parseInt(name)]);
     }
   },
   async: false
 });
    } else {
      var text = JSON.parse(sessionStorage["data_publication"]);
      for (var i = 0; i < $(".mob-desc").length; i++) {
        var im = $(".image a img")[i];
         var raw_name = $(im).attr("src");
         raw_name = raw_name.substr(17,raw_name.length);
         var name = raw_name.split("?")[0].split(".")[0];
        $($(".mob-desc span")[i]).text(text[parseInt(name)]);
    }
  }
} else {
  $(".mob-desc span").text("");
}
}
