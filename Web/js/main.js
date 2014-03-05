$(document).ready(function() {
   
   $('#logoImg').click(function(e) {
      window.location = "index.php";
   });
   
   $('#submitOrder').click(function(e) {
      window.location = "checkout.php";
   });

   $('#customTaco').click(function(e) {
      window.location = "customtaco.php";
   });

   $('#editOrder').click(function(e) {
      window.location = "index.php";
   });
   
   $('.cancelButton').click(function(e) {
      alert("You clicked cancel");
   });

});
