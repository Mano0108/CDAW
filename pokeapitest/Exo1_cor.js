"use strict";

function changeBackgroundColor(e){
    e.style.background = "red";
}

document.addEventListener("DOMContentLoaded", function(){
    document.body.style.backgroundColor = "green";
    let htmlCollectionOfParagh = document.getElementsByClassName('descr');
    Array.from(htmlCollectionOfParagh).forEach(element =>{
        changeBackgroundColor(element);
    });
});