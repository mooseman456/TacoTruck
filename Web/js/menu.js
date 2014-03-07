var menuTacos = document.getElementsByClassName("taco");

for (var i=0; i<menuTacos.length; i++)
	menuTacos[i].addEventListener("click", menuTacoSelect, false);

function menuTacoSelect(event) {
   var selectedTaco = document.getElementsByClassName("taco");

   document.getElementById("ticket").innerHTML = event.target.title;
}