###
JavaScript(coffee-script) Front-end pour la vue nouveau.jade
###

$(document).ready () ->
    $("#btn-ajouter").on 'click', (event) ->
        erreur = false
        $(".has-error").removeClass("has-error")
        $(".popmsg").popover('destroy')
        $(".popmsg").popover()

        if $("#txtTitre").val() is ""
            erreur = true
            $('#txtTitre').popover('show')
            $('#txtTitre').parent().addClass('has-error')
        if $("#txtAuteur").val() is ""
            erreur = true
            $('#txtAuteur').popover('show')
            $('#txtAuteur').parent().addClass('has-error')
        if $("#txtContenu").val() is ""
            erreur = true
            $('#txtContenu').popover('show')
            $('#txtContenu').parent().addClass('has-error')
        $("#frmPublier").submit() if not erreur
        return