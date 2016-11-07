

function test(){
    console.log("accueil est lancé");
}

// var numbers = fetch('http://127.0.0.1:8000/api/numbers/');

// jQuery.when(
//     jQuery.getJSON('http://127.0.0.1:8000/api/numbers/')
// ).done( function(json) {
//     for(var i= 0; i < json.number.length;i++)
//         console.log(json.number[i].title+", film = "+json.number[i].film);
//
// });


function getData(){

    jQuery.when(
        jQuery.getJSON('http://127.0.0.1:8000/api/numbers/')
    ).done( function(json) {
        var numbers = [];
        for(var i= 0; i < json.number.length;i++)
            numbers.push(json.number[i].film);
        console.log(numbers);

        $(".searchFilm").keyup(function(){
            var input = $(this).val();
            // $(".findFilm").html(input);
            if( $.inArray(input, numbers) > -1)
            {
                $(".findFilm").html(input);
            }
        });

        return numbers;
    });
}

var all = getData();

// $(".searchFilm").keyup(function(){
//     var numbers = [];
//     var input = $(this).val();
//
//     //
//     // $(".findFilm").html(input);
// })

console.log("numbers ="+all);
test();