function AddTacoToSession(Taco) {
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


       Name=Taco.returnName();
       id=Taco.returnID();
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

   function RemoveTacoFromSession(TacoID) {
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

       var id = TacoID;
       
       ajaxRequest.open("POST", "Ajax/removeTaco.php", true);
       ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       ajaxRequest.send("id="+id);
       $('#orderList').load("sessionOrderData.php", function() {
         console.log("FUCK YOU");
       });
   };



$(document).ready(function() {
   
   var numItems=0;
   var orderTacos = new Array();
   orderTacos.push(new taco("taco1"));
   orderTacos.push(new taco("taco2"));
   orderTacos.push(new taco("taco3"));
   orderTacos.push(new taco("taco4"));
   orderTacos.push(new taco("taco5"));
   orderTacos.push(new taco("taco6"));
   orderTacos.push(new taco("taco7"));
   orderTacos.push(new taco("taco8"));
   
   $("#taco1").click(function(e) {
      orderTacos[0].quantity += 1;
      updateOrder();
      AddTacoToSession(orderTacos[0]);
   });
   
   $("#taco2").click(function(e) {
      orderTacos[1].quantity += 1;
      AddTacoToSession(orderTacos[1]);
      updateOrder();
   });
   
   $("#taco3").click(function(e) {
      orderTacos[2].quantity += 1;
      updateOrder();
      AddTacoToSession(orderTacos[2]);
   });
   
   $("#taco4").click(function(e) {
      orderTacos[3].quantity += 1;
      // updateOrder();
      AddTacoToSession(orderTacos[3]);
   });
   
   $("#taco5").click(function(e) {
      orderTacos[4].quantity += 1;
      // updateOrder();
      AddTacoToSession(orderTacos[4]);
   });
   
   $("#taco6").click(function(e) {
      orderTacos[5].quantity += 1;
      // updateOrder();
      AddTacoToSession(orderTacos[5]);
   });
   
   $("#taco7").click(function(e) {
      orderTacos[6].quantity += 1;
      // updateOrder();
      AddTacoToSession(orderTacos[6]);
   });
   
   $("#taco8").click(function(e) {
      orderTacos[7].quantity += 1;
      // updateOrder();
      AddTacoToSession(orderTacos[7]);
   });
   
   function taco(name) {
      this.quantity = 0;
      this.title = $('#'+name).attr("alt");
      this.id = name;
      this.basePrice = $("#"+name).attr("price");
      this.calcPrice;
      this.returnString = function() {
         //helper helps concatinate the string
         this.calcPrice = this.basePrice * this.quantity;
         var helper = "<li price=\"" + this.calcPrice + "\">" + document.getElementById(this.id).alt + " x" + this.quantity + " : $" + this.calcPrice.toFixed(2);
         helper += "<img id=\"" + this.id + "Cancel\"class=\"cancelButton\" src=\"img/cancel.png\" alt=\"Cancel\" title=\"remove taco\">";
         helper += "<img id=\"" + this.id + "Plus\"class=\"plusButton\" src=\"img/plus.png\" alt=\"Plus\" title=\"raise quantity\">";
         helper += "<img id=\"" + this.id + "Plus\"class=\"minusButton\" src=\"img/minus.png\" alt=\"Minus\" title=\"lower quantity\">";
         helper += "</li>";
         return  helper;
      };
      
      this.returnQuantity = function() {
         return this.quantity;
      };
      
      this.returnID = function() {
         return this.id;
      };
      
      this.returnName = function() {
         return this.title;
      };
      
      this.returnBasePrice = function() {
         return parseFloat(this.basePrice).toFixed(2);
      };
      
      this.returnCalcPrice = function() {
         return parseFloat(this.basePrice * this.quantity).toFixed(2);
      };
   };
   
   function tacoObject() {
      this.tacoID;
      this.fillingID = $('#currentFill').children('.added').attr("ingredientid");
      
      this.tortillaID = $('#currentTortilla').children('.added').attr("ingredientid");
      this.riceID = "";
      this.cheeseID = "";
      this.beansID = "";
      this.sauceID = "";
      this.vegID = new Array();
      this.extrasID = new Array();
      this.price = "";
      
      if($('#currentRice div').length > 0)
         this.riceID = $('#currentRice div').attr("ingredientid");
      
      if($('#currentCheese div').length > 0)
         this.cheeseID = $('#currentCheese div').attr("ingredientid");
      
      if($('#currentBeans div').length > 0)
         this.beansID = $('#currentBeans div').attr("ingredientid");
      
      if($('#currentSauce div').length > 0)
         this.sauceID = $('#currentSauce div').attr("ingredientid");\

      $('#currentVeg div').each(function(index){
      })
      
      this.price = calcTotal();
   };

   function returnOrder() {
      return orderTacos;
   }
   
   $('.plusButton').click(function(e) {
      var check;
   });

   $('.cancelButton').click(function(e) {
         RemoveTacoFromSession(e.target.id);
   });
   
   var updateOrder = function() {
      var tax= 0.0825;
      var taxAmount=0.0;
     
      var total =0; 
      for (var i=0; i< $('#orderList li').length; i++)
         total+= parseFloat($('#orderList li')[i].getAttribute("price"));
      
      taxAmount = parseFloat(parseFloat(total) * parseFloat(tax)).toFixed(2)
      
      grandTotal = parseFloat(parseFloat(total) + parseFloat(taxAmount)).toFixed(2);
      
      $('#taxTotal').attr("amount", taxAmount);
      document.getElementById("taxTotal").innerHTML = "Tax at 8.25%: $" + taxAmount;
      
      $("#grandTotal").attr("amount", grandTotal);
      document.getElementById("grandTotal").innerHTML = "Grand Total: $" + grandTotal;
   };
   
});
