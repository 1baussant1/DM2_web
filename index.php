<?php
declare(strict_types=1);

// demarrer la session
session_start();

require_once 'flight/Flight.php';

// connect
$server = 'localhost';
$user = 'root';
$pass = 'root';
$bdd = 'geobase';
$link = mysqli_connect($server, $user, $pass, $bdd);
// stocke $link de maniere globale
Flight::set('db', $link);

// route "/" = page d'accueil
Flight::route('/', function () {
    // renvoie la vue accueil.php
    Flight::render('accueil');
});

Flight::route('/departements', function () {
    // recupere $link
    $link = Flight::get('db');

    // departements
    $sql = 'SELECT insee, nom FROM departements';
    // modifie requete si ?region=N dans l'URL
    if (isset($_GET['region'])) {
        $sql = $sql . ' WHERE region_insee = ' . $_GET['region'];
    }
    $requeteDepartements = mysqli_query($link, $sql);

    //regions
    $sql = 'SELECT insee, nom FROM regions ORDER BY nom';
    $requeteRegions = mysqli_query($link, $sql);

    Flight::render('deps', [
        'departements' => $requeteDepartements,
        'regions' => $requeteRegions,
    ]);
});

// http://localhost/login
// http://localhost/login?user=...&pass=...
Flight::route('GET /login', function () {
    $user = null;
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
    }
    Flight::render('login', ['user' => $user]);
});

Flight::route('POST /login', function () {
    $user = $_POST['user'];
    $_SESSION['user'] = $user;
    Flight::render('login', ['user' => $user]);
});


Flight::route('/carte',function () {
    Flight::render('carte');
});

Flight::route('/villes', function () {
    $link = Flight::get('db');

    $tab = [];

    if (isset($_GET['recherche'])) {
        $recherche = $_GET['recherche'];

        if (!empty($recherche)) {
            $requete = mysqli_query($link, "SELECT nom, insee FROM communes WHERE nom LIKE '$recherche' LIMIT 10");
            foreach ($requete as $valeur) {
                $tab[] = $valeur;
            }
        }
    }

    if (isset($_GET['insee_ville'])) {
        $insee = $_GET['insee_ville'];
        $requete = mysqli_query($link, "SELECT ST_AsGeojson(geometry) AS geom FROM communes WHERE insee LIKE '$insee'");
        foreach ($requete as $valeur) {
            $tab[] = json_decode($valeur['geom']);
        }
    }

    Flight::json($tab);
});

Flight::route('/hydro', function () {
    Flight::render('hydro');
});

Flight::start();
