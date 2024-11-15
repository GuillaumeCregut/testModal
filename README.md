# About

Simple project to test stimulus and turbo frames to make an interactive dashboard.

Interessants things are :

 - assets/controllers/modal_controller.js
 - src/Controller/TestController.php
 - templates/tests/*

## Installation
clone this repo.

    Run composer install

    Run php/bin/console doctrine:migration:migrate

Enjoy
## Use without install
In your Symfony webapp project, install :

    composer require symfony/asset-mapper
then 

    composer require symfony/ux-turbo