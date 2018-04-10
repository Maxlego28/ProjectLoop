<?php
require_once('./controleur/DefaultAction.php');
require_once('./controleur/LoginAction.php');
require_once('./controleur/ListeProjetsAction.php');
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
			default :
				return new DefaultAction();
		}
	}
}
?>