<?php 

function processarDadosPost() {
    // Inicializa um array vazio para armazenar os valores filtrados
    $valoresFiltrados = array();
    
    // Obtém todos os valores enviados via POST
    foreach ($_POST as $nomeVariavel => $valor) {
        // Filtra o valor usando filter_var
        $valorFiltrado = filter_var($valor, FILTER_SANITIZE_SPECIAL_CHARS);
    
        // Cria uma variável com o nome do campo e seu valor filtrado
        ${$nomeVariavel} = $valorFiltrado;
    
        // Armazena o nome da variável e seu valor filtrado no array
        $valoresFiltrados[$nomeVariavel] = $valorFiltrado;
    }
    
    // Retorna o array com os valores filtrados
    return $valoresFiltrados;
    }

    ?>