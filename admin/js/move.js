$(document).ready(function() {
  $("#move").click(function() {
    var imgs = $(".move."+$(".move_img select").val()+" img");
    var mlist = [];
    for (var i = 0; i < imgs.length; i++) {
      mlist.push($(imgs[i]).attr("src").split("?")[0]);
    }
    $(".move_list").val(mlist);
  });
});
