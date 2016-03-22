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
        <h1>Semaine du 8 octobre</h1>
        <p class="lead">HTML, XML & JSON / HTTP Status code</p>
        
        <h2>Introduction</h2>
        <p>Durant cette période de démonstration vous serez menés à créer un serveur à l'aide de Node.js. Les différents exercices vous feront manipuler différents type de contenus multimédia appelés <a href="http://fr.wikipedia.org/wiki/Type_MIME">Type MIME</a> (ou MIME Type en anglais). Par la suite on verra les différents <a href="http://fr.wikipedia.org/wiki/Liste_des_codes_HTTP">code de status HTTP</a> et leur utilité</p>
        <h2>Préparation</h2>
        <p>Commençons par créer un serveur Node.js. Dans un répertoire de votre choix, créer un fichier nommé mon_serveur.js et mettez le code suivant à l'intérieur<p>
        <pre>

  // mon_serveur.js

  var http = require('http');
  http.createServer(function (req, res) {
    res.writeHead(200, {'Content-Type': 'text/plain'});
    res.write("Bonjour\n");
    res.end('Hello world\n');
  }).listen(80, '127.0.0.1');
  console.log('Le serveur est en marche! Allez le visiter à l\'aide d\'un navigateur');
        </pre>
        <p>Ensuite, exécutons le serveur. À l'aide d'une invite de commande, rendez-vous dans votre dossier où votre fichier se trouve. À partir de là, exécutez la commande suivante :</p>
        <pre>

  node mon_serveur.js
        </pre>
        <p>Vous devriez voir apparaître dans l'invite de commande le texte suivant : « Le serveur est en marche! Allez le visiter à l'aide d'un navigateur ». Si vous visitez la page <a href="http://127.0.0.1">http://127.0.0.1</a> à l'aide d'un navigateur vous devriez voir du texte y apparaître.
        <h2>Exercice #1<span class="text-muted"> - Les mimes-types</span></h2>
        <h3>A)</h3>
        <p>Faites un serveur Node.js qui affiche le texte suivant lorsqu'on navigue vers l'adresse <a href="http://127.0.0.1">http://127.0.0.1</a></p>
        <pre>
  Charles Babbage, né le 26 décembre 1791 et mort le 18 octobre 1871 à Londres, est un mathématicien, inventeur, visionnaire britannique du xixe siècle qui fut l'un des principaux précurseurs de l'informatique. Vers la fin de sa vie, il déclara qu'il aurait accepté une mort immédiate à condition de pouvoir passer trois jours, cinq cents ans plus tard, avec un guide scientifique pouvant lui expliquer toutes les inventions apparues depuis sa mort

  Source: http://fr.wikipedia.org/wiki/Charles_Babbage
        </pre>
        <h3>B)</h3>
        <p>Faites un serveur Node.js qui calcule et affiche la suite de Fibonacci pour f(25)</p>
        <pre>

  1,1,2,3,5 [...] x
        </pre>
        <h3>C)</h3>
        <p>Faites un serveur Node.js qui affiche du contenu <a href="ressources/xml1.txt">XML</a> sans changer le Type MIME (Content-Type)</p>  
        <h3>D)</h3>
        <p>À partir de l'exercice précédant, changer le Type MIME correspondant à celui du XML.</p>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Indice</h3>
          </div>
          <div class="panel-body">
            L'attibut <code>Content-Type</code> du deuxième argument de la fonction <code>res.writeHead(200, {'Content-Type': 'text/plain'});</code> détermine le Type MIME. Servez-vous de la liste des Type MIME à l'adresse suivante : <a href="http://fr.wikipedia.org/wiki/Type_MIME">Liste des types MIME</a>
          </div>
        </div>
        <h3>E)</h3>
        <p>À partir de l'exercice précédant, faites afficher le contenu XML à partir d'un fichier .xml. Votre serveur doit lire le ficher xml et le faire afficher.</p>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Indice</h3>
          </div>
          <div class="panel-body">
            Servez-vous de la documentation officielle de Node.js afin de trouver la fonction pour lire les fichiers. <a href="http://nodejs.org/documentation/api/">Documentation officielle</a> dans la catégorie File System.
          </div>
        </div>
        <h3>F)</h3>
        Faites un serveur Node.js qui affiche le contenu <a href="ressources/json1.txt">JSON</a> avec le Type MIME approprié
        <h2>Exercice #2<span class="text-muted"> - Les codes de status HTTP</span></h2>
        <h3>A)</h3>
        <p>Faites un serveur Node.js qui retourne le code HTTP associé à une <u>page introuvable</u> et affichez un message texte ou html correspondant</p>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">Indice</h3>
          </div>
          <div class="panel-body">
            Le premier argument de la fonction <code>res.writeHead(200, {'Content-Type': 'text/plain'});</code>, soit <code>200</code> dans ce cas-ci, détermine le code de status HTTP. Servez-vous de la liste des codes HTTP pour trouver celui qui correspond à vos besoins : <a href="http://fr.wikipedia.org/wiki/Liste_des_codes_HTTP">Liste des codes HTTP</a>
          </div>
        </div>
        <h3>B)</h3>
        <p>Faites un serveur Node.js qui retourne le code HTTP associé à une page qui s'est chargée correctement et affichez cette page (inventez du contenu avec le Type MIME de votre choix)</p>
        <h3>C)</h3>
        <p>Faites un serveur Node.js qui retourne le code HTTP associé à une page qui s'est chargée correctement et qui engendre la création d'une nouvelle ressource</p>
        <h3>D)</h3>
        <p>Faites un serveur Node.js qui retourne le code HTTP associé à une page dont l'accès en lecture est interdit et affichez un message en conséquence</p>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

</body></html>