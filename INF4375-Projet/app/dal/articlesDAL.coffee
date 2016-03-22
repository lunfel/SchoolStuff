###
Abstraction de la couche d'accès aux données pour les articles
DAL = Data Abstraction Layer
###

require("coffee-script");
mongo = require("mongodb").MongoClient
$ = require('jquery')
utils = require '../utils'

_article =
    entity: require '../entities/article'

module.exports.dal = () ->
    ###
    Permet d'obtenir un article précis selon son id.
    @param {string} id - Identifiant unique de l'article
    @return {article entity | bool} Retourne un {article entity} si on trouve l'article, sinon false
    ###
    @get = (id, route_callback) ->
        mongo.connect "mongodb://localhost:27017/blogue", (err, db) ->
            console.dir(err) if err
            collection = db.collection("articles")
            console.log typeof id
            collection.find({"id":parseInt(id)}).toArray (err, items) ->
                console.log "result set"
                console.log items
                if items.length >= 1
                    console.log 'Il existe plusieurs articles ayant cet ID' if items.length > 1
                    console.log "items de zero dans db"
                    console.log items[0]
                    route_callback items[0]
                else
                    route_callback false
        return

    ###
    Permet d'obtenir la liste de tous les articles
    @return {article entity array} les articles de la liste
    ###
    @liste = (route_callback) ->
        mongo.connect "mongodb://localhost:27017/blogue", (err, db) ->
            console.dir(err) if err
            collection = db.collection("articles")
            
            collection.find().toArray (err,items) ->
                route_callback items
        return
    
    ###
    Sauvegarde un entité article dans la base de données
    @param {article entity} article - L'article à faire persister
    @return {bool} true si la sauvegarde s'est bien fait, sinon false
    ###
    @sauver = (art, route_callback) ->
        mongo.connect "mongodb://localhost:27017/blogue", (err, db) ->
            console.dir(err) if err
            collection = db.collection("articles")
            
            collection.remove {"id":parseInt(art.id)}, (err,item)->
                collection.insert(art,route_callback)
        return
        
    ###
    Permet de supprimer un article selon son id
    @param {string} id - Identifiant unique de l'article
    @return {bool} true si la suppression s'est bien déroulée, sinon false
    ###
    @supprimer = (id, route_callback) ->
        mongo.connect "mongodb://localhost:27017/blogue", (err, db) ->
            console.dir(err) if err
            collection = db.collection("articles")
            
            collection.remove {"id":parseInt(id)}, () ->
                route_callback()
        return
    return