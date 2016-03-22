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
        <h1>Semaine du 5 novembre</h1>
        <p class="lead">Framework Express / MongoDB / RESTful</p>
        <h2>Introduction</h2>
        <p>Nous utiliserons un squelette d'application afin de faire une boutique d'achat en ligne en utilisant le framework Express.js, la base de données MongoDB et un API RESTful</p>
        <h2>Préparation</h2>
        <p>Faites un clone du répertoire suivant à l'aide de la commande suivante</p>
        <pre>

git clone https://github.com/jacquesberger/exemplesINF4375.git
        </pre>
        <p>Cependant, nous aurons seulement besoin du sous-répertoire suivant : <code>Node.js/Express.js/mongodb-express</code>. Prenez le contenu de ce sous-dossier et metter le dans votre dossier de travail</p>
        <h2>Exercices</h2>
        <p>Le but de l'exercie est de faire une boutique en ligne très simple. Il nous faudra les routes suivantes</p>
        <ul>
          <li>Voir la liste des articles en vente (<strong>GET</strong>)</li>
          <li>Formulaire d'ajout d'un article à vendre (<strong>GET</strong>)</li>
          <li>Action d'ajout de l'article (envoi du formulaire <strong>POST</strong>)</li>
          <li>Retirer un article en vente (<strong>DELETE</strong>)</li>
        </ul>
        <h3>Liste des articles</h3>
        <p>On doit avoir une route qui nous permet de voir tous les articles dans notre base de données <strong>MongoDB</strong>. Ceci sera une route de type <strong>GET</strong> puisqu'on va chercher de l'information</p>
        <p>Pour chacun des articles, on doit avoir un lien pour supprimer l'article (<code>&lt;a href="..."&gt;supprimer&lt;/a&gt;</code>)</p>
        <h3>Formulaire d'ajout d'un article</h3>
        <p>Créer un formulaire très simpliste avec les informations suivantes : id, nom article, description, prix. Le formulaire doit être de type POST. N'oubliez pas le bouton submit (<code>&lt;button type="submit"&gt;Ajouter&lt;/button&gt;</code>)</p>
        <h3>Action d'ajout de l'article</h3>
        <p>Insérer le contenu du formulaire dans MongoDB en se servant de la connexion disponible dans le fichier <code>db.js</code>. N'oubliez pas de changer les configurations pour qu'elles reflètent ceux de votre poste de travail.</p>
        <h3>Suppression d'un article</h3>
        <p>Accèder à la route de suppression, supprime l'article correspondant à l'id de la base de données MongoDB</p>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Attention!</h3>
            </div>
            <div class="panel-body">
                Dans <strong>HTML</strong> (à ne pas confondre avec le protocole <strong>HTTP</strong>), il n'existe pas de formulaire de type <strong>DELETE</strong>. Il vous faudra alors utiliser soit <strong>GET</strong> ou <strong>POST</strong>. <a href="http://stackoverflow.com/questions/5162960/should-put-and-delete-be-used-in-forms">En apprendre davantage</a>
            </div>
        </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

</body></html>