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
}

function tortillaSelect(event) {
   var prevSelected = document.getElementsByClassName("tortilla selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function riceSelect(event) {
   var prevSelected = document.getElementsByClassName("rice selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function cheeseSelect(event) {
   var prevSelected = document.getElementsByClassName("cheese selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function beanSelect(event) {
   var prevSelected = document.getElementsByClassName("beans selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function sauceSelect(event) {
   var prevSelected = document.getElementsByClassName("sauce selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function vegSelect(event) {
   var prevSelected = document.getElementsByClassName("vegetables selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function extraSelect(event) {
   var prevSelected = document.getElementsByClassName("extras selected");
   for (var i=0; i<prevSelected.length; i++){
      prevSelected[i].classList.toggle("selected", false);
   }
   event.target.classList.toggle("selected", true);
}

function buttonFunction(event) {
   event.preventDefault();
   
   var degrees = document.getElementById("degreeValue");
   var selectedWeather = document.getElementsByClassName("selected");
   
   var metric = document.getElementsByTagName("select");
   
   
   document.getElementById("tempDescription").innerHTML = selectedWeather[0].alt;
   document.getElementsByClassName("weatherIcon")[0].src = selectedWeather[0].src;
   
   document.getElementById("tempDegree").innerHTML = degrees.value;
   document.getElementById("tempUnit").innerHTML = metric[0].value;
   
}
