API
===

Description de l'API RESTful du serveur Ange-Gardien

## Récupérer toutes les alarmes d'un utilisateur

```
Méthode :   	GET
URI :      		/alarmes/{uid}
params :
	uid :    	[0-9]+
```

On retourne une liste d'alarmes. {uid} correspond à l'identifiant de l'utilisateur duquel on veut récupérer les alarmes. Si l'utilisateur donné n'existe pas ou celui-ci n'a pas d'alarmes associées, on retournera une liste vide.

Voici un exemple de retour au format JSON

```
[{
    "id": "1",
    "alerteTimestamp": "2014-04-10 01:30:36",
    "alerteNb": null,
    "dateDebut": "2014-04-10 00:00:00",
    "dateDeclenchement": "2014-04-10 00:00:00",
    "motDePasseMd5": "202cb962ac59075b964b07152d234b70",
    "motDePasseAlerteMd5": "df6d2338b2b8fce1ec2f6dda0a630eb0",
    "nbEssais": "0",
    "declencher": "0",
    "actif": "1",
    "message": "Alerte Rouge!",
    "ContactsTexto": [{
        "id": "1",
        "dateEnvoi": {
            "date": "2014-04-10 00:00:00",
            "timezone_type": 3,
            "timezone": "Europe\/Berlin"
        },
        "statusEnvoi": "En attente",
        "contact": "5147913610"
    }],
    "NotesText": [{
        "id": "1",
        "longitude": "200.000000",
        "latitude": "300.000000",
        "note": null
    }, {
        "id": "2",
        "longitude": "225.000000",
        "latitude": "350.000000",
        "note": null
    }]
}]
```

## Ajouter une alarme

```
Méthode :		POST
URI : 			/alarmes/ajouter/{uid}
params :
	uid :		[0-9]+
```

## Ajouter une note à une alarme

```
Méthode : 		POST
URI :			/notes/ajouter/{idAlarme}
params :
	idAlarme :	[0-9]+
```

## Désactiver/moquer une alarme

```
Méthode : 		POST
URI : 			/alarmes/desactiver/{idAlarme}
params :
	idAlarme :	[0-9]+
```

## Désactiver un compte

```
Méthode : 		GET
URI : 			/comptes/desactiver/{uid}
params :
	uid :		[0-9]+
```

## Réactiver un compte

```
Méthode : 		GET
URI :			/comptes/reactiver/{uid}
params :
	uid :		[0-9]+
```

## Rapport HTML

```
Méthode : 		GET
URI :			/rapports/{idAlarme}
params :
	idAlarme :	[0-9]+
```