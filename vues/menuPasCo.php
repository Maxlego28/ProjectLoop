<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div clas="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./#parallax"><img id="logo" src="./images/logoPetit.png"/></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <?php if(!$connecte){?>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="actif" href="./#parallax">Accueil</a></li>
                <li><a class="#" href="./#contenu1">À Propos</a></li>
                <li><a class="#" href="./#contenu2">Fonctionnalités</a></li>
                <li><a class="#" href="./#contenu3">Nous Contacter</a></li>
                <li><a class="#" href="?action=connecter">Se Connecter</a></li>
            <?php }?>
            </ul>
        </div>
    </div>
</nav>