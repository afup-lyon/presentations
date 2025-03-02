# Slides des meetups de l'antenne AFUP Lyon

Ce repository contient les archives des slides des meetups de l'antenne lyonnaise de l'AFUP.

Le template de présentation est basé sur [reveal.js](https://revealjs.com/)

## Générer des slides

Pour générer de nouvelles slides, il faut tout d'abord modifier les options dans ce fichier : `config/options.php`.

Ce fichier est documenté avec toutes les options disponibles.

Le dossier `config/img` contient les différentes images des slides, elles sont copiées lors de la génération.

Une fois les options modifiées et les images mises à jour, un script PHP permet de générer un nouveau dossier :

```shell
php bin/generate.php
```

> [!NOTE]
> Il faut installer les dépendances avec `composer` avant de lancer le script.

Le script va alors générer un dossier dans `_slides` ayant pour nom la date du meetup configuré dans les options.

Il ne reste plus qu'à modifier le HTML selon les besoins plus spécifiques du meetup.
