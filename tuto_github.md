# Guide des commandes Git importantes

## Sommaire 
* [Créer un clone](#créer-un-clone)
* [Envoyer un commit](#envoyer-un-commit)
* [Mettre à jour son dossier local](#mettre-à-jour-son-dossier-local)
* [Les branches](#les-branches)
    * [Créer une nouvelle branche](#créer-une-nouvelle-branche)
    * [Mettre à jour ses branches en local](#mettre-à-jour-ses-branches-en-local)
    * [Se positionner dans une branche](#se-positionner-dans-une-branche)

## Créer un clone
**Le clone ne doit se faire qu'une seule fois par reposotory (sauf suppression).**

1. Se positionner à l'endroit où on souhaite créer le clone: `cd chemin/du/dossier`.
2. Créer le clone: `git clone cle_ssh` (ex de clé ssh: git@github.com:KylianGabbianelli/Private_Repository.git).

## Envoyer un commit
**Dans le cas où nous travaillons avec des branches, positionnez-vous dans la bonne branche. Voir [Se positionner dans une branche](#se-positionner-dans-une-branche) .**

1. Ajouter les fichiers au commit: `git add -a` pour ajouter tous les fichiers du répertoire courant, ou `git add chemin/du/fichier` pour ajouter un fichier spécifique.

2. Ajouter un message au commit: `git commit -m "Votre message"`

3. Envoyer le commit sur github: `git push`

4. Dans le cas où il y a eu une erreur, vérifier si l'erreur n'est pas grave puis réessayer avec `git push --force`.

## Mettre à jour son dossier local
**Dans le cas où nous travaillons avec des branches, positionnez-vous dans la bonne branche. Voir [Se positionner dans une branche](#se-positionner-dans-une-branche) .**

`git pull`.

## Les branches

### Créer une nouvelle branche

1. Créer la branche en local: `git branch nom_de_la_branche`.

2. Envoie dans la branche sur github: `git push --set-upstream origin nom_de_la_branche`.

### Mettre à jour ses branches en local

`git fetch`.

### Se positionner dans une branche

`git checkout nom_de_la_branche`.