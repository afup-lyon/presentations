# Slides des meetups de l'antenne AFUP Lyon

Ce repository contient les archives des slides des meetups de l'antenne lyonnaise de l'AFUP.

Le template de présentation est basé sur [reveal.js](https://revealjs.com/). Il reprend le design du deck Canva de
l'antenne : fond à hexagones, cartes et photos hexagonales, polices Belgrano / Anton / Roboto Condensed (embarquées,
la présentation fonctionne sans connexion).

## Générer des slides

Pour générer de nouvelles slides, il faut tout d'abord modifier les options dans ce fichier : `config/options.php`.

Le dossier `config/img` contient les différentes images des slides, elles sont copiées lors de la génération.

Une fois les options modifiées et les images mises à jour, un script PHP permet de générer un nouveau dossier :

```shell
php bin/generate.php --build
```

> [!NOTE]
> Il faut installer les dépendances avec `composer` avant de lancer le script.

Le script va alors générer un dossier dans `_slides` ayant pour nom la date du meetup configuré dans les options.
`--override` remplace un dossier existant, `--build` lance `npm install && npm run build` à la fin.

Pour projeter : `cd _slides/<date> && npm run start`, puis ouvrir http://localhost:8000.

Il ne reste plus qu'à modifier le HTML selon les besoins plus spécifiques du meetup.

## Déroulé et options

| Slide | Option dans `config/options.php` | Images |
|---|---|---|
| Bienvenue | `->presentePar('Antony')` : photo de la personne qui présente (doit être dans `benevoles()`) | `divers/coucou.gif` (à remplacer pour changer de GIF) |
| L'association | `->introduction(fn ($i) => $i->association())` | `qr/code-of-conduct.png` |
| Baromètre, veille, Forum PHP, accompagnement | `->introduction(fn ($i) => $i->actions())` | `qr/barometre.png`, `actions/` |
| Les antennes | `->introduction(fn ($i) => $i->antennes())` | `antennes/` |
| Forum PHP de l'année | `->introduction(fn ($i) => $i->forum())` | `forum/` |
| Vos bénévoles | `->benevoles(fn ($b) => $b->with('Nom', 'photo.png'))` | `benevoles/` |
| Contacts | `->contact(fn ($c) => $c->meetup(…)->linkedIn(…)->bluesky(…)->mail(…))` | `qr/contacts.png` |
| Save the date | `->calendrierAntenne(fn ($c) => $c->date('2026-12-15', 'Apéro 🍻', 'logo-du-bar.png'))` (logo facultatif) | `calendrier/` |
| AFUP Day | `->afupDay(fn ($a) => $a->date(…)->villes(…)->…)` | `afup-day/`, `qr/cfp.png` |
| Sponsors | `->sponsors(fn ($s) => $s->with('Efalia', 'efalia.png'))` et `->withJetbrainsGift()` | `sponsors/` |
| Programme | `->talks(fn ($t) => $t->with('Speaker', 'Titre du talk'))` | |
| Merci | | `divers/php-rocks.png` |

Le script affiche un avertissement quand une information manque (personne qui présente, sponsors, talks…).

Les styles sont dans `templates/_directory/css/custom.scss` (mise en page, en pixels d'un canevas 1920×1080) et
`templates/_directory/css/theme/source/afup-lyon.scss` (couleurs et polices).
