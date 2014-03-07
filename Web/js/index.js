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

       Taco=Taco.returnString();
       ajaxRequest.open("POST", "ajax/addTaco.php", true);
       ajaxRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       ajaxRequest.send("Taco="+Taco);

   }



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
      alert("Taco1 clicked");
      orderTacos[0].quantity += 1;
      //updateOrder();
      AddTacoToSession(orderTacos[0]);
   });
   
   $("#taco2").click(function(e) {
      orderTacos[1].quantity += 1;
      updateOrder();
   });
   
   $("#taco3").click(function(e) {
      orderTacos[2].quantity += 1;
      updateOrder();
   });
   
   $("#taco4").click(function(e) {
      orderTacos[3].quantity += 1;
      updateOrder();
   });
   
   $("#taco5").click(function(e) {
      orderTacos[4].quantity += 1;
      updateOrder();
   });
   
   $("#taco6").click(function(e) {
      orderTacos[5].quantity += 1;
      updateOrder();
   });
   
   $("#taco7").click(function(e) {
      orderTacos[6].quantity += 1;
      updateOrder();
   });
   
   $("#taco8").click(function(e) {
      orderTacos[7].quantity += 1;
      updateOrder();
   });
   
   function taco(name) {
      this.quantity = 0;
      this.id = name;
      this.basePrice = $("#"+this.id).attr("price");
      this.calcPrice;
      this.returnString = function() {
         //helper helps concatinate the string
         this.calcPrice = this.basePrice * this.quantity;
         var helper = "<li price=\"" + this.calcPrice + "\">" + document.getElementById(this.id).alt + " x" + this.quantity + " : $" + this.calcPrice.toFixed(2);
         helper += "<img id=\"" + this.id + "Cancel\"class=\"cancelButton\" src=\"img/cancel.png\" alt=\"Cancel\" title=\"remove taco\">";
         helper += "<img id=\"" + this.id + "Plus\"class=\"plusButton\" src=\"img/plus.png\" alt=\"Plus\" title=\"raise quantity\">";
         helper += "<img id=\"" + this.id + "Plus\"class=\"minusButton\" src=\"img/minus.png\" alt=\"Minus\" title=\"lower quantity\">";
         helper += "</li>"
         return  helper;
      };
   };
   
   var removeTaco = function(name) {
      var check = name.slice(0, 5);
      for (var i=0; i<orderTacos.length; i++) {
         if(check === orderTacos[i].id)
            orderTacos[i].quantity = 0;
      }
      updateOrder();
   };
   
   var updateOrder = function() {
      var append ="";
      var tax= 0.0825;
      var taxAmount=0.0;
      for (var i=0; i<orderTacos.length; i++) {
         if(orderTacos[i].quantity !== 0)
            append += orderTacos[i].returnString();
      }
      document.getElementById("orderList").innerHTML = append;
      var total =0; 
      for (var i=0; i< $('#orderList li').length; i++)
         total+= parseFloat($('#orderList li')[i].getAttribute("price"));
      
      taxAmount = parseFloat(parseFloat(total) * parseFloat(tax)).toFixed(2)
      
      grandTotal = parseFloat(parseFloat(total) + parseFloat(taxAmount)).toFixed(2);
      
      $('#taxTotal').attr("amount", taxAmount);
      document.getElementById("taxTotal").innerHTML = "Tax at 8.25%: $" + taxAmount;
      
      $("#grandTotal").attr("amount", grandTotal);
      document.getElementById("grandTotal").innerHTML = "Grand Total: $" + grandTotal;
      $('.cancelButton').click(function(e) {
         removeTaco(e.target.id);
      });
   };
   
});
