document.getElementById("logoImg").onclick = function() {
    window.location = "index.php";
}

document.getElementById("submitOrder").onclick = function() {
    window.location = "checkout.php";
}

document.getElementById("customTaco").onclick = function() {
    window.location = "customtaco.php";
    console.log('test');
}

document.getElementById("editOrder").onclick = function() {
    window.location = "index.php";
    console.log('test');
}

var cancelButton = document.getElementsByClassName('cancelButton');
for (var i=0; i<cancelButton.length; i++)
   cancelButton[i].addEventListener('click', clickCancel, false);

function clickCancel() {
	alert("You clicked cancel");
}
