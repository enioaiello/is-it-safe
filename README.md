<p align="center">
    <img src="resources/images/logo.png" alt="Logo" height="128">
</p>

## À propos

**Is It Safe** est un site Internet permettant aux utilisateurs de consulter des signalements réalisés envers un **lien**, une **adresse email**, un **numéro de téléphone** ou une **entreprise**.

## Contexte

Ce projet a été réalisé dans un cadre d'apprentissage. Il s'agit d'un projet fil rouge nous permettant de valider certaines compétences essentielles à la validation de notre deuxième année.

## Fonctionnalités

### Signalements

L'une des fonctionnalités principales du site. La fonctionnalité de signalement permet aux utilisateurs authentifiés de signaler et d'évaluer des éléments selon ces catégories :
- **Numéros de téléphone**
- **Adresses email**
- **Liens**
- **Entreprises** (sous forme de [forum](#forum))

### Forum

Le forum permet, aux utilisateurs authentifiés, de discuter sur la fiabilité d'une entreprise.

### Évaluation

Cette fonctionnalité permet aux utilisateurs de consulter les [signalements](#signalements) :
- **Numéros de téléphone** (sans compte)
- **Adresses email** (sans compte)
- **Liens** (avec compte)
- **Entreprises** (avec compte)

## Installation

### Cloner le dépôt

````bash
git clone https://github.com/enioaiello/is-it-safe.git
````

### Accéder au dépôt cloné

````bash
cd is-it-safe
````

### Installer les dépendances

````bash
composer install
npm install
````

### Copier le fichier d'environnement

````bash
cp .env.example .env
php artisan key:generate
vim .env
````

### Générer la clé

````bash
php artisan key:generate
````

### Effectuer les migrations

> [!IMPORTANT]
> N'oubliez pas de démarrer votre (émulateur de) serveur.
> L'élément le plus important étant d'avoir un serveur **MySQL**.

````bash
php artisan migrate
````

### Démarrer le serveur local PHP

````bash
php artisan serve
````
