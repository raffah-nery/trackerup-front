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
  <h1 class="h2">Clientes</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Novo Cliente</button>
    </div>
  </div>
</div>
<h5>Lista de clientes</h3>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Header</th>
        <th scope="col">Header</th>
        <th scope="col">Header</th>
        <th scope="col">Header</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1,001</td>
        <td>random</td>
        <td>data</td>
        <td>placeholder</td>
        <td>text</td>
      </tr>
      <tr>
        <td>1,002</td>
        <td>placeholder</td>
        <td>irrelevant</td>
        <td>visual</td>
        <td>layout</td>
      </tr>
      <tr>
        <td>1,003</td>
        <td>data</td>
        <td>rich</td>
        <td>dashboard</td>
        <td>tabular</td>
      </tr>
      <tr>
        <td>1,003</td>
        <td>information</td>
        <td>placeholder</td>
        <td>illustrative</td>
        <td>data</td>
      </tr>
      <tr>
        <td>1,004</td>
        <td>text</td>
        <td>random</td>
        <td>layout</td>
        <td>dashboard</td>
      </tr>
      <tr>
        <td>1,005</td>
        <td>dashboard</td>
        <td>irrelevant</td>
        <td>text</td>
        <td>placeholder</td>
      </tr>
      <tr>
        <td>1,006</td>
        <td>dashboard</td>
        <td>illustrative</td>
        <td>rich</td>
        <td>data</td>
      </tr>
      <tr>
        <td>1,007</td>
        <td>placeholder</td>
        <td>tabular</td>
        <td>information</td>
        <td>irrelevant</td>
      </tr>
      <tr>
        <td>1,008</td>
        <td>random</td>
        <td>data</td>
        <td>placeholder</td>
        <td>text</td>
      </tr>
      <tr>
        <td>1,009</td>
        <td>placeholder</td>
        <td>irrelevant</td>
        <td>visual</td>
        <td>layout</td>
      </tr>
      <tr>
        <td>1,010</td>
        <td>data</td>
        <td>rich</td>
        <td>dashboard</td>
        <td>tabular</td>
      </tr>
      <tr>
        <td>1,011</td>
        <td>information</td>
        <td>placeholder</td>
        <td>illustrative</td>
        <td>data</td>
      </tr>
      <tr>
        <td>1,012</td>
        <td>text</td>
        <td>placeholder</td>
        <td>layout</td>
        <td>dashboard</td>
      </tr>
      <tr>
        <td>1,013</td>
        <td>dashboard</td>
        <td>irrelevant</td>
        <td>text</td>
        <td>visual</td>
      </tr>
      <tr>
        <td>1,014</td>
        <td>dashboard</td>
        <td>illustrative</td>
        <td>rich</td>
        <td>data</td>
      </tr>
      <tr>
        <td>1,015</td>
        <td>random</td>
        <td>tabular</td>
        <td>information</td>
        <td>text</td>
      </tr>
    </tbody>
  </table>
</div>
<?php include('layout/footer.php') ?>
