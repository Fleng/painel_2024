<?php 
include "../../libraries/conector.php";
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
include "./../funcoes.php"; /* Faz o include da função processarDadosPost(); */

// Chama a função para processar os dados POST
$dadosFiltrados = processarDadosPost();

// Exibe os resultados
foreach ($dadosFiltrados as $nomeVariavel => $valorFiltrado) {
${$nomeVariavel} = $valorFiltrado;
}




if (@$blog_token!="") { 
    $sql = "UPDATE blog SET
    blog_titulo = ?,
    blog_subtitulo = ?,
    blog_imagem_capa = ?,
    blog_texto = ?,
    blog_status = ?,
    blog_usuario = ?
    WHERE blog_token = ?"; 

    $stmt = mysqli_prepare($conexao, $sql);

    if ($stmt) {
        if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
            $upload_dir = '../../image/blog/';
        
            // Define o caminho completo para salvar o arquivo
            $file_tmp_path = $_FILES['imagem']['tmp_name'];
            $file_name = $blog_token . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION); // Define o nome do arquivo como o token seguido da extensão original
            $file_size = $_FILES['imagem']['size'];
            $file_type = $_FILES['imagem']['type'];
        
            // Verifica se o tipo de arquivo é permitido (opcional)
            $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'webp');
            $file_extension = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION)); // Obtém a extensão do arquivo
            $blog_imagem_capa = $file_name;
            if (in_array($file_extension, $allowedfileExtensions)) {
                // Move o arquivo para a pasta de destino com o novo nome
                $dest_path = $upload_dir . $file_name;
        
                move_uploaded_file($file_tmp_path, $dest_path);
            }
        }
        // Vincula os parâmetros à consulta
        mysqli_stmt_bind_param($stmt, 'sssssss',  $blog_titulo, $blog_subtitulo, $blog_imagem_capa, $blog_texto, $blog_status,$blog_usuario, $blog_token);
        $link_saida ="../../blog_editar?publicacao=$blog_token&resultado=1";
        // Executa a consulta
        if (mysqli_stmt_execute($stmt)) {
            header("Location: $link_saida");
        } else {
            echo "Erro ao inserir o registro: " . mysqli_error($conexao);
        }
    
        // Fecha a declaração
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
    }
    

  
    }

else { 
$current_timestamp = time();$md5_hash = md5($current_timestamp);$blog_token = substr($md5_hash, 0, 20); 
$sql = "INSERT INTO blog (
    blog_titulo, 
    blog_subtitulo, 
    blog_imagem_capa, 
    blog_texto, 
    blog_status, 
    blog_token, 
    blog_usuario
) VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conexao, $sql);

if ($stmt) {
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $upload_dir = '../../image/blog/';
    
        // Define o caminho completo para salvar o arquivo
        $file_tmp_path = $_FILES['imagem']['tmp_name'];
        $file_name = $blog_token . '.' . pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION); // Define o nome do arquivo como o token seguido da extensão original
        $file_size = $_FILES['imagem']['size'];
        $file_type = $_FILES['imagem']['type'];
    
        // Verifica se o tipo de arquivo é permitido (opcional)
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'webpp');
        $file_extension = strtolower(pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION)); // Obtém a extensão do arquivo
        $blog_imagem_capa = $file_name;
        if (in_array($file_extension, $allowedfileExtensions)) {
            // Move o arquivo para a pasta de destino com o novo nome
            $dest_path = $upload_dir . $file_name;
    
            move_uploaded_file($file_tmp_path, $dest_path);
        }
    }
    // Vincula os parâmetros à consulta
    mysqli_stmt_bind_param($stmt, 'sssssss',  $blog_titulo, $blog_subtitulo, $blog_imagem_capa, $blog_texto, $blog_status, $blog_token, $blog_usuario);
    $link_saida_cadastro ="../../blog_index?resultado=1";
    // Executa a consulta
    if (mysqli_stmt_execute($stmt)) {
        header("Location: $link_saida_cadastro");
    } else {
        echo "Erro ao inserir o registro: " . mysqli_error($conexao);
    }

    // Fecha a declaração
    mysqli_stmt_close($stmt);
} else {
    echo "Erro ao preparar a consulta: " . mysqli_error($conexao);
}

// Fecha a conexão

}

} 
mysqli_close($conexao);

?>