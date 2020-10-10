$(function(){
  $("#church").hide();
  $("#explainmedical").hide();
  $("#statusyes").on('click',function() {
    var varCheckValue=$("input[name='ordainedstatus']:checked").val();
    if (varCheckValue=="Yes") {
      $("#church").show();
      $("#statusno").prop("checked", false);
    }else {
      $("#church").hide();
    }
  });

  $("#statusno").on('click',function() {
    $("#church").hide();
    $("#statusyes").prop("checked", false);
  });

  $("#medicalyes").on('click',function() {
    var varCheckValue=$("input[name='medicalstatus']:checked").val();
    if (varCheckValue=="Yes") {
      $("#explainmedical").show();
      $("#medicalno").prop("checked", false);
    } else {
      $("#explainmedical").hide();
    }
  });

  $("#medicalno").on('click',function() {
    $("#explainmedical").hide();
    $("#medicalyes").prop("checked", false);
  });

});
