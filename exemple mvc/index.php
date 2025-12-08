<?php 

require 'controller.php';
require 'model.php';

// $_GET['p']; Ce que l'utilisateur aura saisie

if($_GET['p'] == 'liste-event'){
    event_list();
} elseif ($_GET['p'] == 'home') {
    home();
}