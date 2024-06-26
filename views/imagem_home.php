<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./" target="_blank">Home</a></li>
        <li class="breadcrumb-item active_bread" aria-current="page">Imagens</li>
    </ol>
    <hr>
</nav>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-3">
                <h3>Cadastrar imagens</h3>
            </div>
        </div>
        <form action="./models/imagem_update.php" method="POST" enctype="multipart/form-data">
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile02" name="files[]" multiple required>
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-12 mb-3">
        <h3>Lista de imagens</h3>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="image_container_painel">
                <?php
                $imageDir = './image/';
                $images = glob($imageDir . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);

                foreach ($images as $image) {
                    echo '<div class="image_bloco_painel">
                            <div class="image_container_controler_painel">
                                <div class="image_container_image_painel">
                                    <img src="' . $image . '" alt="Imagem">
                                </div>
                            </div>
                            <div class="image_container_botoes_painel">
                            <textarea id="teste">'.$image.'</textarea>
                        </div>
                            <div class="image_container_botoes_painel">
                                <button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                            </div>
                          </div>';
                }
                ?>
            </div>

        </div>
    </div>
</div>
</div>