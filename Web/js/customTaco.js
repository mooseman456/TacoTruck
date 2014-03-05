window.addEventListener("load", addEvents, false);

function addEvents(){
   //Filling selection
   var fill = document.getElementsByClassName("fill");
   for (var i=0; i<fill.length; i++)
      fill[i].addEventListener("click", fillSelect, false);
   
   
   //Tortilla selection
   var tortilla = document.getElementsByClassName("tortilla");
   for (var i=0; i<tortilla.length; i++)
      tortilla[i].addEventListener("click", tortillaSelect, false);
   
   //Rice selection
   var rice = document.getElementsByClassName("rice");
   for (var i=0; i<rice.length; i++)
      rice[i].addEventListener("click", riceSelect, false);
   
   //Cheese selection
   var cheese = document.getElementsByClassName("cheese");
   for (var i=0; i<cheese.length; i++)
      cheese[i].addEventListener("click", cheeseSelect, false);
   
   //Beans selection
   var beans = document.getElementsByClassName("beans");
   for (var i=0; i<beans.length; i++)
      beans[i].addEventListener("click", beanSelect, false);
   
   //Sauce selection
   var sauce = document.getElementsByClassName("sauce");
   for (var i=0; i<sauce.length; i++)
      sauce[i].addEventListener("click", sauceSelect, false);
   
   //Veggetables selection
   var vegs = document.getElementsByClassName("vegetables");
   for (var i=0; i<vegs.length; i++)
      vegs[i].addEventListener("click", vegSelect, false);
   
   //Extra selection
   var extra = document.getElementsByClassName("extras");
   for (var i=0; i<extra.length; i++)
      extra[i].addEventListener("click", extraSelect, false);
}

function fillSelect(event) {
   var prevSelected = document.getElementsByClassName("fill selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentFill").innerHTML = event.target.innerHTML;
   
}

function tortillaSelect(event) {
   var prevSelected = document.getElementsByClassName("tortilla selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentTortilla").innerHTML = event.target.innerHTML;
}

function riceSelect(event) {
   var prevSelected = document.getElementsByClassName("rice selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentRice").innerHTML = event.target.innerHTML;
}

function cheeseSelect(event) {
   var prevSelected = document.getElementsByClassName("cheese selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentCheese").innerHTML = event.target.innerHTML;
}

function beanSelect(event) {
   var prevSelected = document.getElementsByClassName("beans selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentBean").innerHTML = event.target.innerHTML;
}

function sauceSelect(event) {
   var prevSelected = document.getElementsByClassName("sauce selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentSauce").innerHTML = event.target.innerHTML;
}

function vegSelect(event) {
   var prevSelected = document.getElementsByClassName("vegetables selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentVeg").innerHTML = event.target.innerHTML;
}

function extraSelect(event) {
   var prevSelected = document.getElementsByClassName("extras selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
   document.getElementById("currentExtras").innerHTML = event.target.innerHTML;
}