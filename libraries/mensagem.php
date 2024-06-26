<?php 
@$resultado = filter_var($_GET['resultado'], FILTER_SANITIZE_SPECIAL_CHARS);
$hora_atual = date('d/m/Y \à\s H:i:s');

if ($resultado==1) { echo '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
    Atualização realizada com sucesso em '. $hora_atual .'!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';}

?>