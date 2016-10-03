console.log("Fonction widget");


$("#tc_widget input").change(function(){

//            var value = $(this).val();
    var tc_hour  = $( "#tc_hour").val();
    var tc_min  = $( "#tc_min").val();
    var tc_sec  = $( "#tc_sec").val();

    var tc_total = (tc_hour*3600) + (tc_min*60) + (tc_sec*1);

    $("#number_shots").val(tc_total);

    console.log(tc_hour*3600);
})
