# Modifications effectuees

Ce document résume les changements apportés à l'application pour ajouter une page contact.

## Fichiers modifies

### Controllers/ContactController.php

La methode `index()` a été crée pour :

- initialiser les variables `$erreur` et `$success`
- vérifier que les champs `name`, `email` et `message` sont bien renseignés
- préparer le contenu du mail à partir des données du formulaire
- tenter l'envoi avec la fonction `mail()` de PHP
- retourner un message de succès si l'envoi fonctionne
- retourner un message d'erreur si le formulaire est incomplet ou si l'envoi échoue
- transmettre les variables à la vue avec `render('contact/index', [...])`

### Views/contact/index.php

La vue a été crée pour :

- afficher un formulaire de contact basique
- afficher un message d'erreur si la variable `$erreur` est renseignée
- afficher un message de succès si la variable `$success` est renseignée

## Point a adapter

Dans `Controllers/ContactController.php`, l'adresse de destination du mail est encore une valeur de test :

`votre@email.com`

Il faut la remplacer par l'adresse email réelle qui doit recevoir les messages du formulaire.

## Comportement attendu

Quand l'utilisateur remplit correctement le formulaire :

- le message est préparé puis envoyé par email
- un message de confirmation s'affiche dans la page

Quand le formulaire est incomplet ou que l'envoi échoue :

- un message d'erreur s'affiche dans la page

## Lancement avec Docker

Depuis la racine du projet :

```bash
docker compose up --build -d
```

Acces utiles :

- application : http://localhost:8080
- base MySQL : localhost:3307

Parametres MySQL configures dans Docker Compose :

- base : coursportfolio
- utilisateur : app
- mot de passe : app_password

Pour arreter les conteneurs :

```bash
docker compose down
```

Pour reinitialiser aussi la base de donnees Docker :

```bash
docker compose down -v
```
