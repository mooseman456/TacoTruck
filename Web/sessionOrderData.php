<?php 


if (isset($_SESSION['Order'])) {

	foreach($_SESSION['Order'] as $key => $val) {

		$toEcho .= "<li price=\"".$_SESSION['Order'][$key]['calcPrice']."\">".$_SESSION['Order'][$key]['name']." x".$_SESSION['Order'][$key]['quantity']." : $"
			.$_SESSION['Order'][$key]['calcPrice']."<img id=\"".$_SESSION['Order'][$key]['id']."Cancel\"class=\"cancelButton\" src=\"img/cancel.png\" alt=\"Cancel\" title=\"remove taco\">".
         	"<img id=\"".$_SESSION['Order'][$key]['id']."Plus\"class=\"plusButton\" src=\"img/plus.png\" alt=\"Plus\" title=\"raise quantity\">".
         	"<img id=\"".$_SESSION['Order'][$key]['id']."Plus\"class=\"minusButton\" src=\"img/minus.png\" alt=\"Minus\" title=\"lower quantity\">".
         	"</li>"; 

    }
    echo $toEcho;
}
else {
   echo "YOU DONE FUCKED UP NOW";
}
?>
