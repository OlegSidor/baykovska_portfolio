$(document).ready(function() {
  $(".buttons button").click(function() {
    $(".functions form").css("display","none");
    $("."+$(this).attr("id")).css("display","block");
  });
  $(".folder").change(function(){
    var clas = $(this).val();
    var funk = $(this).attr("funk");
    $("."+funk).css("display","none");
    $("."+clas).css("display","block");
    list = [];
  })
  $(".move").sortable({revert: true});
});
