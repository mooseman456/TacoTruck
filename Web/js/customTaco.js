$(document).ready(function() {

   function AddCustomTacoToSession(Taco) {
      var ajaxRequest;  // The variable that makes Ajax possible!
         
       try{
         // Opera 8.0+, Firefox, Safari
         ajaxRequest = new XMLHttpRequest();
       }catch (e){
         // Internet Explorer Browsers
         try{
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
         }catch (e) {
            try{
               ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){
               // Something went wrong
               alert("Your browser broke!");
               return false;
            }
         }
       }
       // // Create a function that will receive data 
       // // sent from the server and will update
       // // div section in the same page.
       // ajaxRequest.onreadystatechange = function(){
       //   if(ajaxRequest.readyState == 4){
       //      var ajaxDisplay = document.getElementById('memberAddedDiv');
       //      ajaxDisplay.innerHTML = ajaxRequest.responseText;
       //   }
       // }
       // Now get the value from user and pass it to
       // server script.


       Name="Custom Taco";
       id="customTaco";
       Quantity=Taco.returnQuantity();
       calcPrice=Taco.returnCalcPrice();
       basePrice=Taco.returnBasePrice();
       ajaxRequest.open("POST", "Ajax/addTaco.php", true);
       ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       ajaxRequest.send("Name="+Name+"&Quantity="+Quantity+"&calcPrice="+calcPrice+"&basePrice="+basePrice+"&id="+id);
       $('#orderList').load("sessionOrderData.php", function() {
         console.log("FUCK YOU");
       });
       console.log("Hello");
   };
   
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
            returnString =  selectedElements[i].innerHTML;
         
         else
            returnString += "<div ingredientId='" + selectedElements[i].getAttribute('id') + "'class='added'>" + selectedElements[i].innerHTML + "</div>";        
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
            returnString =  selectedElements[i].innerHTML;
         else
            returnString += "<div ingredientId='" + selectedElements[i].getAttribute('id') + "'class='added' price='" + selectedElements[i].getAttribute("price") + "' >" + selectedElements[i].innerHTML + "</div>";        
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
   
   function tacoObject() {
      this.tacoID;
      this.fillingID = $('#currentFill').children('.added').attr("ingredientid");
      console.log("Fill: " + this.fillingID);
      
      this.tortillaID = $('#currentTortilla').children('.added').attr("ingredientid");
      console.log("Tortilla: " + this.tortillaID);
      this.riceID = "";
      this.cheeseID = "";
      this.beansID = "";
      this.sauceID = "";
      this.vegID = new Array();
      this.extrasID = new Array();
      
      if($('#currentRice div').length > 0)
         this.riceID = $('#currentRice div').attr("ingredientid");
      console.log("Rice: " + this.riceID);
      
      if($('#currentCheese div').length > 0)
         this.cheeseID = $('#currentCheese div').attr("ingredientid");
      console.log("Cheese: " + this.cheeseID);
      
      if($('#currentBeans div').length > 0)
         this.beansID = $('#currentBeans div').attr("ingredientid");
      console.log("Beans: " + this.beansID);
      
      if($('#currentSauce div').length > 0)
         this.sauceID = $('#currentSauce div').attr("ingredientid");
      console.log("Sauce: " + this.sauceID);

      //index = $('#currentVeg div').length;
      /*for(var i=0; i < index; i++)
      {
         console.log(index);
        (function(i){
          this.vegID[i] = ($('#currentVeg div')[i].getAttribute("ingredientid"));
       })(i);
      }*/
      $('#currentVeg div').each(function(index){
         console.log(index + ": " + $(this).attr("ingredientid"));
      })


      console.log(this.vegID.length);
   };
   
   $('#addTaco').click(function(e) {
      if(($('#currentFill').children().length <= 0))
         alert("Please select a filling type");
      
      else if (($('#currentTortilla').children().length <= 0))
         alert("Please select a tortilla");
         
      else {
         var t = new tacoObject();
         AddCustomTacoToSession(t);
         //$.ajax({url:'session.php', type:'POST', data:{'t':'t'}, success:function() {}});
      }
   });
   
   $('#cancelTaco').click(function(e) {
      var r=confirm("Are you sure you want to delete this taco?");
      if (r==true)
         window.location = "index.php";
   });
});
