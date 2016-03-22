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
        <h1>Semaine du 22 octobre</h1>
        <p class="lead">HTML, XML & JSON / HTTP Status code</p>
        
        <h2>Introduction</h2>
        <p>Durant cette période de démonstration vous apprendrez à utiliser les json-schema afin de valider des entités en JavaScript. Par la suite, on apprendra à utiliser un validateur json-schema pour Node.js et nous ferons de la validation</p>
        <h2>Préparation</h2>
        <p>Pour commencer, voici un skelette d'une entité de validation json-schema. Vous pourrez vous baser sur ce skelette pour concevoir les schemas dans les exercices qui suivent<p>
        <pre>

{
    "title": "Exemple personne",
    "type": "object",
    "properties": {
        "prenom": {
            "type": "string"
        },
        "nom": {
            "type": "string"
        },
        "age": {
            "description": "Âge en années",
            "type": "integer",
            "minimum": 18
        }
    },
    "required": ["prenom", "nom"]
}
        </pre>
        <p>Lorsque nous utiliseront le schéma pour faire la validation, celui-ci va s'assurer que l'objet JavaScript aura une propriété "prenom" et "nom". Il va aussi s'assurer que ces deux champs sont de type "string". Le schema assure aussi que l'âge de la personne ne soit pas inférieure à 18.</p>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Indice</h3>
            </div>
            <div class="panel-body">
                Dans l'exemple précédant, les valeurs possibles pour la propriété <code>type</code> sont : <code>array</code>, <code>boolean</code>, <code>integer</code>, <code>number</code>, <code>null</code>, <code>object</code> et <code>string</code>
            </div>
        </div>
        <h2>Exercice #1<span class="text-muted"> - Création d'entités valides</span></h2>
        <p>À partir des schémas qui seront fournis, créez troies entités qui seront valides avec ceux-ci</p>
        <h3>A)</h3>
        <pre>
{
    "title":"Exemple A",
    "description":"schema de validation d'une personne",
    "type":"object",
    "properties": {
        "prenom":{
            "type":"string"
        },
        "nom":{
            "type":"string"
        },
        "adresse":{
            "type":"string"
        },
        "scolarite": {
            "description":"nombre d'années de scolarité",
            "type":"integer",
            "minimum":8
        }
    },
    "required": ["prenom","nom","adresse","scolarite"]
}
        </pre>
        <h3>B)</h3>
        <pre>
{
    "title":"Exemple B",
    "description":"schema de validation pour une voiture",
    "type":"object",
    "properties": {
        "marque":{
            "type":"string"
        },
        "modele":{
            "type":"string"
        },
        "annee":{
            "type":"integer"
        },
        "inspections":{
            "type":"array",
            "items": {
                "type":"string"
            },
            "minItems":1,
            "uniqueItems":true
        }
    },
    "required": ["marque","modele","inspections"]
}
        </pre>
        <h3>C)</h3>
        <pre>
{
    "title":"Exemple C",
    "description":"suite de nombre",
    "type":"array",
    "items": {
        "type":integer,
    },
    "minItems":2,
    "uniqueItems":false
}
        </pre>
        <h2>Exercice #2<span class="text-muted"> - Création de schémas</span></h2>
        <p>À partir des informations fournies, faites un schéma qui fera la validation.
        <h3>A)</h3>
        <p>Une collection de livres dont les livres contiennent un titre, une dedicace, un nombre de page, un ISBN</p>
        <h3>B)</h3>
        <p>Une liste de cours à l'uqam incluant un sigle, un nom de cours, une note, un professeur et une liste de cours prérequis</p>
        <h3>C)</h3>
        <p>Une recette avec les informations suivantes : un nom de recette, type de recette ("Soupe", "Déssert", "Salade", etc), une liste d'ingrédient. La liste d'ingrédients a les attributs suivants : nom d'ingédient, quantité, métrique (ml, g, lb)</p>
        <h2>Exercice #3<span class="text-muted"> - Utilisation dans node.js</span></h2>
        <p>Nous utiliserons jjv pour faire des validations dans node.js. Pour installer le module jjv dans node.js faites la commande suivante dans un répertoire de projet de votre choix</p>
        <pre>

npm install jjv --save
        </pre>
        <p>Implémentez les schémas de validation des exercices précédants dans une application node.js</p>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Indice</h3>
            </div>
            <div class="panel-body">
                Utilisez la documentation fournie sur le Github de jjv pour vous aider à démarrer <a href="https://github.com/acornejo/jjv">Documentation JJV</a>
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