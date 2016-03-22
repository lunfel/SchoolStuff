
INSERT INTO  `utilisateurs` (
	`id` ,
	`clientProvider`,
	`idClient` ,
	`dateActivation` ,
	`actif`
)

VALUES (
	1, 'Google', '95984',  '2014-04-08',  '1'
), (
	2, 'Google',  '13451',  '2014-04-04',  '1'
);

INSERT INTO  `minuteurs` (
	`id` ,
	`idUtilisateur` ,
	`alerteTimestamp` ,
	`alertNb` ,
	`dateDebut` ,
	`dateDeclenchement` ,
	`motDePasseMd5` ,
	`motDePasseAlerteMd5` ,
	`nbEssais` ,
	`declencher` ,
	`actif` ,
	`message`
)
VALUES (
	1 ,  1, 
	CURRENT_TIMESTAMP ,  0,  '2014-04-10 00:00:00',  NULL, 
	MD5(  '123' ) , MD5(  '987' ) ,  0,  0,  1,  'Alerte Rouge!'
);

INSERT INTO  `contacts_texto` (
	`id` ,
	`idMinuteur` ,
	`contact` ,
	`dateEnvoi` ,
	`statusEnvoi`
)
VALUES (
	1 ,  '1',  '5147913610',  '2014-04-10 00:00:00',  'En attente'
);

INSERT INTO  `notes_text` (
	`id` ,
	`idMinuteur` ,
	`note` ,
	`latitude` ,
	`longitude`
)
VALUES (
	1 ,  '1',  'Première',  '300',  '200'
	), (
	2 ,  '1',  'Deuxième',  '350',  '225'
);
