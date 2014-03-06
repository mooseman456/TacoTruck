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
      this.returnString = function() {
         console.log(this.id);
         return "<li>" + document.getElementById(this.id).alt + " x" + this.quantity + "<img id=\"" + this.id + "Cancel\"class=\"cancelButton\" src=\"img/cancel_icon.png\" alt=\"Cancel\" title=\"Cancel\"></li>";
      };
   };
   
   var removeTaco = function(name) {
      var check = name.slice(0, 5);
      console.log(check);
      for (var i=0; i<orderTacos.length; i++) {
         if(check === orderTacos[i].id)
            orderTacos[i].quantity = 0;
      }
      updateOrder();
   };
   
   var updateOrder = function() {
      var append ="";
      for (var i=0; i<orderTacos.length; i++) {
         if(orderTacos[i].quantity !== 0)
            append += orderTacos[i].returnString();
      }
      document.getElementById("orderList").innerHTML = append;
      
      $('.cancelButton').click(function(e) {
         removeTaco(e.target.id);
      });
   };
   
});
