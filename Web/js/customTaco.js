window.addEventListener("load", addEvents, false);

function addEvents(){
   //Filling selection
   var fill = document.getElementsByClassName("fill");
   for (var i=0; i<images.length; i++)
      images[i].addEventListener("click", weatherSelect, false);
   
   
   //Tortilla selection
   
   
   //Rice selection
   
   
   //Cheese selection
   
   
   //Beans selection
   
   
   //Sauce selection
   
   
   //
   var selectButton = document.getElementById("weatherSubmit");
   selectButton.addEventListener("click", buttonFunction, false);
}

function weatherSelect(event) {
   var prevSelected = document.getElementsByClassName("selected");
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
