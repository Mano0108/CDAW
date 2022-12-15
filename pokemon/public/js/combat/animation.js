'use strict';



function prompt(text){
    $('#dialog-text span').text(text);
    var spanWidth = $('#dialog-text span').width();
    $('#dialog-text').animate( { width: spanWidth +50 }, 500);
}

$(window).ready(function () {
    var ii = 0;
    prompt(data[0][1]);
});

