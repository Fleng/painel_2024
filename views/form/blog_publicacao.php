<?php 
include "./libraries/conector.php";
?>
<div class="row">
    <div class="col-12">
    <form action="./models/blog/blog_update.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <label for="blog_titulo" class="form-label">Título da publicação</label>
                    <input type="text" id="blog_titulo" name="blog_titulo" class="form-control" value="<?= @$blog_titulo; ?>">
                    <?php if (isset($blog_token)) { echo "<input type='hidden' name='blog_token' value='$blog_token'>";};?>
                    <?php if (isset($blog_imagem_capa)) { echo "<input type='hidden' name='blog_imagem_capa' value='$blog_imagem_capa'>";};?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="blog_subtitulo" class="form-label">Subtítulo da publicação</label>
                    <input type="text" id="blog_subtitulo" name="blog_subtitulo" class="form-control" value="<?= @$blog_subtitulo; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="blog_texto" class="form-label">Texto da publicação</label>
                    <textarea class="form-control" rows="10" name="blog_texto" id="blog_texto"><?= @$blog_texto; ?></textarea>
                    <script>CKEDITOR.replace('blog_texto');</script>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="blog_imagem_capa" class="form-label">Imagem de capa</label>
                    <?php if (isset($blog_imagem_capa)) { echo "<div class='blog_imagem_capa_form'><img src='./image/blog/$blog_imagem_capa'></div>";};?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="file" class="form-control" id="blog_imagem_capa" name="imagem">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="blog_status" class="form-label">Publicação online</label>
                    <select class="form-select" name="blog_status" id="blog_status" required>
                    <option value=""  <?= @$blog_status === "" ? 'selected' : '' ?>>Escolha</option>
                    <option value="1" <?= @$blog_status == "1" ? 'selected' : '' ?>>Sim</option>
                    <option value="0" <?= @$blog_status == "0" ? 'selected' : '' ?>>Não</option>
                    <option value="3" <?= @$blog_status == "3" ? 'selected' : '' ?>>Excluir</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>