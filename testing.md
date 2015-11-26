# Procédure de test

Comment tester une application Laravel.

## En 7 étapes

1. Installation
    1. Qu'on va trouver dans le README ou INSTALL.
    2. Si absente, suivre ceci:

    ```shell
    $ git clone ... projet
    $ composer install
    $ # adapt .env
    $ npm install
    $ gulp --production
    $ php artisan migrate
    $ php artisan db:seed
    ```

2. Ouvrir le site en: `http://localhost/projet/public/`
    1. Smoke testing (erreurs 404, et 500)
    2. Est-ce que ça fait ce qui est promis?

3. Tester le modèle des données
    1. Est-ce que le modèle respecte un minimum les formes normales (1,2,3)
    2. Défaire et refaire les migrations

    ```shell
    $ php artistan migrate:refresh
    ```

4. Tester l'HTML
    1. https://validator.w3.org/ avec les options de base
    2. (BONUS) Vérifier que les titres sont correctement définis (outline)

5. Séparation des logiques métiers et de présentation.
    1. Trouver de l'HTML dans les fichiers PHP.
    2. Trouver du PHP dans les fichiers HTML/blade.

    ```shell
    $ ack-grep --type=php "<[^>]+>" app
    $ ack-grep --type=php "<\?php" resources/views
    ```

6. Requêtes MySQL
    1. Regarder les requêtes faites sur les pages.
    2. Problème du chargement non-glouton: cas dit du  `Select N+1`.
    3. Bon usage de l'ORM
        1. essentiellement non-usage du `DB::*`;
        2. dans la mesure du possible, usage des relations.

7. Autres? Idées bienvenues.
