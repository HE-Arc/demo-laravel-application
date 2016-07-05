# Demo laravel application

Une application d'exemple avec le framework Laravel. Qui a pour but de donner
un exemple, pas forcément idéal ni universel, de ce qu'on peut faire.

Le meilleur moyen de s'en servir et de refaire ce qui a été fait ici et
essayant de le modifier selon vos envies.

## Installation

```shell
$ git clone https://github.com/HE-Arc/demo-laravel-application.git
$ cd demo-laravel-application
$ composer install
$ # adapt the .env.example
$ npm install
$ npm run prod
$ php artisan migrate
$ php artisan db:seed
$ # configure the web browser if necessary.
```

## Docker setup

Docker permet de créer un environnement complet de services indépendants

```shell
$ docker-compose build
$ docker-compose up -d
$ docker-compose exec php /bin/sh
# su john
$ . /etc/profile
$ cd ~/html
$ # then follow the normal installation.
```
