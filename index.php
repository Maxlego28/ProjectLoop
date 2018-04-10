<?php
// -- Contrôleur frontal --
$connecte = false;
require_once('./controleur/ActionBuilder.php');
if (ISSET($_REQUEST["action"]))
	{
		$vue = ActionBuilder::getAction($_REQUEST["action"])->execute();
	}
else	
	{
		$action = ActionBuilder::getAction("");
		$vue = $action->execute();
	}
include_once('vues/'.$vue.'.php');
?>