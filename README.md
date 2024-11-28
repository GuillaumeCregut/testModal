# About

Simple project to test stimulus and turbo frames to make an interactive dashboard.

Interessants things are, in this part :

 - assets/controllers/quotation_controller.js
 - assets/controllers/quotationLine_controller.js
 - src/Controller/Quotations/QuotationController.php
 - src/Twig/Components/Quotations/*
 - src/Entity/Quotation.php
 - src/Entity/QuotationLine.php
 - src/Form/Quotations/*
 - templates/components/Quotations/*
 - templates/quotations/*
 

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