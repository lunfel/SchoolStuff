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
        <h1>Semaine du 29 octobre</h1>
        <p class="lead">Framework Express / Routes / JSON</p>
        <h2>Introduction</h2>
        <p>Nous apprendrons à utiliser le framework Express. Dans ce framework nous verrons comment manipuler des routes afin de controller la structure de l'application web. Nous verrons comment on peut affecter le contenu à partir de l'URL fournie</p>
        <h2>Préparation</h2>
        <p>En ligne de commande (cmd.exe) rendez-vous dans un nouveau dossier où l'on créera notre projet Express. Exécuter la prohchaine ligne de commande qui installera express-generator (<a href="https://github.com/expressjs/generator">documentation</a>), un module global à npm qui permettra par la suite de générer un projet Express vide.</p>
        <pre>

npm install -g express-generator
        </pre>
        <p>Si le module s'est bien installé, vous devriez avoir accès maintenant à la commande "express". Utilisez la pour générer un projet Express vide</p>
        <pre>

express
        </pre>
        <p>Voici ce que vous devriez voir apparaître à la console</p>
        <pre>

   create : .
   create : ./package.json
   create : ./app.js
   create : ./public/javascripts
   create : ./public/images
   create : ./public/stylesheets
   create : ./public/stylesheets/style.css
   create : ./views
   create : ./views/index.jade
   create : ./views/layout.jade
   create : ./views/error.jade
   create : ./routes
   create : ./routes/index.js
   create : ./routes/users.js
   create : ./public
   create : ./bin
   create : ./bin/www

   ...
        </pre>
        <p>Ceci est le skelette de votre application Express! Maintenant, il ne nous reste plus qu'à mettre les dépendances à jour puisque le générateur de projet Express vient tout juste de créer un fichier package.json.</p>
        <pre>

npm install
        </pre>
        <p>Il ne reste plus qu'à démarrer le projet à l'aide de la commande suivante. Cette commande exécutera le script de démarrage dans <code>/bin/www</code>. Elle remplacera la commande <code>node app.js</code></p>
        <pre>

npm start
        </pre>
        <p>Vous pouvez voir le résultat à l'adresse suivante : <a href="http://127.0.0.1:3000">Projet Express</a></p>
        <h2>Exercices</h2>
        <p>Utilisez le projet <a href="ressources/express.zip">ici</a> afin d'avoir déjà quelques routes d'établies.</p>
        <h2>A)</h2>
        <p>Faites un document JSON que vous pouvez placer dans /views/json/profile.json, qui sera votre profil d'étudiant. Mettez-y au moins 5 ou 6 attributs qu'un étudiant pourrait avoir (nom, prénom, courriel, etc)</p>
        <h2>B)</h2>
        <p>Faites une route dans le fichier /routes/index.js qui permettra de voir votre fiche d'étudiant que vous venez de créer (/profil)</p>
        <h2>C)</h2>
        <p>Vos amis Jacob, Gustav et Karine sont jaloux de votre belle fiche d'etudiant. Ils veulent en avoir une eux aussi! Faites une route qui accepte en parametre leur prénom et qui leur affiche leur profile (/profil/jacob , /profil/gustav, /profil/karine). Assurez-vous d'utiliser une route qui accepte en parametre le prénom de vos amis. Il vous sera alors facile d'ajouter d'autres profils</p>
        <h2>D)</h2>
        <p>Faites afficher un message d'erreur si le profil de la personne n'existe pas.</p>
        <h2>E)</h2>
        <p>Faites aussi un profil pour votre ami Jean-Sébastien.</p>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

</body></html>