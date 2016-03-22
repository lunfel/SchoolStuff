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
        <h1>Semaine du 26 novembre</h1>
        <p class="lead">Formulaires HTML / Redirection dans Express.js</p>
        
        <h2>Introduction</h2>
        <p>Durant cette période de démonstration vous serez menés à créer des formulaires HTML afin communiquer entre le client (navigateur) et le serveur (node.js et express.js). Nous verons par la suite comment faire des redirections après avoir terminé de faire le traitement sur les données.</p>
        <h2>Comprendre les formulaires HTML</h2>
        <h3>Form</h3>
        <p>Pour créer un formulaire HTML vide, il faut écrire une balise de type <code>&lt;form&gt;&lt;/from&gt;</code>. Et voilà, vous avez un formulaire, mais il ne fait rien pour le moment</p>
        <h3>Méthode</h3>
        <p>Il est possible de spécifier au formulaire HTML quel type de requête l'on veut faire vers le serveur. Voici comment faire des requêtes de type GET et POST.</p>
        <pre>
          
&lt;form method="GET"&gt;&lt;/from&gt;

&lt;form method="POST"&gt;&lt;/from&gt;
        </pre>
        <h3>Action</h3>
        <p>À l'aide de l'attribut action dans un formulaire, on détermine l'URI de la requête. Si l'attribut n'est pas fourni, le formulaire HTML va prendre pour acquis que vous voulez envoyer le contenu du formulaire à la même adresse que vous êtes présentement. Mais il est déconseillé de laisser ce champs vide. Mieux vaut le spécifier afin de ne pas avoir de surprises.</p>
        <pre>
          
&lt;form method="POST" action="/souliers/nouveau"&gt;&lt;/from&gt;

&lt;form method="POST" action="/utilisateurs/ajouter"&gt;&lt;/from&gt;
        </pre>
        <h3>Soumission</h3>
        <p>Pour effectuer l'envoi du formulaire vers le serveur, il nous faut un champs particulier dans notre formulaire. Ce champs se nomme submit.</p>
        <pre>
          
&lt;input type="submit" value="Soummettre le formulaire" /&gt;
        </pre>
        <h3>Les champs</h3>
        <p>Les formulaires peuvent contenir différents type de champs pour différents type d'information. Il est important de se rappeler que l'identifiant du champs qui est envoyé au serveur est basé sur l'attribut <code>name</code> du champs et non de <strike>id</strike> ou de <strike>class</strike>.En voici quelques uns</p>
        <h4>Text</h4>
        <p>Permet d'y insérer des valeurs textuelles.</p>
        <input type="text" name="idutilisateur" value="tanguay.mathieu" />
        <h4>Password</h4>
        <p>Pour les mots de passe</p>
        <input type="password" name="pw" value="123456" />
        <h4>Textarea</h4>
        <p>Pour entrer du texte. Idéal pour écrire beaucoup de texte.</p>
        <textarea name="biographie" cols="120" rows="7">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</textarea>
        <h4>Date (HTML5 seulement)</h4>
        <input type="date" name="datedenaissance" value="2005-11-22" />
        <h3>HTML des exemples précédents</h3>
        <pre>

&lt;input type="text" name="idutilisateur" value="tanguay.mathieu" /&gt;

&lt;input type="password" name="pw" value="123456" /&gt;

&lt;textarea name="biographie" cols="120" rows="7"&gt;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&lt;/textarea&gt;

&lt;input type="date" name="datedenaissance" value="2005-11-22" /&gt;
        </pre>
        <h3>Autres</h3>
        <p>Il existe beaucoup d'autres type de formulaires, mais nous ne les couvrirons pas ici. Voici un <a href="http://www.w3schools.com/html/html_form_input_types.asp">lien</a> vers une liste complète des champs possible pour un formulaire HTML</p>
        <h2>Exercices</h2>
        <h3>A)</h3>
        <p>Faites un formulaire pour ajouter un livre dans une bibliothèque (titre, auteur, ISBN, date de parution, nombre de pages, etc)</p>
        <h3>B)</h3>
        <p>Faites un formulaire pour ajouter une voiture (marque, modèle, année, prix, couleur, etc)</p>
        <h3>C)</h3>
        <p>Faites un formulaire pour ajouter une publication sur Facebook (contenu, id_utilisateur, date de publication, etc) à l'URI suivant <code>/murpersonnel/publier</code></p>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

</body></html>