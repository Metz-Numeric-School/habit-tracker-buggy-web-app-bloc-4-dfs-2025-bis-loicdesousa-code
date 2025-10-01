# Questions

Répondez ici aux questions théoriques en détaillant un maxium vos réponses :

1. Expliquer la procédure pour réserver un nom de domaine chez OVH avec des captures d'écran (arrêtez-vous au paiement) :

Savoir quel nom de domaine on veut et donc aussi ce que l'on vise, on peut vérifier sa disponibilité sur ovh dans la barre de recherche sur le site. voir 1.png
Une fois choisi on peut ajouter des options, choisir la durée, le contenu de l'achat, pour combien de sites, le stockage etc. voir 2.png
On choisit un email lié au nom de domaine. voir 3.png
Il faut ensuite se connecter pour finaliser le paiement.

2. Comment faire pour qu'un nom de domaine pointe vers une adresse IP spécifique ?

Selon l'hébergeur qu'on utilise on peut retrouver ça dans leurs paramètres, on choisit le nom de domaine avec et sans le www et on donne l'adresse ip à pointer, vers laquelle on redirige à la demande du nom de domaine donc.

3. Comment mettre en place un certificat SSL ?

Le protocole SSL assure l'authentification, la confidentialité et l'intégrité des données. Avec apache on peut faire une méthode rapide, activer le module ssl d'apache et activer le site par défaut ssl. Quand on recharge par la suite le site est accessible en https, il y a un certificat ssl valable 10 ans dans /etc/apache2/sites-available .
Nous pouvons générer un certificat ssl via OpenSSL, en installant le packet puis en executant une commande ensuite, cela donne un certificat pour 1 an, et pendant la génération des informations sont demandées (identité, code pays, adresse mail, etc.). On finit en modifiant les autorisations sur la clé pour qu'évidemment la lecture ne soit possible que par le propriétaire.
