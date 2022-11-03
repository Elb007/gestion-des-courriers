$(document).ready(function(){

// Mise à jour des notifications dans la vue à l'aide d'ajax
function load_new_notification(vue = '')
{
 $.ajax({
  url:"get_notif.php",
  method:"POST",
  data:{vue:vue},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);

   if(data.new_notification > 0)
   {
    $('.count').html(data.new_notification);
   }
  }
 });
}
load_new_notification();

// Soumettre le formulaire et récupérer les nouveaux enregistrements
$('#notify_form').on('submit', function(event){
 event.preventDefault();

 if($('#sujet').val() != '' && $('#message').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"insert.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#notify_form')[0].reset();
    load_new_notification();
   }
  });
 }
 else
 {
  alert("Les deux champs sont obligatoires");
 }
});

// Charger les nouvelles notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_new_notification('yes');
});

setInterval(function(){
 load_new_notification();;
}, 4000);

});