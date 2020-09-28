$(document).ready(function (e){

  $('#sec').click(function (){
      $('#InsertFormMain input[type="checkbox"]').attr("checked",true);
  });

    $('#kaldir').click(function (){
        $('#InsertFormMain input[type="checkbox"]').attr("checked",false);
    });


    $('#sec').click(function (){
        $('#UpdateFormMain input[type="checkbox"]').attr("checked",true);
    });

    $('#kaldir').click(function (){
        $('#UpdateFormMain input[type="checkbox"]').attr("checked",false);
    });

})