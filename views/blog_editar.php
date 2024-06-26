<?php 
$blog_token = filter_var($_GET['publicacao'], FILTER_SANITIZE_SPECIAL_CHARS);
$query_publicacao = "SELECT * FROM blog WHERE blog_token='$blog_token' ORDER BY blog_id DESC";
$resultado_publicacao = mysqli_query($conexao, $query_publicacao);
    while ($dado = mysqli_fetch_assoc($resultado_publicacao)) 
    {
      foreach ($dado as $key => $value) {
        ${$key} = $value;
    }
    }
?>
<div class="container">
<?php include "./libraries/mensagem.php";?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./" >Home</a></li>
            <li class="breadcrumb-item"><a href="./blog_index" >Blog</a></li>
            <li class="breadcrumb-item active_bread" aria-current="page">Editar publicação</li>
        </ol>
        <hr>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                <h3>Editar publicação: <span class="blog_texto_importante"><?= $blog_titulo;?></span></h3>
                </div>
            </div>
        <div class="row">
            <div class="col-12">
                <?php include "./views/form/blog_publicacao.php";?>
            </div>
        </div>
        </div>
    </div>

</div>