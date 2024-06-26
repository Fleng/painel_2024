<?php

$url = ltrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$rotas = explode('/', $url);
$pagina =  $rotas[1]; /* Em caso de ser o domínio principal, utilize 0. O valor 1 é para subdomínio. */
if (empty($pagina)) { $pagina = "home";}
$url = "./views/" . $pagina . ".php";
if (!file_exists($url)) {
    include_once "./Views/Erro404.php";
} else {
    include_once $url;
}
?>
