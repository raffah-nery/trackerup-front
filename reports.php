<?php
session_start();
if(empty($_SESSION["id"])) {
  header("Location:login.php");
}

$PAGE_TITLE = "Ordens de Serviço";
$PAGE_STYLE = '<style>
.bd-placeholder-img {
  font-size: 1.125rem;
  text-anchor: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

@media (min-width: 768px) {
  .bd-placeholder-img-lg {
    font-size: 3.5rem;
  }
}
</style>
<!-- Custom styles for this template -->
<link href="assets/css/dashboard.css" rel="stylesheet">';
$CURRENT_PAGE = "orders";
?>

<?php include('layout/body.php') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Relatórios</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Novo Relatório</button>
    </div>
  </div>
</div>
<h5>Gráfico de OS's</h3>
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
<?php include('layout/footer.php') ?>
<script src="assets/js/dashboard.js"></script>
