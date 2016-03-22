require('coffee-script');

module.exports.replaceSpecialChars = (sujet) ->
    sujet = sujet.replace /[ÂÃÄÀÁÅàáâãäå]/gi,"a"
    sujet = sujet.replace /[Ææ]/gi,"ae"
    sujet = sujet.replace /[Çç]/gi,"c"
    sujet = sujet.replace /[ÈÉÊËèéêë]/gi,"e"
    sujet = sujet.replace /[ÌÍÎÏìíîï]/gi,"i"
    sujet = sujet.replace /[Ðð]/gi,"d"
    sujet = sujet.replace /[Ññ]/gi,"n"
    sujet = sujet.replace /[ÒÓÔÕÖØòóôõöø]/gi,"o"
    sujet = sujet.replace /[ÙÚÛÜùúûü]/gi,"u"
    sujet = sujet.replace /[Ýýÿ]/gi,"y"
    sujet = sujet.replace /[Þþ]/gi,"p"
    sujet = sujet.replace /[ß]/gi,"b"
    sujet

module.exports.sorts =
    id : (a,b) ->
        if a.id > b.id then 1 else -1
    date : (a,b) ->
        if a.date_pub > b.date_pub then 1 else -1