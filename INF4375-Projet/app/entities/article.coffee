###
Entité article
###

require("coffee-script");
$ = require "jquery"

module.exports.entity = () ->
    @id
    @date_pub
    @titre
    @auteur
    @message = []

    @setMessage = (listeParagraphe) ->
        if typeof listeParagraphe isnt array
            @message = [listeParagraphe]
        else
            @message = listeParagraphe
        return