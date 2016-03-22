


dal.initialize();
var session = null;

$(document).ready(function() {
    pages = {
        accueil: {
            url: "contenu_template.html",
            callback: decorateur
        }
    };

// deco est un boolean
    function load(name) {
        $.get(pages[name].url, null, function(contenu) {
            $("#container").html(contenu);
            pages[name].callback();
        });
    }

    function genereMenu() {
        // Génération du menu de navigation
        var menu = '<h2>Liste des cours</h2>' +
                '<ul class="no-icon">' +
                '<li><a id="refaccueil" href="#">INF2005</a> (<a href="mailto:INF2005@uqam.ca">Courriel</a>)</li>' +
                '</ul>';
        if (session.role === "démonstrateur" || session.role === "professeur") {
            menu += "<h2>Gestion</h2>" +
                    "<ul>" +
                    '<li id="gestionSections"><a href="#">Gestion sections</a></li>' +
                    '<li id="gestionContenu"><a href="#">Gestion du contenu</a></li>';
            if (session.role === "professeur") {
                menu += '<li><a href="#">Gestion des rôles</a></li>';
            }
            menu += "</ul>";
        }
        return menu;
    }

    function accueil() {
        // Génération de la partie centrale
        var html = "";
        var sections = dal.sections.liste();
        for (i = 0; i < sections.length; i++) {
            html += "<h2>" + sections[i].titre + "</h2>";
            html += "<ul>";
            var ressources = dal.ressources.listeParSection(sections[i].id);
            for (j = 0; j < ressources.length; j++) {
                if (ressources[j].type === "ressource") {
                    html += '<li>' + ressources[j].titre + ' (<a href="'+ressources[j].url+'">Ressource</a>)</li>';
                } else if (ressources[j].type === "atelier") {
                    html += '<li class="atelier">Remise de <a href="javascript:alert(\'atelier\')">' + ressources[j].titre + "</a>";
                }
            }
            html += "</ul>";
        }

        return html;
    }

    function decorateur() {
        var html = accueil();
        var menu = genereMenu();
        
        $("#central").html(html);
        $("#captionRole").html(session.role);
        $("#menu").html(menu);
        // On bind les évènements
        $("#refaccueil").on('click',decorateur);
        $("#gestionSections").on('click', gestion_sections);
        $("#gestionContenu").on('click', function() {
            gestion_contenu();
        });
        $("#gestionRoles").on('click', function() {

        });
        $('#refDeconnexion').on('click',function(){
            dal.session.destroy();
            location.reload();
        });
    }
    
    function supprimer_section(id_section){
        dal.sections.supprimer(id_section);
        gestion_sections();
    }
    
    function modifier_section(id_section){
        console.log("modifier");
        console.log(id_section);
        var section = dal.sections.get(id_section);
        var html = '<p>' +
                        'Nom de la section <input id="txtTitreSection" value="'+section.titre+'" type="text" />' +
                    '</p>' +
                    '<p>' +
                        'Description' +
                    '</p>' +
                    '<textarea id="txtDescriptionSection">'+section.description+'</textarea>' +
                    '<br />' +
                    '<button id="btnModifierSection">Modifier</button>';
        $('#central').html(html);
        
        $('#btnModifierSection').on('click',function(){
            section.titre = $("#txtTitreSection").val();
            section.description = $('#txtDescriptionSection').val();
            dal.sections.modifier(section);
            gestion_sections();
        });
    }
    
    function gestion_sections(){
        var html = "<h2>Liste des sections</h2>" + 
                '<a class="ajouter" href="#">Ajouter</a>' + 
                '<ul>';
        var sections = dal.sections.liste();
        
        for(i=0;i<sections.length;i++){
            html += '<li class="sections" data-section_id="'+sections[i].id+'">'+sections[i].titre + ' (<a class="modifier" href="#">Modifier</a>, <a class="supprimer" href="#">Supprimer</a>)</li>';
        }
        html += '</ul>';
        
        $("#central").html(html);
        
        $("a.ajouter").on('click',ajouter_section);
        $(".sections").find("a.modifier").on('click',function(event){
            modifier_section($(this).parent().data("section_id"));
        });
        $(".sections").find("a.supprimer").on('click',function(){
            supprimer_section($(this).parent().data("section_id"));
        });
    }
    
    function ajouter_section(){
        var html = '<p>' +
                        'Nom de la section <input id="txtTitreSection" type="text" />' +
                    '</p>' +
                    '<p>' +
                        'Description' +
                    '</p>' +
                    '<textarea id="txtDescriptionSection"></textarea>' +
                    '<br />' +
                    '<button id="btnAjouterSection">Ajouter</button>';
        $('#central').html(html);
        
        $('#btnAjouterSection').on('click',function(){
            var section = new Object();
            section.id = (new Date()).getTime().toString();
            section.titre = $("#txtTitreSection").val();
            section.description = $('#txtDescriptionSection').val();
            dal.sections.ajouter(section);
            gestion_sections();
        });
    }
    
    function ajouter_atelier(){
        var html = '<h2>Ajouter une activité</h2>' +
                '<p>' +
                    'Nom de l\'activité <input id="txtTitre" type="text" />' +
                '</p>' +
                '<p>' +
                    'Date d\'échéance <input id="dateEcheance" type="date" />' +
                '</p>' +
                '<p>Ajouter dans ' +
                '<select id="sect_id">';
        var sections = dal.sections.liste();
        for(i=0;i<sections.length;i++){
            html += '<option value="'+sections[i].id+'">' + sections[i].titre + '</option>';
        }
        html += '</select>' + 
                '<button id="btnAjouterAtelier">Ajouter</button>';
        $("#central").html(html);
        
        $("#btnAjouterAtelier").on('click',function(){
            var ressource = new Object();
            ressource.id = (new Date()).getTime().toString();
            ressource.type = 'atelier';
            ressource.id_section = $('#sect_id').val();
            ressource.titre = $("#txtTitre").val();
            ressource.echeance = $("#dateEcheance").val();
            dal.ressources.ajouter(ressource);
            gestion_contenu();
        });
    }
    
    function ajouter_ressource(){
        var html = '<h2>Ajouter une ressource</h2>' +
                '<p>' +
                    'Nom de la ressource <input id="txtTitre" type="text" />' +
                '</p>' +
                '<p>' +
                    'URL <input id="txtURL" type="text" />' +
                '</p>' + 
                '<select id="sect_id">';
        var sections = dal.sections.liste();
        for(i=0;i<sections.length;i++){
            html += '<option value="'+sections[i].id+'">' + sections[i].titre + '</option>';
        }
        html += '</select>' + 
                '<button id="btnAjouterRessource">Ajouter</button>';
        
        $('#central').html(html);
        
        $('#btnAjouterRessource').on('click',function(){
            var ressource = new Object();
            ressource.id = (new Date()).getDate().toString();
            ressource.type = 'ressource';
            ressource.id_section = $('#sect_id').val();
            ressource.titre = $("#txtTitre").val();
            ressource.url = $("#txtURL").val();
            dal.ressources.ajouter(ressource);
            gestion_contenu();
        });
    }
    
    function gestion_contenu(){
        var html = '<h2>Liste des ressources</h2>' +
                '<a id="refajouterressource" href="#">Ajouter Ressource</a>' +
                '<a id="refajouteratelier" href="#">Ajouter Activité</a>' + 
                '<ul class="no-icon">';
        var ressources = dal.ressources.liste();
        for(i=0;i<ressources.length;i++){
            html += '<li>['+ressources[i].type+'] '+ ressources[i].titre + ' (<a class="modifier" href="#">Modifier</a>, <a class="supprimer" href="#">Supprimer</a>)</li>'
        }
        html += '</ul>';
        
        $('#central').html(html);
        
        $("#refajouterressource").on('click',function(){
            ajouter_ressource();
        });
        $("#refajouteratelier").on('click',function(){
            ajouter_atelier();
        });
    }

    function login() {
        var user = dal.utilisateurs.get($("#utilisateur").val());
        if (!user) {
            alert("Code MS non-existant");
        } else {
            if (user.motdepasse === $("#password").val()) {
                session = user;
                dal.session.set(session);
                load("accueil");
            } else {
                alert("Mot de passe invalide");
            }
        }
    }
    
    if(dal.session.isActive()){
        console.log("is active");
        load("accueil");
    } else {
        $('#btnLogin').on('click', login);
    }
});
