//print the values of the selected row in textfields
$(document).ready(function () {
  $(".modifC").on("click", function () {
    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    console.log(data);
    $("#idCourrier").val(data[0]);
    $("#refexp").val(data[1]);
    $("#ref").val(data[2]);
    $("#objet").val(data[3]);
    //$('#fiche').text(data[4]);
    $("#dtrecu").val(data[5]);
    $("#dtajout").val(data[6]);
    $("#expediteur").val(data[7]);
    $("#sexpediteur").val(data[8]);
    $("#nature").val(data[9]);
    $("#typecourrier").val(data[10]);
    $("#motscle").val(data[11]);
    $("#observation").val(data[12]);
  });

  //button affecter affectation.php
  $(".affect").on("click", function () {
    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    //console.log(data);
    $("#courrier").val(data[0]);
  });

  //button modifier sur la table  affectation.php
  $(".modifCour").on("click", function () {
    $tr = $(this).closest("tr");
    var data = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();
    //console.log(data);
    $(".idaffect").val(data[0]);
    $(".courrier").val(data[1]);
    $("#services").val(data[2]);
    $("#personnes").val(data[3]);
    $("textarea#instructions").val(data[4]);
  });

  //hide logo on changing the width of screen
  $(window).resize(function () {
    if ($(this).width() < 600) {
      $(".logo").hide();
    } else {
      $(".logo").show();
    }
  });
});
