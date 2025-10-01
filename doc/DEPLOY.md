# Procédure de Déploiement

Décrivez ci-dessous votre procédure de déploiement en détaillant chacune des étapes. De la préparation du VPS à la méthodologie de déploiement continu.

## Préparation du VPS & Méthode de déploiement

On installe AAPanel sur notre VM avec la commande trouvable sur leur site. On attend un petit moment pour l'installation puis on clique sur le lien 'internal' fourni, et on s'identifie avec les identifiants donnés juste en dessous.
On crée ensuite le site sur AAPanel, en cliquant sur LNMP, qui sont donc les technologies installées pour notre site.
On remplit ensuite les infos comme l'ip de la VM.

On crée le repo distant sur VPS (sur la VM), on se déplace dans var puis on crée un dossier avec mkdir, depot-git par exemple, on rentre dans ce dossier et on fait un git init --bare.
On ajoute ce nouveau repo distant à notre projet local avec une commande git remote add vps root@172.16.1.x:/var/depot-git.
On peut faire un push vers le VPS, et lancer la commande déploiement: git --work-tree=/www/wwwroot/nomdusite --git-dir=/var/depot-git checkout -f {tag} , en remplaçant donc évidemment le nom du site et le tag donc.
On ajoute ensuite le .env et on fait le composer sur aaPanel, il faut ajouter le env à la main donc on accède à document root et on l'ajoute manuellement avec le bouton de création, on pourra ensuite y accéder et ajouter le nécessaire.
On peut également ajouter une base de données avec le bouton add DB, on renseigne les informations, db username etc.

Enfin pour l'automatisation du déploiement on va faire un touch deploy.sh, puis un nano dessus. On ajoute ceci:
VARNAME=${1:?"missing arg 1 for tag name or branch name"}
git --git-dir=/var/depot_git --work-tree=/www/wwwroot/examdeploiement checkout -f $VARNAME
suite à ça on a deux choix, soit en faire un éxécutable soit faire un exe, dans ce cas je préfère faire le deuxième avec: chmod +x deploy.sh
./deploy.sh master # soit master/le nom de la branch soit le tag
