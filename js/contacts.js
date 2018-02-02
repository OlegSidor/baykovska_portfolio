function submited() {
  $(".contact-form button").prop( "disabled", false );
}
function info(text,color){
  $("#info span").text(text);
  $("#info span").css("color",color);
}
var name;
var email;
var Subject;
var Message;
$(document).ready(function() {
  $(".contact-form button").click(function () {
    if(grecaptcha.getResponse() != ""){
      name = $("#name").val();
      email = $("#email").val();
      Subject = $("#Subject").val();
      Message = $("#Message").val();
      if(name != "" && email != "" && Subject != "" && Message != ""){
        if($("#email").val().indexOf("@") != -1){
          $.post("/php/contacts.php",{name:name,email:email,subject:Subject,message:Message},function(data){
            if(data == "__OK__"){
              grecaptcha.reset()
              info("Message sent successfully","lime");
              $("#name").val("");
              $("#email").val("");
              $("#Subject").val("");
              $("#Message").val("");
            } else {
              grecaptcha.reset()
              info("Send error","red");
              $("#name").val("");
              $("#email").val("");
              $("#Subject").val("");
              $("#Message").val("");
            }
          })
        }else  info("Enter the correct email","red");
    } else {
      info("Fill all fields","red");
    }
    } else {
      alert("Recaptcha error. Please reload page and try again.");
    }
  });
});
