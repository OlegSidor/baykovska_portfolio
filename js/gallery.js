$(document).ready(function(){$(window).resize(function(){if(opn)sizing();})
$(".gallery-bg").click(function(){showimg();})
$(".gallery").mouseenter(function(){$(".navbuttns").animate({opacity:"0.9"},500)})
$(".gallery").mouseleave(function(){$(".navbuttns").animate({opacity:"0"},500)})})
function sizing(){$(".top").not(".navbuttns img").width($(window).width()/1.6);while($(".top").height()>$(window).height()-100){$(".top").width($(".top").width()-1);}$(".gallery").width($(".top").width())
$(".gallery").height($(".top").height())
$(".gallery").css("left",($(window).width()/2)-($(".gallery").width()+20)/2);$(".gallery").css("top",($(window).height()/2)-(($(".gallery").height()+20)/1.9));$(".navbuttns").width($(".gallery").width());$(".navbuttns button").css("margin-top",($(".navbuttns").height()/2-$(".navbuttns button").height())+20)
$(".gallery-bg").height($("body").height())
$(".gallery-bg").width($("body").width())}var opn;function showimg(img){if($(window).width()>=768){var toping=$(img).clone(img).appendTo(".images");$(toping).addClass("top");var allnext=$(img).parent().parent().nextAll().children().children();$(allnext).clone().appendTo(".images");var indexofopn=$(img).parent().parent().index()
for(var i=0;i<indexofopn;i++){$("#content .image:eq("+i+")").children().children().clone().appendTo(".images");}$(".gallery img").attr("onClick","");$(".")
openglr();sizing();}else{opn=true;openglr();}}function openglr(){opn=opn?false:true;if(opn){$("html *").not(".gallery-bg,.gallery,.gallery *").css("z-index","-1");$("html").css("overflow","hidden");$('.gallery-bg').css("display","block");$('.gallery').css("display","block");}else{$("html *").css("z-index","auto");$("html").css("overflow","auto");$('.gallery-bg').css("display","none");$('.gallery').css("display","none");$(".images").empty();}}function previmg(){img=$(".gallery img.top");if($(".images img:first").attr("class")=="top"){prev=$(".images img:eq("+($("#content img").length-1)+")");prev.addClass("top");img.removeClass("top");}prev=img.prev();prev.addClass("top");img.removeClass("top");sizing();}function nextimg(){img=$(".gallery img.top");next=img.next();next.addClass("top");img.removeClass("top");if(!next.length){next=$(".images img:first");next.addClass("top");}sizing();}
