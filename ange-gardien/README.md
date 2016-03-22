Ange Guardien
=============

Préface
-------

Notre projet d’application “Ange Gardien” a pour intention de participer à la diminution ainsi qu’à la dissuation des agressions. Un criminel qui s’attaque à une victime qui utilise cette application laissera beaucoup de pistes aux enquêteurs. La peur du criminel d’exposer des pistes qui mèneraient à l’identifier, contibuera à le dissuader de commettre son acte.

Nous croyons qu’un tel projet peut, à large échelle, avoir un effet majeur de dissuasion sur les criminels.

Description
-----------

Notre système logiciel se nomme Ange Gardien. Il s’agit d’une application permettant de transmettre une alarme préalablement fixée par un utilisateur lorsqu’il prévoit vivre une situation potentiellement à risque. L’utilisateur programme un décompte qu’il doit désactiver avant sa fin sans quoi les destinataires qu’il a préalablement sélectionnés recevront un signal de détresse sous forme d’un sms. Il ne s’agit pas ici de systèmes reliés à une centrale quelconque telle que les forces policières ou autres. L’objectif est simplement d’aviser une ou quelques personnes proches d’une situation problématique. Il est toutefois à noter que l’administrateur pourra produire des rapports avec les informations des alertes pour collaborer aux forces policières dans le besoin.

Ce système permet aux usagers de s’initier dans des situations jugées à risque telles que des rencontres en personne faites via un site Internet ou passer dans un endroit moins fréquenter comme un parc ou ruelle sombre.

Vue d'ensemble des fonctionnalités
----------------------------------

Le système Ange Gardien permet aux utilisateurs sur leur appareil mobile de mettre en place des alarmes. Ces alarmes ont des conditions de déclenchement qui sont déterminées par l’utilisateur. Les utilisateurs doivent aussi fournir à même leur alarme un message ainsi qu’une liste de destinataires. 

Une fois mises en place, les alarmes sont envoyées au serveur à l’aide d’une connection Internet. Lorsque l’alarme est synchronisée avec le serveur, c’est ce dernier qui gère l’alarme. Dépendement des paramètres établis, le serveur vérifiera à intervalle régulier si les conditions de déclanchement de l’alarme ont lieu. Si c’est le cas, on donne un sursis à l’utilisateur pour annuler l’alarme. Si celui-ci ne donne pas de réponse ou une réponse diverse (Faire croire à son entourage que tout va bien en transmettant un message de détresse), alors le système central (serveur) émettra les messages stockés en mémoire. Ceci est aussi valide dans le cas où l’application mobile ne peut entrer en communication avec le serveur. On prend pour acquis que l’utilisateur est en incapacité dans ce cas.

Dans le cas où l’utilisateur donne une réponse indiquant que tout va bien, l’alarme n’est pas déclanchée.Elle est toutefois conservée dans le système pour une vérification des conditions de déclanchement à nouveau sur le même intervalle régulier.