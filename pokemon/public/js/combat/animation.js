'use strict';

var ii = 0;

function prompt(text){
    $('#dialog-text').width("0");
    $('#dialog-text span').text(text);
    var spanWidth = $('#dialog-text span').width();
    $('#dialog-text').animate( { width: spanWidth +50 }, 500);
}

$(window).ready(function () {
    prompt(data[0][1]);
    $('button').click(function(event) {
        event.stopPropagation();
    });
    
    $('body').click(function (e) { 
        e.preventDefault();
        ii = ii + 1;
        if(ii >= count - 1){
            $('button').css('display', 'block');
        }
        prompt(data[ii][1]);
    });
});


