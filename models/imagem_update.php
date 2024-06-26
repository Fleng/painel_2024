<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se algum arquivo foi enviado
    if (!empty($_FILES['files']['name'][0])) {
        $uploadDir = '../imagem/';
        $counter = 1;

        // Loop através dos arquivos enviados
        foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
            $originalName = $_FILES['files']['name'][$key];
            $fileExtension = pathinfo($originalName, PATHINFO_EXTENSION);
            $newFileName = substr(md5(time()), 0, 8) . $counter . '.' . $fileExtension;
            $destination = $uploadDir . $newFileName;

            // Move o arquivo para a pasta desejada e renomeia-o
            if (move_uploaded_file($tmpName, $destination)) {
                echo "Arquivo $originalName salvo como $newFileName <br>";
            } else {
                echo "Erro ao salvar arquivo $originalName <br>";
            }

            $counter++;
        }
    } else {
        echo "Nenhum arquivo enviado";
    }
}
?>
