"use strict";

function modify(e)
{
    e.target.parentNode.children[1].innerHTML = "Chaine modifiée"
    // alert(e.type +" on modify for "+ e.currentTarget.parentNode.id+" !");
}

function deleter(event)
{
    event.target.parentNode.remove();
    // alert(e.type +" on remove for "+ e.currentTarget.parentNode.id+" !");
}

document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("addNew").addEventListener("click", function(e){
        alert(e.type +" on add !");
        var Div = e.target.parentNode;
        var newDiv = Div.cloneNode()
        newDiv.setAttribute("id", "user3")
        Div.parentNode.appendChild(newDiv);
    });
    
    let modifiers = document.getElementsByClassName("modify");
    Array.from(modifiers).forEach(m => m.addEventListener("click",modify));

    let remover = document.getElementsByClassName("remove");
    Array.from(remover).forEach(m => m.addEventListener("click",deleter));
});

/*(m.parentNode.children[1])*/