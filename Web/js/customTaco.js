$(document).ready(function() {
   
   
   $('.fill').click(function(e) {
      $('.fill.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('currentFill').innerHTML = "<div ingredientId='" + $(this).attr("id") + "' class='added' price='" + $(this).attr("price") + "'>" + $(this).html() + "</div>";
      calcTotal();
   });
   
   $('.tortilla').click(function(e) {
      $('.tortilla.selected').removeClass('selected');
      $(this).addClass('selected');
      document.getElementById('currentTortilla').innerHTML = "<div ingredientId='" + $(this).attr("id") + "' class='added' price='" + $(this).attr("price") + "'>" + $(this).html() + "</div>";
      calcTotal();
   });
   
   $('.rice').click(function(e) {
      $('.rice.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentRice').innerHTML = $(this).html();
      else
         document.getElementById('currentRice').innerHTML = "<div ingredientId='" + $(this).attr("id") + "' class='added' price='" + $(this).attr("price") + "'>" + $(this).html() + "</div>";
      calcTotal();
   });
   
   $('.cheese').click(function(e) {
      $('.cheese.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentCheese').innerHTML = $(this).html();
      else
         document.getElementById('currentCheese').innerHTML = "<div ingredientId='" + $(this).attr("id") + "' class='added' price='" + $(this).attr("price") + "'>" + $(this).html() + "</div>";
      calcTotal();
   });
   
   $('.beans').click(function(e) {
      $('.beans.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentBeans').innerHTML = $(this).html();
      else
         document.getElementById('currentBeans').innerHTML = "<div ingredientId='" + $(this).attr("id") + "' class='added' price='" + $(this).attr("price") + "'>" + $(this).html() + "</div>";
      calcTotal();
   });
   
   $('.sauce').click(function(e) {
      $('.sauce.selected').removeClass('selected');
      $(this).addClass('selected');
      if ($(this).hasClass('clear'))
         document.getElementById('currentSauce').innerHTML = $(this).html();
      else
         document.getElementById('currentSauce').innerHTML = "<div ingredientId='" + $(this).attr("id") + "' class='added'>" + $(this).html() + "</div>";
      calcTotal();
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
            returnString += "<div class='added'>" + selectedElements[i].innerHTML + "</div></br>";        
      }   
      document.getElementById("currentVeg").innerHTML = returnString;
      calcTotal();
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
            returnString += "<div class='added' price='" + selectedElements[i].getAttribute("price") + "' >" + selectedElements[i].innerHTML + "</div></br>";        
      }   
      document.getElementById("currentExtras").innerHTML = returnString;
      calcTotal();
   });
   
   function calcTotal() {
      var tacoTotal = 0.0;
      var added = $('.added');
      for (var i=0; i<added.length; i++){
         if (added[i].hasAttribute("price"))
            tacoTotal += parseFloat((added[i].getAttribute("price")));
      }
      if (tacoTotal === 0.0) {
         $('#tacoTotal').removeClass('added');
         $('#tacoTotal').html('Subtotal');
      }
      else{
         $('#tacoTotal').addClass('added');
         $('#tacoTotal').html("$" + tacoTotal.toFixed(2));
      }
      
   }
   
   $('#addTaco').click(function(e) {
      if(($('#currentFill').children().length <= 0))
         alert("Please select a filling type");
      
      else if (($('#currentTortilla').children().length <= 0))
         alert("Please select a tortilla");
         
      else
         alert("Taco will eventually be added");
   });
   
   $('#cancelTaco').click(function(e) {
      var r=confirm("Are you sure you want to delete this taco?");
      if (r==true)
         window.location = "index.php";
   });
});
