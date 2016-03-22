require('coffee-script');

fs = require('fs')
$ = require('jquery')
utils = require('../app/utils')

_dal = require('../app/dal/articlesDAL');
article =
    dal: new _dal.dal()
    entity: require('../app/entities/article')
###
article = 
    "id": "ARTICLE0258394",
    "titre":"Best Practices for Speeding Up Your Web Site",
    "auteur":"Yahoo! Dev. Network",
    "date_pub":"2013-12-02",
    "contenu": [
        "80% of the end-user response time is spent on the front-end. Most of this time is tied up in downloading all the components in the page: images, stylesheets, scripts, Flash, etc. Reducing the number of components in turn reduces the number of HTTP requests required to render the page. This is the key to faster pages.",
        "One way to reduce the number of components in the page is to simplify the page's design. But is there a way to build pages with richer content while also achieving fast response times? Here are some techniques for reducing the number of HTTP requests, while still supporting rich page designs.",
        "Combined files are a way to reduce the number of HTTP requests by combining all scripts into a single script, and similarly combining all CSS into a single stylesheet. Combining files is more challenging when the scripts and stylesheets vary from page to page, but making this part of your release process improves response times.",
        "Image maps combine multiple images into a single image. The overall size is about the same, but reducing the number of HTTP requests speeds up the page. Image maps only work if the images are contiguous in the page, such as a navigation bar. Defining the coordinates of image maps can be tedious and error prone. Using image maps for navigation is not accessible too, so it's not recommended."
    ]

article2 =
    "id": "ARTICLE001201231",
    "titre": "Moi j'aime les bananes jaune et le beurre de peanut",
    "auteur": "Mathieu"
    "date_pub": "2013-12-06",
    "contenu":[
        "Bonjour je me nomme Mathieu",
        "",
        "",
        "",
        "Des fois je laisse des espaces vide dans mes articles",
        "",
        "",
        "Des fois non..."
    ]
###

# GET admin/:id
exports.modifiable = (req,res) ->
    article.dal.get req.params.id, (item) ->
        res.render 'modifier',
            "article": item
    
# PUT admin/:id
exports.modifier = (req,res) ->
    art = req.body.article
    art.id = parseInt(req.params.id)
    contenu = req.body.contenu.split('\n').clean("")
    art.contenu = contenu
    console.log "art"
    console.log art
    
    article.dal.sauver art, () ->
        res.redirect '/'+art.id

# DEL admin/:id
exports.supprimer = (req,res) ->   
    article.dal.supprimer req.params.id, () ->
        res.redirect '/'

# GET admin/publier
exports.nouveau = (req,res) ->
    res.render 'nouveau'

# POST admin/publier
exports.ajouter = (req,res) ->    
    aujourdhui = new Date()      
    datePub = aujourdhui.getCustomDate()
           
    # méthode prototype clean de Array est définie dans app.js
    contenu = req.body.contenu.split('\n').clean("")
    
    #donner un identifiant unique
    article.dal.liste (items) ->
        console.log items
        items = items.sort utils.sorts.id
        newno = 0
        isused = true
        while isused
            isused = false
            newno++
            for a in items when a.id == newno
                isused = true
        id = newno
        
        item =
            "id": id,
            "titre": req.body.article.titre,
            "auteur": req.body.article.auteur,
            "date_pub": datePub,
            "contenu": contenu
        
        console.log article
        article.dal.sauver item, () ->
            res.redirect '/' + item.id

# GET /:id
exports.vue = (req,res) ->
    console.log "params"
    console.log req.params.id
    article.dal.get req.params.id,(item) ->
        console.log "item"
        console.log item
        if item is false
            res.render("error404")
        else
            res.render 'consulter',
                "article": item

# GET /
exports.liste = (req,res) ->
    article.dal.liste (items) ->
        items = (items.sort utils.sorts.date).reverse()
        res.render 'liste',
            articles: items