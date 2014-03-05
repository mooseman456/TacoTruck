document.getElementById("logoImg").onclick = function() {
    window.location = "index.php";
}

document.getElementById("submitOrder").onclick = function() {
    window.location = "checkout.php";
}

var cancelButton = document.getElementsByClassName('cancelButton');
for (var i=0; i<cancelButton.length; i++)
   cancelButton[i].addEventListener('click', clickCancel, false);

function clickCancel() {
	alert("You clicked cancel");
}
