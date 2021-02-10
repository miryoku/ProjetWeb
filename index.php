<?php
require('config/main.php');


/* a mettre a auto load*/
require_once("model/Manga.php");
require_once("model/DetailManga.php");
require_once("model/User.php");
require_once("model/Connection.php");
require_once('model/Sql.php');
require_once('model/SqlManga.php');
require_once('model/SqlMangaDetail.php');
require_once('model/SqlLogin.php');
require_once('model/SqlnotObject.php');


define('ROOT_PATH', "/projetWeb/"); // Chemin qui suit le nom de domaine. Exemple: http://monprojet.local/08_router/ le path a indiqué sera donc '/08_router/'
$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']); // On récupère juste la request, sans le chemin du dossier.
$request = trim($request, '/'); // Permer de supprimer le slash devant la request si elle existe
$segments = array_filter(explode('/', $request)); // On découpe la requête pour obtenir une liste et on supprime les éléments Null
if (!$segments){
    $segments[] = 'welcome'; // Si rien dans segments alors on injecte la page "welcome" qui sera la page par défaut (page d'accueil)
}
// Structure URL: http://monprojet.be/{REQ_TYPE}/{REQ_TYPE_ID}/{REQ_ACTION}
define('REQ_TYPE', $segments[0] ?? Null);
define('REQ_TYPE_ID', $segments[1] ?? Null);
define('REQ_ACTION', $segments[2] ?? Null);
define('REQ_ACTION2', $segments[3] ?? Null);
$file = 'control/'.REQ_TYPE.'.php';

session_start();
require_once('view/header.php');



if(file_exists($file)){ // On vérifie que le fichier php existe
    
    require $file;

}
else {
    require 'view/404.php';

}

require_once('view/footer.php');

?>