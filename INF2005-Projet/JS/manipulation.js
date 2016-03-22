
/**
 * Cache tous les éléments ayant la classe
 * @param {type} id
 * @returns {undefined}
 */
function afficher(id){
    var classe = "contenu";
    
    $("."+classe).hide();
    $("#"+id).show();
}