### Projet PHP avec Vue.js et Leaflet

Ce projet utilise PHP pour servir une page HTML intégrant Vue.js et Leaflet afin d'afficher une carte interactive avec un formulaire permettant de rechercher et d'afficher des lieux.

## Prérequis

PHP >= 7.4

Un serveur local (Dans notre cas, MAMP)

## Installation

# Cloner le dépôt

GitHub : git clone https://github.com/1baussant1/DM2_web
GitLab : git clone https://gitlab.com/baussant/DM2_web2/-/blob/main/README.md

# Lancer un serveur PHP 

Lancer Mamp en local et importer le projet

## Structure du projet

/votre-repo
│── index.php         # Point d'entrée du projet
│── assets/
│   ├── carte.css     # Feuille de style pour la mise en forme
│   ├── carte.js      # Fichier .js pour le dynamisme du site web
│── views/
│   ├── carte.php     # Composant .php pour le formulaire de recherche + carte
│── flight/
│── README.md         # Documentation du projet

## Utilisation

Ouvrir http://localhost/carte dans un navigateur.

Interagir avec la carte Leaflet affichée sur la page.

Utiliser le formulaire pour rechercher des lieux et les afficher sur la carte.

TADA ! :

![image](https://github.com/user-attachments/assets/fc6274a3-5d6c-4322-bb32-b7a21c668065)


## Technologies utilisées

PHP : Gestion des requêtes et génération de la page

Vue.js : Interface utilisateur réactive

Leaflet : Affichage et gestion de la carte interactive

CSS : Personnalisation du style de la page
