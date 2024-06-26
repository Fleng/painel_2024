<table class="table table-hover">
  <thead>
    <tr>
      <th width="5%" class="text-center"><i class="bi bi-pencil-square"></i></th>
      <th width="70%">Título</th>
      <th width="10%" class="text-center">Autor</th>
      <th width="10%" class="text-center">Data</th>
      <th width="5%" class="text-center">Status</th>
    </tr>
  </thead>
  <tbody>

<?php 
// Número de registros por página
$registros_por_pagina = 8;

// Verifica a página atual a partir da URL, se não estiver definida assume a primeira página
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = (int) $_GET['page'];
} else {
    $current_page = 1;
}

// Calcula o offset
$offset = ($current_page - 1) * $registros_por_pagina;

// Obter o número total de registros
$query_total = "SELECT COUNT(*) as total FROM blog WHERE blog_status != '3'";
$result_total = mysqli_query($conexao, $query_total);
$row_total = mysqli_fetch_assoc($result_total);
$total_records = (int)$row_total['total']; // Converte para número inteiro

// Calcula o número total de páginas
$total_pages = ceil($total_records / $registros_por_pagina);

// Consulta SQL com paginação
$query_publicacao = "SELECT * FROM blog WHERE blog_status != '3' ORDER BY blog_id DESC LIMIT $registros_por_pagina OFFSET $offset";
$resultado_publicacao = mysqli_query($conexao, $query_publicacao);
$total_registros = mysqli_num_rows($resultado_publicacao);
while ($dado = mysqli_fetch_assoc($resultado_publicacao)) 
{
    foreach ($dado as $key => $value) {
        ${$key} = $value;
    }

    $blog_data = date('d/m/Y', strtotime($blog_data));

    if ($blog_status=="1") { $blog_ativo ="<i class=\"bi bi-check-circle icone_verde\"></i>";}
    if ($blog_status=="0") { $blog_ativo ="<i class=\"bi bi-x-circle icone_vermelho\"></i>";}
    if ($blog_status=="3") { $blog_ativo ="<i class=\"bi bi-trash icone_vermelho\"></i>";}

    echo "<tr class=\"align-middle\">
    <td class=\"text-center\"><a href=\"./blog_editar?publicacao=$blog_token\" class=\"btn btn-sm btn-success\" target=\"_blank\"><i class=\"bi bi-pencil-square\"></i></a></td>
    <td>$blog_titulo</td>
    <td class=\"text-center\">$blog_usuario</td>
    <td class=\"text-center\">$blog_data</td>
    <td class=\"text-center\">$blog_ativo</td>
    </tr>";
}

?>
  </tbody>
</table>
<?php if ($total_records > $registros_por_pagina) { include "./libraries/paginacao.php"; } ?> 
