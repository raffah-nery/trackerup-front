<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "dashboard") {?>active<?php }?>" aria-current="page" href="index.php"> <span data-feather="home"></span> Dashboard </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "orders") {?>active<?php }?>" href="orders.php"> <span data-feather="file"></span> Ordens de Serviço </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "parts") {?>active<?php }?>" href="parts.php"> <span data-feather="shopping-cart"></span> Peças </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "categories") {?>active<?php }?>" href="categories.php"> <span data-feather="shopping-cart"></span> Categorias </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "customers") {?>active<?php }?>" href="customers.php"> <span data-feather="users"></span> Clientes </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if ($CURRENT_PAGE == "reports") {?>active<?php }?>" href="reports.php"> <span data-feather="bar-chart-2"></span> Relatórios </a>
      </li>
    </ul>
  </div>
</nav>