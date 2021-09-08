<?php
session_start();
if(empty($_SESSION["id"])) {
  header("Location:login.php");
}

if (count($_POST) > 0)
{
    if (isset($_POST["code"]) && isset($_POST["name"]) && isset($_POST["category"]))
    {
        $curl = curl_init("https://api.trackerup.webseekers.com.br/v1/parts");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $response = json_decode($response, true);
        curl_close($curl);
        if ($response["status"] !== "success")
        {
          $ERROR = "Erro ao inserir a nova peça.";
        }
    }
    else
    {
      $ERROR = "Erro ao inserir a nova peça.";
    }
}

// PARTS
$api_url = 'https://api.trackerup.webseekers.com.br/v1/parts';
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data);
$parts_data = $response_data->data;
// CATEGORIES
$api_url = 'https://api.trackerup.webseekers.com.br/v1/categories';
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data);
$categories_data = $response_data->data;

$PAGE_TITLE = "Peças";
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
$CURRENT_PAGE = "parts";
?>

<?php include('layout/body.php') ?>
<?php if (isset($ERROR)) { ?> <div class="alert alert-danger" role="alert"> <?php print_r($ERROR); ?> </div> <?php } ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Peças</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button id="btnNew" type="button" class="btn btn-sm btn-outline-secondary">Nova Peça</button>
    </div>
  </div>
</div>
<h5>Lista de Peças</h3>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Categoria</th>
        <th scope="col">Descrição</th>
        <th scope="col">Qtd</th>
        <th scope="col">NCM</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($parts_data as $part) {
        echo "<tr><td>".$part->code."</td>";
        echo "<td>".$part->name."</td>";
        echo "<td>".$part->category."</td>";
        echo "<td>".$part->description."</td>";
        echo "<td>".$part->qty."</td>";
        echo "<td>".$part->ncm."</td>";
        echo "<td></td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newModalLabel">Nova Peça</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frmNew" name="frmNew" class="row g-3" method="post" action="">
        <div class="col-md-4">
          <label for="code" class="form-label">Código</label>
          <input type="text" class="form-control" id="code" name="code" required oninvalid="this.setCustomValidity('Código é obrigatório')" onchange="this.setCustomValidity('')">
        </div>
        <div class="col-md-8">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" required oninvalid="this.setCustomValidity('Nome é obrigatório')" onchange="this.setCustomValidity('')">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Descrição</label>
          <input type="text" class="form-control" id="description" name="description">
        </div>
        <div class="col-md-6">
          <label for="category" class="form-label">Categoria</label>
          <select id="category" name="category" class="form-select" required oninvalid="this.setCustomValidity('Categoria é obrigatório')" onchange="this.setCustomValidity('')">
            <option value="">selecione...</option>
            <?php
            foreach ($categories_data as $category) {
              echo '<option value="'.$category->name.'">'.$category->name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="col-md-2">
          <label for="qty" class="form-label">Qtd</label>
          <input type="number" class="form-control" id="qty" name="qty" value="0">
        </div>
        <div class="col-md-4">
          <label for="ncm" class="form-label">NCM</label>
          <input type="text" class="form-control" id="ncm" name="ncm">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('layout/footer.php') ?>
<script src="assets/js/parts.js"></script>
</body>

</html>
