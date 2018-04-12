<?php
/*
    Auteur : Gabriel Braun-Grenier
    Date : 4/04/2018
*/
if(!$connecte){header('Location: ?action=default');} 
?>

<head>
    <title>Liste de tâches</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="./css/style.css" rel="stylesheet" />
    <meta charset="UTF-8">
</head>
<body>
<div id="menu">
<?php 
    //include("./vues/menuPasCo.php");
?>
</div>
<div class="container" style="padding-top:100px; padding-bottom:300px">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
            <h3 style="color:#ff7f7f">
                À Faire
                <a href='' title='Ajouter une tâche' style="color:#ff7f7f"><span class="glyphicon glyphicon-plus-sign"></span></a>
            </h3>
            <?php //Cherche les tâche à faire
                $tacheStat1 = $TacheDao->findByStatut(1); 
                foreach($tacheStat1 as $tache) {
                    if($tache->getNumProjet()==$currentProjet){ //si c'est le bon projet, on ajoute la tâche a la liste
            ?> 
                <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#ff7f7f">
                    <div class="panel-heading" style="background-color:#ff7f7f">
                        <p style="color:#af0000"><?=$tache->getTitre()?>
                            <?php if($tache->getUserAssigned()==$currentUser) { ?> <!--seulement le user assigner peut modifier -->
                                <a href='' title='Modifier' style="color:#af0000"><span class="glyphicon glyphicon-edit"></span></a></p>
                            <?php } ?>
                    </div>
                    <div class="panel-body">
                        <p><?=$tache->getDescription()?></p>
                        <?php if($tache->getDateDebut()!=null or $tache->getDateDebut()!=""){?>
                        <p>Date de debut : <?=$tache->getDateDebut()?></p>
                        <?php } ?>
                        <p>Date de fin : <?=$tache->getDateFin()?></p>
                        <?php  
                            if($tache->getUserAssigned()==$currentUser) { ?> <!--Seulement le user assigner peut deplacer une tâche-->
                            <a href='?action=desattribuer&id=<?=$tache->getId()?>' title='Se désatribuer' style="color:#ff7f7f"><span class="glyphicon glyphicon-warning-sign"></span></a>
                            <a href='?action=moveEC&id=<?=$tache->getId()?>' title='Déplacer vers "En Cours"' style="color:#ff7f7f"><span class="glyphicon glyphicon-arrow-right"></span></a>
                        <?php } 
                            else{ //si le user n'est pas attribuer a une tâche, il peut se l'attribuer, peut être changer pour si une tâche n'est pas assigner (est assigné à)
                        ?>
                            <a href='?action=attribuer&id=<?=$tache->getId()?>&user=<?php echo $currentUser;?>' title="S'attribuer la tâche" style="color:#ff7f7f"><span class="glyphicon glyphicon-user"></span></a>
                        <?php } ?>
                    </div>      
                </div>
            <?php
                    }
                }
            ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
            <b><h3 style="color:#fffa00">En Cours</h3></b>
            <?php //Cherche les tâche en cours
                $tacheStat2 = $TacheDao->findByStatut(2);
                foreach($tacheStat2 as $tache) {
                    if($tache->getNumProjet()==$currentProjet){ //si c'est le bon projet, on ajoute la tâche a la liste
            ?>
                <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#fffc7f">
                    <div class="panel-heading" style="background-color:#fffc7f">
                        <p style="color:#b2a600"><?=$tache->getTitre()?></p>
                    </div>
                    <div class="panel-body">
                        <p><?=$tache->getDescription()?></p>
                        <p>Date de début : <?=$tache->getDateDebut()?></p>
                        <p>Date de fin : <?=$tache->getDateFin()?></p>
                        <?php if($tache->getUserAssigned()==$currentUser) { ?>
                            <a href='?action=moveAF&id=<?=$tache->getId()?>' title='Déplacer vers "À Faire"' style="color:#fffc7f"><span class="glyphicon glyphicon-arrow-left"></span></a>
                            <a href='?action=moveT&id=<?=$tache->getId()?>' title='Déplacer vers "En Cours"' style="color:#fffc7f"><span class="glyphicon glyphicon-arrow-right"></span></a>
                        <?php } ?>
                    </div>
                </div> 
            <?php
                    }
                }
            ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12">
            <h3 style="color:#7fff7f">Terminées</h3>
            <?php //cherche les tâches terminées
                $tacheStat3 = $TacheDao->findByStatut(3);
                foreach($tacheStat3 as $tache) {
                    if($tache->getNumProjet()==$currentProjet){ //si c'est le bon projet, on ajoute la tâche a la liste
            ?>
                <div class="panel panel-info col-lg-10 col-md-10 col-sm-10 col-xs-12" style="border-color:#7fff7f">
                    <div class="panel-heading" style="background-color:#7fff7f">
                        <p style="color:#29af00"><?=$tache->getTitre()?></p>
                    </div>
                    <div class="panel-body">
                        <p><?=$tache->getDescription()?></p>
                        <p>Date de début : <?=$tache->getDateDebut()?></p>
                        <p>Date de fin : <?=$tache->getDateFin()?></p>
                        <?php if($tache->getUserAssigned()==$currentUser) { ?> <!--Seulement le user attribuer peut interagir avec ses tâches terminées-->
                        <a href='?action=moveEC&id=<?=$tache->getId()?>' title='Déplacer vers "En Cours"' style="color:#7fff7f"><span class="glyphicon glyphicon-arrow-left"></span></a>
                        <a href='' title='Supprimer la tâche' style="color:#7fff7f"><span class="glyphicon glyphicon-trash"></span></a>
                        <?php } ?>
                    </div>
                </div> 
            <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
    <?php 
    include("./vues/footer.php");
?>
</body>