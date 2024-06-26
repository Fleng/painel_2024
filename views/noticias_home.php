
<?php 

$query_publicacao = "SELECT * FROM blog WHERE blog_status = '1' ORDER BY blog_id DESC LIMIT 3";
$resultado_publicacao = mysqli_query($conexao, $query_publicacao);
while ($dado = mysqli_fetch_assoc($resultado_publicacao)) 
{
    foreach ($dado as $key => $value) {
        ${$key} = $value;
    }

    $blog_data = date('d/m/Y', strtotime($blog_data));

    if ($blog_status=="1") { $blog_ativo ="<i class=\"bi bi-check-circle icone_verde\"></i>";}
    if ($blog_status=="0") { $blog_ativo ="<i class=\"bi bi-x-circle icone_vermelho\"></i>";}
    if ($blog_status=="3") { $blog_ativo ="<i class=\"bi bi-trash icone_vermelho\"></i>";}

    echo "
    <div class=\"card noticia_card\" style=\"width: 16rem;\">
  <img src=\"./image/blog/$blog_imagem_capa\" class=\"card-img-top\" alt=\".$blog_titulo\">
  <div class=\"card-body\">
  <h6 class=\"data_noticia\">$blog_data</h6>
    <h5 class=\"titulo_noticia\">$blog_titulo</h5>
    <p class=\"subtitulo_noticia\">$blog_subtitulo</p>
    <a href=\"./blog_editar?publicacao=$blog_token\" class=\"btn btn-sm btn-success\" target=\"_blank\"><i class=\"bi bi-pencil-square\"></i></a>
  </div>
</div>";

}


?>

<div class="row">
  <div class="col-12">
    <a href="" class="link_verde">Ver todas</a>
  </div>
</div>