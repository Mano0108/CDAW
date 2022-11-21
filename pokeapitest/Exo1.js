"use strict";

document.body.style.backgroundColor = "green";

let Elements = document.getElementsByClassName("descr");

for(var i = 0; i < Elements.length; i++){
    Elements[i].style.backgroundColor = "red";
}

//let Elements = document.getElementById("caroussel").style.backgroundColor = "red";

/*for (var element in Elements){
    element.style.backgroundColor = "red";
}*/