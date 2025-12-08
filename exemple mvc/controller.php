<?php 

function event_list() {
    $event = event_list_model();

    include 'views/eventListView.php';
}

function home() {
    $title = get_info_model();

    include 'views/homeView.php';
}