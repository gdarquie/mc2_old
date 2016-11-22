

var newsV027 ="<h3>A new toy with V0.2.7</h3><p>Here a new search engine for celebrating the 700+ numbers :-)</p><p>For finding a film, just write 3 successive or more letters of its title, in the input text field just on the left of this message. For exemple \"Jazz\".</p><p>Tell me if you have problem dealing with it.</p><p>New version soon. GLHF!</p>";

var news = '<h3>Patch V0.2.8 | List of modifications</h3><li>Results for "search a movie" are just under the input field (bug corrected)</li><li>Graph "Number of films by year" : number of numbers added</li><li>First Version of "How To" and "About" pages</li>';

//<li>Graph "Number of films with number by year" </li>


function test(){
    console.log("accueil est lancé");
}


function getInput(){
    input = $("#findMovie").val();
    $("#searchMovie").html() = "pio";
}


$("#searchMovie").keyup(function(){
    input = $("#searchMovie").val();

    var selection = [];

    jQuery.when(
        jQuery.getJSON('/api/films/')
    ).done(function (json){

        if (input.length > 2){
            for(var i= 0; i < json.films.length;i++){
                // if(input == json.films[i].title)

                str = json.films[i].title;

                str = str.toLowerCase();
                input = input.toLowerCase();

                if (str.indexOf(input)> -1)
                {
                    // console.log(input+"ca marche"+json.films[i].title);
                    res = json.films[i];
                    selection.push(res);
                    // console.log(selection);
                }
            }
        }


    if (selection.length > 0){

        $("#results").html("<div class='col s12'><h2>Result(s)</h2></div>");
        for(var i = 0; i < selection.length ; i++){
                txt = "<div class='card col s4'><h3>"+selection[i]['title']+" ("+selection[i]['released']+")"+"</h3><a href='/editor/film/id/"+selection[i]['filmId']+"/number/new' class='btn teal'>Add a number</a><a href='/film/id/"+selection[i]['filmId']+"' class='teal btn'>See the description</a></div>";
                $("#results").append(txt);
        }
    }
    else{
        displayNews(news);
    }

    });
});

function displayNews(x){
    $("#findMovie").html(x);
}

displayNews(news);


