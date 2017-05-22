//Visualisation surnommée MelViz

function viz_mediane(container, data, nbCsp) {

$("#"+container).html('');


//var width = document.getElementById(container).style.width;
var width = document.getElementById(container).getBoundingClientRect().width/nbCsp;

var height = document.getElementById(container).getBoundingClientRect().height;

for (var i = 0; i < nbCsp; i++) {

var tip1 = d3.tip()
.attr('class', 'd3-tip')
.offset([-10, 0])
.html(
"<strong>Average :</strong> <span>" + data[i].all_items + "%</span>"
);


var tip2 = d3.tip()
.attr('class', 'd3-tip')
.offset([-10, 0])
.html("<strong>For this person :</strong> <span>" + data[i].one_item + "%</span>"
);


var div = d3.select("#"+container).append("div")
.style("width", width+"px")
.attr("height", height)
.style("display", "inline-block");



var p = div.append("p")
.style("width", width+"px")
.text(data[i].label);


var svg = div.append("svg")
.attr("width", width)
.attr("height", height);

svg.call(tip1);
svg.call(tip2);



var ligne = svg.append("rect")
.attr("width", width/2)
.attr("height", 5)
.attr("x", width/4)
.attr("y", height - (parseInt(height)/100)*data[i].all_items)
.on('mouseover', tip1.show)
.on('mouseout', tip1.hide);


var diff = (data[i].one_item-data[i].all_items)*5;
var circleColor;
if(diff > 0) {
circleColor="#00cc00";
} else {
circleColor="#ff0000";
}
var rayon = 5;


var circle = svg.append("circle")
.attr("r", rayon)
.attr("transform", "translate(" + parseInt(width)/2 + ", " + (height - (parseInt(height)/100)*data[i].one_item) + ")")
.style("fill", circleColor)
.on('mouseover', tip2.show)
.on('mouseout', tip2.hide);
}

}