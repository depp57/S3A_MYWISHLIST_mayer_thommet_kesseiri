<?php

require_once 'vendor/autoload.php';

use mywishlist\controleurs\ControleurListes;
use mywishlist\conf\Database;

Database::connect();
$app = new \Slim\Slim();

$app->get('/', function() {
    ControleurListes::default();
});

$app->get('/listes/', function() {
    //echo "Affiche toutes les listes";
    ControleurListes::getListes();
});

$app->get('/liste/:id_liste', function($id_liste) {
    //echo "Affiche tous les items de la liste ".$id_liste;
    ControleurListes::getAllItems($id_liste);
})->name('route_liste');

$app->get('/liste/:id_liste/item/:id_item', function($id_liste, $id_item) {
    echo "Affiche l'item ".$id_item." de la liste ".$id_liste;
})->name('route_item');
$app->run();

