var dal = {
    tables: ["utilisateurs", "sections", "ressources","session"],
    utilisateurs: {
        get: function(codems) {
            var user = dal.storage['utilisateurs'].filter(function(utilisateur) {
                return utilisateur.codems === codems
            });

            return (user.length === 0) ? false : user[0];
        },
        ajouter: function(utilisateur) {
            dal.storage['utilisateurs'].push(utilisateur);
            dal.persist();
        },
        modifier: function(utilisateur) {
            this.supprimer(utilisateur.codems);
            this.ajouter(utilisateur);
        },
        supprimer: function(codems) {
            dal.storage['utilisateurs'].splice(dal.storage['utilisateurs'].indexOf(codems), 1);
            dal.persist();
        }
    },
    sections: {
        liste: function() {
            return dal.storage['sections'];
        },
        get: function(id){
            var sect = dal.storage['sections'].filter(function(section) {
                return (section.id === id.toString());
            });
            return (sect.length === 0) ? false : sect[0];
        },
        ajouter: function(section) {
            dal.storage['sections'].push(section);
            dal.persist();
        },
        modifier: function(section) {
            this.supprimer(section.id);
            this.ajouter(section);
        },
        supprimer: function(id) {
            dal.storage['sections'].splice(dal.storage['sections'].indexOf(id), 1);
            dal.persist();
        }
    },
    ressources: {
        liste: function(){
            return dal.storage['ressources'];
        },
        listeParSection: function(id_section) {
            return dal.storage['ressources'].filter(function(ressource) {
                return ressource.id_section === id_section;
            });
        },
        get: function(id){
            var res = dal.storage['ressources'].filter(function(ressource) {
                return ressource.id === id;
            });

            return (res.length === 0) ? false : res[0];
        },
        ajouter: function(ressource) {
            dal.storage['ressources'].push(ressource);
            dal.persist();
        },
        modifier: function(ressource) {
            this.supprimer(ressource.id);
            this.ajouter(ressource);
        },
        supprimer: function(id) {
            dal.storage['ressources'].splice(dal.storage['ressources'].indexOf(id), 1);
            dal.persist();
        }
    },
    session: {
        set: function(sess) {
            dal.storage['session'] = sess;
            //console.log("session to set");
            //console.log(dal.storage);
            dal.persist();
        },
        get: function() {
            return dal.storage['session'];
        },
        destroy: function() {
            dal.storage['session'] = null;
            dal.persist();
        },
        isActive: function() {
            sess = dal.session.get();
            //console.log(sess);
            if(sess !== null && typeof sess !== 'undefined'){
                session = sess;
                return true;
            } else {
                return false;
            }
        }
    },
    // Charge le localStorage dans une variable pour l'utliser comme un objet
    initialize: function() {
        console.log("init");
        this.storage = new Array();
        for (i = 0; i < this.tables.length; i++) {
            if (localStorage[this.tables[i]]) {
                this.storage[this.tables[i]] = $.parseJSON(localStorage[this.tables[i]]);
            } else {
                if(this.tables[i] !== 'session'){
                    this.storage[this.tables[i]] = new Array();
                } else {
                    this.storage[this.tables[i]] = null;
                }
                
            }
        }
    },
    persist: function() {
        for (i = 0; i < this.tables.length; i++) {
            localStorage[this.tables[i]] = JSON.stringify(this.storage[this.tables[i]]);
        }
    },
    populate: function() {
        this.storage["utilisateurs"] = [{
                "role": "étudiant",
                "codems": "ab123456",
                "nom": "Duguay",
                "prenom": "Phil",
                "motdepasse": "DUG29845"
            }, {
                "role": "professeur",
                "codems": "pf129340",
                "nom": "Perrot",
                "prenom": "Michel",
                "motdepasse": "PER12933"
            }, {
                "role": "démonstrateur",
                "codems": "ty380943",
                "nom": "Tibault",
                "prenom": "Patrick",
                "motdepasse": "TIB19403"
            }];
        this.storage["sections"] = [
            {
                "id": "sport",
                "titre": "Sports Extrêmes"
            },
            {
                "id": "voyage",
                "titre": "Voyage aventure"
            }
        ];
        this.storage["ressources"] = [
            {
                "id": "res001",
                "type": "ressource",
                "titre": "Hockey",
                "url": "http://canadiens.nhl.com/fr/index.html",
                "id_section": "sport"
            },
            {
                "id": "res0002",
                "type": "atelier",
                "titre": "Conception d'un métronome",
                "id_section": "voyage"
            }
        ];
        this.persist();
    }
};