////////////////////////////////
$(document).ready(function() {
  $.post("/admin/php/login.php" , {type:"autologin"} , function(data) {
    if(data != ""){
    $("html body").append(data)
    $(".sel").change(function() {
      adesc = 0;
      $("div.desc").empty();
      $(".confirmbtn").remove();
      $("button#descbtn").text("Показати");
      $("div.delete_list").empty();
      $(".confirmbtn").remove();
      $("button#deletebtn").text("Показати");
      action = 0;
      $("div.custom").empty();
      $(".save").remove();
      $("button#cstmbtn").text("Показати");
      cact = 0;
    });
    $(".loginform").css("display","none");
  }
  });
});
////////////////////////////////
function login() {
var login = $("#login").val();
var pass = $("#pass").val();
var stay = $("#stay").prop("checked") ? "true":"false";
$.post("/admin/php/login.php" , {type:"login",pass:pass,login:login,stay:stay},function(data) {
  if(data != "error"){
    $("html body").append(data)
    $(".loginform").css("display","none");
  } else {alert("Не правильний логін або пароль")};
});
}

////////////////////////////////
function exit() {
$.post("/admin/php/login.php" , {type:"exit"} , function() {
  window.location = "/";
})
}
////////////////////////////////
function loadF() {
  if($("#folder").val() == "portfolio" || $("#folder").val()=="sketchbook/img" || $("#folder").val()=="publication/img"){
  var file_ROW = $("#file").prop("files");
  for (var i = 0; i < file_ROW.length; i++) {
    var file = $("#file").prop("files")[i];
    if (file["type"] == "image/jpeg" || file["type"] == "image/png") {
var formD = new FormData;
formD.append("img",file);
formD.append("folder",$("#folder").val());
$.ajax({
    url: '/admin/php/loadfile.php',
    data: formD,
    processData: false,
    contentType: false,
    type: 'POST',
    success: function (data) {
        if (data == "_success_") {
          $(".success").text("Файл/и успішно завантажені");
          $(".success").css("color","#3bf948");
          $("input#file").val("");
          setTimeout(function() {
            $(".error").remove();
            $(".success").text("");
            $(".error").remove();
          }, 5000);
        } else {
 $(".info").append("<span class='error'>Помилка при завантажені "+file["name"]+"</span>");
          $(".error").css("color","#f90068");
            setTimeout(function() {
            $(".error").remove();
            $(".success").text("");
            $(".error").remove();
          }, 5000);
        }
    }
});
} else {
        $(".info").append("<span class='error'>Помилка при завантажені "+file["name"]+"</span>");
          $(".error").css("color","#f90068");
            setTimeout(function() {
            $(".error").remove();
            $(".success").text("");
            $(".error").remove();
          }, 5000);
}
}
}
}
////////////////////////////////
var action = 0;
function simg() {
  if($("#folder").val() == "portfolio" || $("#folder").val()=="sketchbook/img" || $("#folder").val()=="publication/img"){
  switch (action) {
    case 0:
    if(typeof sessionStorage["admin_dell_"+$("#folder").val()] == "undefined"){
    $.post("/admin/php/deleteimg.php", {list:"",folder:$("#folder").val()},function (data) {
      var img = JSON.parse(data);
      sessionStorage["admin_dell_"+$("#folder").val()] = JSON.stringify(img);
      $("div.delbtn").append("<button class='confirmbtn' onclick='delet()'>Видалити</button>")
      for (var i = 1; i < img.length; i++) {
        $("div.delete_list").append("<img onclick='dellimg(this)' src='/"+$("#folder").val()+"/"+img[i]+"?"+Math.random()+"' alt='...'>");
      }
})
} else {
  var img = JSON.parse(sessionStorage["admin_dell_"+$("#folder").val()]);
  $("div.delbtn").append("<button class='confirmbtn' onclick='delet()'>Видалити</button>")
  for (var i = 1; i < img.length; i++) {
    $("div.delete_list").append("<img onclick='dellimg(this)' src='/"+$("#folder").val()+"/"+img[i]+"?"+Math.random()+"' alt='...'>");
  }
}
    $("button#deletebtn").text("Заховати");
    action = 1;
      break;
      case 1:
      $("div.delete_list").empty();
      $(".confirmbtn").remove();
      $("button#deletebtn").text("Показати");
      action = 0;
      break;
    default: action = 0;

  }
}
}
var imgs = [];
function delet() {
  if($("#folder").val() == "portfolio" || $("#folder").val()=="sketchbook/img" || $("#folder").val()=="publication/img"){
  if(imgs.length >0){
    var confirmation = confirm("Видалити вибрані файли?");
    if(confirmation){
    for (var i = 0; i < imgs.length; i++) {
      var img = imgs[i];
    var src_raw = img.src;
    var src = src_raw.substr(src_raw.indexOf($("#folder").val()),src_raw.length);
    $.post("/admin/php/deleteimg.php", {delete:src.split('?')[0],folder:$("#folder").val()},function (data) {
      if(data == "_success_"){
        $("div.delete_list").empty();
        $(".confirmbtn").remove();
        $("button#deletebtn").text("Показати");
        action = 0;
        $(".error").remove();
          $(".success").text("Файли успішно видалено");
          $(".success").css("color","#3bf948");
            setTimeout(function() {
            $(".error").remove();
            $(".success").text("");
            $(".error").remove();
          }, 5000);
      }else {
        $("div.delete_list").empty();
        $(".confirmbtn").remove();
        $("button#deletebtn").text("Показати");
        action = 0;
        $(".error").remove();
        $(".info").append("<span class='error'>Помилка при видаленні "+src_raw+"</span>");
          $(".error").css("color","#f90068");
            setTimeout(function() {
            $(".error").remove();
            $(".success").text("");
            $(".info").not('.success').empty();
          }, 5000);
      }
    })
  }
  }
  imgs.splice(0,imgs.length);
  $("button#deletebtn").text("Показати");
action = 0;
$("div.delete_list").empty();
$(".confirmbtn").remove();
}
}
}
////////////////////////////////
function dellimg(img) {
  if($(img).css("border") == "3px solid rgb(13, 229, 28)"){
    $(img).css("border","solid 1px black");
    imgs.splice(imgs.indexOf(img),1);
  } else {
$(img).css("border","3px solid #0de51c");
imgs.push(img);
  }
}
//////////////////////////////////
var cact = 0;
$(document).ready(function() {
  $(document).resize(function() {
resz();
  });
});
var fold;
function cstmshow(){
  if($("#folder").val() == "portfolio" || $("#folder").val()=="sketchbook/img" || $("#folder").val()=="publication/img"){
  switch (cact) {
    case 0:
    var img;
    $(document).ready(function(){
      if(typeof sessionStorage["admin_cstmshow_"+$("#folder").val()] == "undefined"){
      $.post("/php/loadimgs.php",{page:$("#folder").val()},function(data){
        sessionStorage["admin_cstmshow_"+$("#folder").val()] = JSON.stringify(JSON.parse(data));
        img=JSON.parse(data);for(var i=0;i<img.length;i++){$("div.custom").append("<img class='sortimg'>")}show();
      })
    } else{
        img=JSON.parse(sessionStorage["admin_cstmshow_"+$("#folder").val()]);for(var i=0;i<img.length;i++){$("div.custom").append("<img class='sortimg'>")}show();
    }
      ;})
    function show(){var imgs=$(".custom img");var sortingar=[];for(var i=0;i<img.length;i++){sortingar.push(parseInt(img[i]));}img=sortingar.sort(CompareForSort);for(var i=0;i<imgs.length;i++){var imag=$(imgs[i]);imag.attr("src","/"+$("#folder").val()+"/"+img[i]+".png?"+Math.random());}}function CompareForSort(first,second){if(first==second)return 0;if(first<second)return-1;else return 1;}
    $(".custom").sortable({revert: true});
    $("button#cstmbtn").text("Заховати");
    $(".savebtn").append("<button class='save' onclick='savec()'>Зберегти</button>");
    cact = 1;
    break;
    case 1:
    $("div.custom").empty();
    $(".save").remove();
    $("button#cstmbtn").text("Показати");
    cact = 0;
    break;
  }
}
}
////////////////////////////////
function savec(){
  var number=[];
  var source =[];
  var imgs=$(".custom img");
  for(var i=0;i<imgs.length;i++){
    number.push(i);
    source.push($(imgs[i]).attr("src").split('?')[0]);
  }
  $.post("php/custom.php",{number:number,source:source,folder:$("#folder").val()},function(data){
    if(data == "__OK__"){
    $(".success").text("Все переміщено.");
    $(".success").css("color","#3bf948");
    setTimeout(function() {
      $(".error").remove();
      $(".success").text("");
      $(".error").remove();
    }, 5000);
  } else {
    $(".info").append("<span class='error'>Можливо не всі файли переміщено</span>");
    $(".error").css("color","#f90068");
    setTimeout(function() {
      $(".error").remove();
      $(".success").text("");
      $(".error").remove();
    }, 5000);
  }
    cact = 0;
    $("div.custom").empty();
    $(".save").remove();
    $("button#cstmbtn").text("Показати");
  });
}
////////////////////////////////////
var adesc = 0;
function desc(){
   if($("#folder").val() == "portfolio" || $("#folder").val()=="sketchbook/img" || $("#folder").val()=="publication/img"){
    switch (adesc) {
      case 0:
      if(typeof sessionStorage["admin_dell_publication/img"] == "undefined"){
      $.post("/admin/php/deleteimg.php", {list:"",folder:"publication/img"},function (data) {
        var img = JSON.parse(data);
        sessionStorage["admin_dell_publication/img"] = JSON.stringify(img);
        $("div.desc_savebtn").append("<button class='confirmbtn' onclick='save_desc()'>Видалити</button>")
        for (var i = 1; i < img.length; i++) {
          $("div.desc").append("<img onclick='set_desc(this)' src='/publication/img/"+img[i]+"?"+Math.random()+"' alt='...'>");
        }
  })
} else {
  var img = JSON.parse(sessionStorage["admin_dell_publication/img"]);
  $("div.desc_savebtn").append("<button class='confirmbtn' onclick='save_desc()'>Видалити</button>")
  for (var i = 1; i < img.length; i++) {
    $("div.desc").append("<img onclick='set_desc(this)' src='/publication/img/"+img[i]+"?"+Math.random()+"' alt='...'>");
  }
}
      $("button#descbtn").text("Заховати");
      adesc = 1;
        break;
        case 1:
        $("div.desc").empty();
        $(".confirmbtn").remove();
        $("button#descbtn").text("Показати");
        adesc = 0;
        break;
      default: adesc = 0;

    }
  }
}
///////////////////////////////////////
function set_desc(i){
   var raw_name = $(i).attr("src");
   raw_name = raw_name.substr(17,raw_name.length);
   var name = raw_name.split("?")[0].split(".")[0];
   var text = prompt("Текс для описання", "");
   if(text != "" && text != null){
   $.post("/admin/php/description.php",{name:name,text:text},function(data){
     $(".success").text("Готово.");
     $(".success").css("color","#3bf948");
     setTimeout(function() {
       $(".error").remove();
       $(".success").text("");
       $(".error").remove();
     }, 5000);
     adesc = 0;
     $("div.desc").empty();
     $(".confirmbtn").remove();
     $("button#descbtn").text("Показати");
   })
 }
}
