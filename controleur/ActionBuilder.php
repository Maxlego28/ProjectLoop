<?php
require_once('./controleur/DefaultAction.php');
require_once('./controleur/LoginAction.php');
require_once('./controleur/ListeProjetsAction.php');
require_once('./controleur/AffActivitesAction.php');
require_once('./controleur/DesattribuerAction.php');
require_once('./controleur/AttribuerAction.php');
require_once('./controleur/MoveECAction.php');

class ActionBuilder{
	public static function getAction($nomAction){
		switch ($nomAction)
		{
            case "connecter" :
				return new LoginAction();
			break; 
			case "deconnecter" :
				return new LogoutAction();
			break;
            case "affProjets":
                return new ListeProjetstAction();
            break;
			case "afficher" :
				return new AfficherAction();
            break;
            case "affActivites":
                return new AffActivitesAction();
            break;
            case "attribuer":
                return new AttribuerAction();
            break;
            case "desattribuer":
                return new DesattribuerAction();
            break;
            case "moveEC":
                return new MoveECAction();
            break;
			default :
				return new DefaultAction();
		}
	}
}
?>