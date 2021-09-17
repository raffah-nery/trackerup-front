<?php
session_start();
if(empty($_SESSION["id"])) {
  header("Location:login.php");
}

if (isset($_GET['get_update_id'])) {
  $api_url = 'https://api.trackerup.webseekers.com.br/v1/categories/'.$_GET['get_update_id'];
  echo file_get_contents($api_url);
  exit();
}

if (count($_POST) > 0)
{
    if ($_POST["method"] === "insert")
    {
        if (isset($_POST["id"]) && isset($_POST["name"])) {
          $curl = curl_init("https://api.trackerup.webseekers.com.br/v1/categories");
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          if ($response["status"] !== "success")
          {
            $ERROR = "Erro ao inserir a nova categoria.";
          }
        } else
        {
          $ERROR = "Erro ao inserir a nova categoria.";
        }
    }
    if ($_POST["method"] === "update"){
      if (isset($_POST["name"])) {
        $curl = curl_init("https://api.trackerup.webseekers.com.br/v1/categories/".$_POST["id"]);
          curl_setopt($curl, CURLOPT_PUT, true);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $_POST);
          $response = curl_exec($curl);
          $response = json_decode($response, true);
          curl_close($curl);
          if ($response["status"] !== "success")
          {
            $ERROR = "Erro ao inserir a nova categoria.";
          }
      }else
        {
          $ERROR = "Erro ao inserir a nova categoria.";
        }
    }
    if (($_POST["method"] == "delete") && isset($_POST["id"]))
    {
        $curl = curl_init("https://api.trackerup.webseekers.com.br/v1/categories/".$_POST["id"]);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl);
    }
}

// categories
$api_url = 'https://api.trackerup.webseekers.com.br/v1/categories';
$json_data = file_get_contents($api_url);
$response_data = json_decode($json_data);
$categories_data = $response_data->data;

$PAGE_TITLE = "Categorias";
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
$CURRENT_PAGE = "categories";
?>

<?php include('layout/body.php') ?>
<?php if (isset($ERROR)) { ?> <div class="alert alert-danger" role="alert"> <?php print_r($ERROR); ?> </div> <?php } ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Categorias</h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button id="btnNew" type="button" class="btn btn-sm btn-outline-secondary">Nova Categoria</button>
    </div>
  </div>
</div>
<h5>Lista de Categorias</h3>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach ($categories_data as $part) {
        echo "<tr><td>".$part->id."</td>";
        echo "<td>".$part->name."</td>";
        echo "<td>".$part->description."</td>";
        echo '<td><button type="button" data-id="'.$part->id.'" class="btn btn-sm btn-outline-secondary btn-update">Editar</button><button type="button" data-id="'.$part->id.'" data-name="'.$part->name.'" class="btn btn-sm btn-outline-secondary btn-delete">Deletar</button></td></tr>';
      }
      ?>
    </tbody>
  </table>
</div>
<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="categoryModalLabel"></h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frmCategory" name="frmCategory" class="row g-3" method="post" action="">
        <input type="text" name="method" hidden>
        <input type="text" name="id" hidden>
        <div class="col-md-8">
          <label for="name" class="form-label">Nome</label>
          <input type="text" class="form-control" id="name" name="name" required oninvalid="this.setCustomValidity('Nome é obrigatório')" onchange="this.setCustomValidity('')">
        </div>
        <div class="col-12">
          <label for="description" class="form-label">Descrição</label>
          <input type="text" class="form-control" id="description" name="description">
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
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Deletar Categoria</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frmDelete" name="frmDelete" class="row g-3" method="post">
        <h4>Deseja realmente deletar a categoria <span id="deleteName"></span>?</h4>
        <input type="text" name="id" hidden>
        <input type="text" name="method" value="delete" hidden>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Deletar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('layout/footer.php') ?>
<script src="/assets/js/categories.js"></script>
</body>

</html>
