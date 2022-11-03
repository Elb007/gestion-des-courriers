//form validation Login
$(document).ready(function () {
    let user = $("#username");
    let pwd = $("#pwd");

    $("#btnLogin").click(function (event) {
        if (user.val() == "" || pwd.val() == "") {
            event.preventDefault();
            event.stopPropagation();
        }
        if (user.val() == "") {
            user.css("border", "#dc3545 solid 1px");
            $("#userEmpty").show();
        }
        if (pwd.val() == "") {
            pwd.css("border", "#dc3545 solid 1px");
            $("#pwdEmpty").show();
        }
    });

    user.keypress(function () {
        user.css("border", "");
        $("#userEmpty").hide();
    });
    pwd.keypress(function () {
        pwd.css("border", "");
        $("#pwdEmpty").hide();
    });
});

// Get the input field
// let input = document.getElementById("username");

// // When the user presses any key on the keyboard, run the function
// input.addEventListener("keyup", function (event) {
//   // If "caps lock" is pressed, display the warning text
//   if (event.getModifierState("CapsLock")) {
//     alert("on");
//   } else {
//     alert("off");
//   }
// });
// focus out
// $('#txt').on('blur',()=>{
//     if($('#txt').val().length == 0){
//       $('#txt').css("border","red 1px solid")
//       $('#error').show();
//     }
// })
// $('#txt').on('keyup',function() {
//   if ($('#txt').val().length === 0) {
//         $('#txt').css("border","red 1px solid")
//         $('#error').show();
//     // variable resetting here
//   }
// })

//displaying messages while user is typing
// function errorMsg(selector,color,mssg){
//     selector.text(mssg);
//     selector.css("color",color);
// }
// $('#txt').on('keyup',()=>{

//   if($('#txt').val().length <= 7){
//     errorMsg($('#error'),"orange","weak");
//   }else{
//     errorMsg($('#error'),"green","good");
//   }
//   if($('#txt').val().length == 0 )
//   {
//     errorMsg($('#error'),"red","ce champs est obligatoire");
//   }
// })
