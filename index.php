<?php
require_once('./modele/classes/Taches.php');
require_once('./modele/TacheDAO.php');
$TacheDao = new TacheDAO();
/* changer sa avec les sessions*/
$currentUser = "gab";
$currentProjet = "1";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$_SESSION["connecte"] = true;
//$connecte = true;
/**/
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