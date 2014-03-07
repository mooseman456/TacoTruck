<?php
   
   session_start()
   $_SESSION['orderData'] = $_POST[t];
   
   header('Location: index.php');

?>
