var page = sessionStorage["page"];var img;$(document).ready(function(){
  if(typeof sessionStorage["data_" + page] == "undefined"){
$.ajax({
type: "POST",
url: "/php/loadimgs.php",
data: {page:page},
success: function(data){display(data)},
async: false
});
} else {
  display(sessionStorage["data_" + page]);
}
});
$(window).resize(function(){changewidthandpos();})
function show(){var imgs=$(".image a img");var sortingar=[];for(var i=0;i<img.length;i++){sortingar.push(parseInt(img[i]));}img=sortingar.sort(CompareForSort);for(var i=0;i<imgs.length;i++){var imag=$(imgs[i]);imag.attr("src",page+"/"+img[i]+".png?"+Math.random())}}function CompareForSort(first,second){if(first==second)return 0;if(first<second)return-1;else
return 1;}function changewidthandpos(){if($(window).width()>768){var wid=$("div.cnt").width();var imgc=Math.floor(wid/350);$(".cnt").width($(window).width()-350)}else{$(".cnt").attr("style","");}}
var l = 0;
function load(){
    l++;
  if($(".image a img").length == l){
        $("#content img").css("display","block");
        if(page == "/publication/img"){
            $(".mob-desc").css("display","block");
      }
      $(".load").css("display","none");
        $("#content img").removeAttr("onload");
    } else{
      $(".load").css("display","block");
    }
  }
  function display(data){
    img=JSON.parse(data);
    for(var i=0;i<img.length;i++)
      {
      $("div#content").append("<div class='image'><a><img onload='load();' onClick='showimg(this)'></a></div>")
      }
    changewidthandpos();
    show();
    sessionStorage["data_" + page] = data;
  }
