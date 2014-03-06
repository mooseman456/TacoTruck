$(document).ready(function() {

   $('.fill').click(function(e) {
      $('.fill.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('currentFill').innerHTML = "<span class='added'>" + $(this).html() + "</span>";
   });
   
   $('.tortilla').click(function(e) {
      $('.tortilla.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('currentTortilla').innerHTML = "<span class='added'>" + $(this).html() + " Tortilla</span>";
   });
   
   $('.rice').click(function(e) {
      $('.rice.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentRice').innerHTML = $(this).html();
      else
         document.getElementById('currentRice').innerHTML = "<span class='added'>" + $(this).html() + "</span>";
   });
   
   $('.cheese').click(function(e) {
      $('.cheese.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentCheese').innerHTML = $(this).html();
      else
         document.getElementById('currentCheese').innerHTML = "<span class='added'>" + $(this).html() + "</span>";
   });
   
   $('.beans').click(function(e) {
      $('.beans.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentBeans').innerHTML = $(this).html();
      else
         document.getElementById('currentBeans').innerHTML = "<span class='added'>" + $(this).html() + "</span>";
   });
   
   $('.sauce').click(function(e) {
      $('.sauce.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentSauce').innerHTML = $(this).html();
      else
         document.getElementById('currentSauce').innerHTML = "<span class='added'>" + $(this).html() + "</span>";
   });
      
   $('.vegetables').click(function(e) {
      if (!$(this).hasClass('selected') && !$(this).hasClass('clear')) {
         $('.vegetables.clear').removeClass('selected');
         $(this).addClass('selected');
      }
      else if($(this).hasClass('clear')) {
         $('.vegetables').removeClass('selected');
         $(this).addClass('selected');
      }
      else {
         $(this).removeClass('selected');
      }
      
      if(!$('.vegetables').hasClass('selected')) {
         $('.vegetables.clear').addClass('selected');
      }
      var selectedElements = document.getElementsByClassName("vegetables selected");
      var returnString="";
      for (var i=0; i<selectedElements.length; i++) {
         
         if($('.vegetables.clear').hasClass('selected'))
            returnString =  selectedElements[i].innerHTML + "</br>";
         
         else
            returnString += "<span class='added'>" + selectedElements[i].innerHTML + "</span></br>";        
      }   
      document.getElementById("currentVeg").innerHTML = returnString;
      
   });
   
   $('.extras').click(function(e) {
      if (!$(this).hasClass('selected') && !$(this).hasClass('clear')) {
         $('.extras.clear').removeClass('selected');
         $(this).addClass('selected');
      }
      else if($(this).hasClass('clear')) {
         $('.extras').removeClass('selected');
         $(this).addClass('selected');
      }
      else {
         $(this).removeClass('selected');
      }
      
      if(!$('.extras').hasClass('selected')) {
         $('.extras.clear').addClass('selected');
      }
      var selectedElements = document.getElementsByClassName("extras selected");
      var returnString="";
      for (var i=0; i<selectedElements.length; i++) {
         
         if($('.extras.clear').hasClass('selected'))
            returnString =  selectedElements[i].innerHTML + "</br>";
         
         else
            returnString += "<span class='added'>" + selectedElements[i].innerHTML + "</span></br>";        
      }   
      document.getElementById("currentExtras").innerHTML = returnString;
      
   });
   
   $('#addTaco').click(function(e) {
      alert("Taco is added");
   });
   
   $('#cancelTaco').click(function(e) {
      var r=confirm("Are you sure you want to cancel this taco?");
      if (r==true)
         window.location = "index.php";
   });
});
