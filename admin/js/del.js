var list = new Array();
$(document).ready(function() {
  $("#del").click(function() {
    $(".del_list").val(list);
    list = [];
  });
});
function select(img){
  var src = $(img).attr("src");
  var index = list.indexOf(src);
  if(index == -1){
      list.push(src);
      $(img).css("border","solid lime 3px");
  } else {
      list.splice(index,1);
      $(img).css("border","none");
  }
}
