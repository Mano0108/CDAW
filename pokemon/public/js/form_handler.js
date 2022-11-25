"use strict";

$(document).ready(function () {
    $('input').on("change", function (e) {
        console.log(e.target);
    });
    
    $('#form1').on("submit", function (e) {
        console.log(e.currentTarget.elements[0].value);
    });
});