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
        <h1>Semaine du 19 novembre</h1>
        <p class="lead">Requêtes Ajax</p>
        <h2>Introduction</h2>
        <p>Nous ferons des requêtes de type Ajax (Asynchronous JavaScript and XML)</p>
        <h2>Préparation</h2>
        <p>
          Les requêtes ajax servent à communiquer avec le serveur afin de charger ou envoyer des données après que la page aie fini de charger. Pour faire ces requêtes, il nous faut un objet de type XMLHttpRequest. Bien entendu, la façon d'instancier cet objet va différer entre IE et les autres navigateur. Voici comment instancier l'objet de façon générique (<a href="http://www.xul.fr/xml-ajax.html#ajax-exemple">source</a>)
        </p>
        <pre>
          
var xhr;
try {
    xhr = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (e2) {
        try {
            xhr = new XMLHttpRequest();
        } catch (e3) {
            xhr = false;
        }
    }
}
        </pre>
        <p>Maintenant que nous avons notre objet, il faut maintenant dire ce que l'on veut faire une fois que la requête sera terminée (On ne démarre pas la requête tout de suite). Pour cela, on aura besoin d'une fonction <code>callback</code> qui sera exécutée après que nous ayons reçu la réponse du serveur.</p>
        <pre>

xhr.onreadystatechange = function() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            alert("Reçu:" + xhr.responseText);
        } else {
            alert("Error code " + xhr.status);
        }
    }
}; 
        </pre>
        <p>Dans le code précédent, il est important de comprendre qu'à chaque fois que l'objet change d'état (<a href="http://www.w3schools.com/ajax/ajax_xmlhttprequest_onreadystatechange.asp">États possibles</a>) la fonction est exécutée. Cependant, on vérifie qu'on est à l'état #4 lorsqu'on manipule l'information reçu du serveur. Cet état correspond à l'état où l'on a reçu les données du serveur.</p>
        <p>Finalement, il ne nous reste plus qu'à envoyer la requête en question. Il faut indiquer la ressource à laquelle on veut accéder. Cette ressource peut être une URI d'un architecture REST.</p>
        <pre>

xhr.open("GET", "data.xml", true);
xhr.send(null);
        </pre>
        <p>Dans cet exemple, les paramètres dans l'ordre indique d'utiliser la méthode HTTP GET pour accéder à la ressource data.xml de façon asynchrone (async=true). Sur la deuxième ligne, le paramètre null corresponds aux paramètres que l'on veut envoyer au serveur. Dans notre cas, aucun, donc <code>null</code>.</p>
        <p>Voici l'exemple complet</p>
        <pre>

var xhr;
try {
    xhr = new ActiveXObject('Msxml2.XMLHTTP');
} catch (e) {
    try {
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    } catch (e2) {
        try {
            xhr = new XMLHttpRequest();
        } catch (e3) {
            xhr = false;
        }
    }
}

xhr.onreadystatechange = function() {
    if (xhr.readyState == 4) {
        if (xhr.status == 200) {
            document.ajax.dyn = "Received:" + xhr.responseText;
        } else {
            document.ajax.dyn = "Error code " + xhr.status;
        }
    }
};

xhr.open("GET", "data.xml", true);
xhr.send(null);
        </pre>
        <h2>Exercices</h2>
        <h3>A)</h3>
        <p>Faites une requête AJAX qui permet d'aller chercher la ressource <code>/ressources/xml1.xml</code></p>
        <h3>B)</h3>
        <p>Faites une requête AJAX qui permet d'aller chercher la ressource <code>/ressources/json1.json</code> et qui affiche seulement le nom des démonstrateurs disponibles dans le fichier JSON.</p>
        <h3>C)</h3>
        <p>Dans un projet Express.js, utilisez AJAX pour accéder à des routes de type <code>GET</code>, <code>POST</code>, <code>PUT</code> et <code>DELETE</code>.</p>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  

</body></html>