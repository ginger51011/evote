<?php
$access = array(2);
if(in_array($evote->getPrivilege($_SESSION["user"]), $access)){

$ongoingSession = $evote->ongoingSession();

$buttonstate = "disabled";
if($ongoingSession){
        $buttonstate = "active";
}
?>
<p><?php #------------KNAPPRAD-------------
        $btns1 = "btn btn-success ".$buttonstate;
        $btns2 = "btn btn-danger ".$buttonstate;
        echo "<form action=actions/buttonhandler.php method=\"POST\">";
	echo "<div class=\"btn-group\">";
        echo "<button type=\"submit\" name=\"button\" value=\"stat\" class=\"$btns1\" style=\"margin-bottom: 5px;\" $buttonstate>Se tidigare omgångar</button>";
        echo "<button type=\"submit\" name=\"button\" value=\"logout\" class=\"btn btn-primary\" style=\"margin-bottom: 5px\">Logga ut</button>";
	echo "</div>";
        echo "</form>";
?></p>
<hr>
<?php
if($ongoingSession){
	include "actions/genlastresult.php";
}else{
	echo "<h3>Det pågår inget val</h3>";
}

} else {
    echo "Du har inte behörighet att visa denna sida.";
}
?>
