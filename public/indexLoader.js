var listeningTo = document.getElementById(categoryButton)
var display = document.getElementById(category)
var displayContainer = document.getElementById(container)

listeningTo.addEventListener("click", manipulate)

function manipulate(){
    displayContainer.style.display("block");
    display.style.display("block");
}


