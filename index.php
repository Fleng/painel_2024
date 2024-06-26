<?php 
date_default_timezone_set('America/Sao_Paulo');
include "./libraries/conector.php";
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="./vendor/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
  <link href="./vendor/bootstrap-icons-1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="./css/desktop.css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
</head>

<body>
<?php include "./Views/menu_principal.php";?>
  <div class="corpo_principal">
      <?php /* incluir navegação */ ?>
      <?php include "./libraries/rota.php"; ?>
  </div>
<?php include "./views/footer.php";?>
  <script src="./vendor/bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>

</body>

</html>