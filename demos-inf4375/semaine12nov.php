<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>INF4375 - Démonstration</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">INF4375</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Semaines <span class="caret"></span></a>
              <?php require('menu.html'); ?>
            </li>
            <!--<li><a href="#about">About</a></li>-->
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Semaine du 12 novembre</h1>
        <p class="lead">Framework Express / Jade</p>
        <h2>Introduction</h2>
        <p>Nous utiliserons un squelette d'application afin de faire une application Express complète</p>
        <h2>Préparation</h2>
        <p>Faites un clone du répertoire suivant à l'aide de la commande suivante</p>
        <pre>

git clone https://github.com/jacquesberger/exemplesINF4375.git
        </pre>
        <p>Cependant, nous aurons seulement besoin du sous-répertoire suivant : <code>Node.js/Express.js/services-jade-stylus</code>. Prenez le contenu de ce sous-dossier et metter le dans votre dossier de travail</p>
        <h2>Exercices</h2>
        <p>Vous êtes engagé par Marco Duckerberg pour faire une application nommée Facecrook. Cette application, selon lui, sera révolutionnaire et doit être faite à l'aide de node.js. Voici les parties que vous devrez développer. Vous devez utiliser les technologies Jade et Express.js. Vous n'avez pas besoin d'utiliser MongoDB. Les données peuvent être fixes dans la page Jade ou bien fournies avec du JSON</p>
        <h3>Cadre de travail</h3>
        <p>Vous devez faire une page en Jade qui sera utilisée avec toutes les autres pages à l'aide d'un <code>extend</code>(profil, liste d'amis et mur personnel). Cette page doit avoir une barre de menu au haut de la page qui permettra la navigation entre les differentes parties de l'application. Elle doit aussi avoir beaucoup de publicités cibliées pour rentabiliser l'application.
        <h3>Page de profil</h3>
        <p>Une page que l'on peut visiter en suivant la route <code>/profil</code>. On y trouve une photo de profil ansi que tous les détails importants de votre vie personnelle. Emplois, écoles, famille, lieu de résidance, année de naissance, etc. (données fictives)</p>
        <h3>Liste d'amis</h3>
        <p>Une page que l'on peut visiter en suivant la route <code>/amis</code>. On y trouve une liste avec au moins 5 de vos ami au format Jade. Un amis comporte au moins les attributs suivants : nom, prenom, courriel, date de naissance, url photo de profil (fictive), date du lien d'amitié sur Facecrook. Cette même liste d'amis devra aussi être disponible au format XML avec la route suivante <code>/amis.xml</code>.</p>
        <h3>Mur personnel</h3>
        <p>Une page que l'on peut visiter à la racine de votre application web <code>/</code>. On y trouve une liste de publications que vous avez faits. Ex: Ce que vous avez fait hier, les problèmes que vous avez eu en faisant votre TP2, ce que vous avez manger pour déjeuner et finalement une vidéo de chat. Cette même liste de publications devra aussi être disponible au format JSON avec la route suivante <code>/mur.json</code>.</p>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

</body></html>