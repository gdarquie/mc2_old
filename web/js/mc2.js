function test(){
	console.log("La fonction test de mc2.js a bien été lancée");
}

function myParallax(){
	$('.parallax').parallax();
}


//Ajout de fonctions pour jquery
jQuery.fn.displaytable = function() {

    var max = 10;
    var mytable = $(this);

	if (typeof dtable == 'undefined')
	{
		dtable = 0;
	}

    $('.displaytable').hide();
	if(this.next(".showall").length == 0){
        $(this).after('<p class="center cursor showall"></p>');
	}
    var mybutton = mytable.next('p');

    if(dtable == 0){

		$('.displaytable tr').each(
			function(index){
				if(index > max){
					$(this).hide();
				}
			}
		);
        mybutton.text('Show all');
    }
    else{
        $('.displaytable tr').fadeIn();
        mybutton.html('Hide');
	}

    $('.displaytable').fadeIn();

};


$(document).ready(function() {
	myParallax();
	$(".displaytable").displaytable();
    $(".tablesorter").tablesorter(); // tablesorter.js
    $('select').material_select();
	$('textarea').trigger('autoresize');
	$('.datepicker').pickadate({
		//selectMonths: true, // Creates a dropdown to control month
		selectYears: 15 // Creates a dropdown of 15 years to control year
	});

    $(".showall").click(function(){

    	console.log(dtable);
        if(dtable == 0){
            dtable = 1;
        }
        else
		{
			dtable = 0;
		}

        console.log("dtable = "+dtable);
        $(".displaytable").displaytable();
    })

});


