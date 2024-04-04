# Projet Music Vercors Festival

L'idée est de réaliser un site de réservations de billets. L'utilisateur peut réserver des billets, s'inscrire puis se connecter afin de retrouver sa réservation. 
Il peut ensuite envoyer par mail le récapitulatif de sa réservation. 

## Configuration

Les configurations pour la base de données se trouvent dans le fichier config, il faut changer les noms. 
La base de données se trouve dans le fichier Migration. 
Créer un localhost sur la branche public. 

## Realisation

Sur la base Model Vue Controller, avec redirection afin d'éviter que l'utilisateur n'ait accès aux fichiers administrateurs. Les redirections se font à l'aide de .htaccess dans le fichier source et dans le fichier public.

## Test 

La connexion peut se tester avec :
email : Jean-Louis.Michel@gmail.com
mot de passe : michel

## Page administrateur 

La page administrateur est disponible en renseignant directement dans l'URL "admin" après le Home Url. 
Un mot de passe est demandé, il faut renseigner 1234 pour avoir accès à la liste de toutes les réservations.


