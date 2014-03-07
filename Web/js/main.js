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
   
   $('#accountLink').click(function(e) {
      if($('#navbar ul li').hasClass('selected')) {
         $('#navbar ul li').removeClass('selected');
      }
      $('#accountLink').addClass('selected');
   });
});
