document.getElementById("logoImg").onclick = function() {
    window.location = "index.html";
}

var cancelButton = document.getElementById('cancelButton');
cancelButton.addEventListener('click', clickCancel, false);

function clickCancel() {
	alert("You clicked cancel");
}
