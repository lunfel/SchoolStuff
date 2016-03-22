
require('coffee-script');

/**
 * Module dependencies.
 */

// On ajoute une méthode à date qui retourne une date au format YYYY/mm/dd
Date.prototype.getCustomDate = function(separator) {
    if (!separator)
        separator = "-";
    // Les mois sont zéro-based en javascript
    return this.getFullYear() + separator + ("0" + (this.getMonth() + 1)).slice(-2) + separator + ("0" + this.getDate()).slice(-2);
};

// Source : http://stackoverflow.com/questions/281264/remove-empty-elements-from-an-array-in-javascript
Array.prototype.clean = function(deleteValue) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == deleteValue) {
            this.splice(i, 1);
            i--;
        }
    }
    return this;
};

var express = require('express');
//var routes = require('./routes');
var routes = {
    articles: require('./routes/articles')
};
var http = require('http');
var path = require('path');

var app = express();

// all environments
app.set('port', process.env.PORT || 3000);
app.set('views', __dirname + '/views');
app.set('view engine', 'jade');
app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.bodyParser());
app.use(express.methodOverride());
app.use(app.router);
app.use(require('stylus').middleware(__dirname + '/public'));
app.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == app.get('env')) {
    app.use(express.errorHandler());
}

app.get('/admin/publier', routes.articles.nouveau);
app.post('/admin/publier', routes.articles.ajouter);
app.get('/admin/:id', routes.articles.modifiable);
app.post('/admin/:id', routes.articles.modifier);
app.get('/delete/:id', routes.articles.supprimer);
app.get('/:id', routes.articles.vue);
app.get('/', routes.articles.liste);


http.createServer(app).listen(app.get('port'), function() {
    console.log('Express server listening on port ' + app.get('port'));
});
