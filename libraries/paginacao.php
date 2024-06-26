<?php 

// Adiciona a navegação de paginação usando Bootstrap
echo '<nav aria-label="Navegação de página">';
echo '<ul class="pagination justify-content-end">';

// Link para a página anterior (se houver)
if ($current_page > 1) {
    echo '<li class="page-item">';
    echo '<a class="page-link" href="?page=' . ($current_page - 1) . '" aria-label="Anterior">';
    echo '<span class="sr-only">Anterior</span>';
    echo '</a>';
    echo '</li>';
} else {
    echo '<li class="page-item disabled">';
    echo '<a class="page-link" href="#" tabindex="-1" aria-disabled="true">';
    echo '<span class="sr-only">Anterior</span>';
    echo '</a>';
    echo '</li>';
}

// Links para todas as páginas
for ($page = 1; $page <= $total_pages; $page++) {
    if ($page == $current_page) {
        echo '<li class="page-item active" aria-current="page">';
        echo '<a class="page-link" href="#">' . $page . ' <span class="sr-only"></span></a>';
        echo '</li>';
    } else {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
    }
}

// Link para a próxima página (se houver)
if ($current_page < $total_pages) {
    echo '<li class="page-item">';
    echo '<a class="page-link" href="?page=' . ($current_page + 1) . '" aria-label="Próximo">';
    echo '<span class="sr-only">Próximo</span>';
    echo '</a>';
    echo '</li>';
} else {
    echo '<li class="page-item disabled">';
    echo '<a class="page-link" href="#" tabindex="-1" aria-disabled="true">';
    echo '<span class="sr-only">Próximo</span>';
    echo '</a>';
    echo '</li>';
}

echo '</ul>';
echo '</nav>';

?>