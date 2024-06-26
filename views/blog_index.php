<div class="container">
    <?php include "./libraries/mensagem.php";?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item active_bread" aria-current="page">Blog</li>
        </ol>
        <hr>
    </nav>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <h3>Cadastrar notícia</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="./blog_noticia_cadastrar" class="btn btn-success" ><i class="bi bi-window-plus"></i> Cadastrar</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                <h3>Lista de publicações</h3>
                </div>
            </div>
        <div class="row">
            <div class="col-12">
                <?php include "./views/table/blog_publicacoes.php";?>
            </div>
        </div>
        </div>
    </div>

</div>