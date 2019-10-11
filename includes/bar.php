<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Veterinaria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/software/">Inicio</span></a>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cliente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/software/cliente/agregarCliente.php">Crear cliente</a>
          <a class="dropdown-item" href="/software/persona/asociarPersona.php">Asociar persona a cliente</a>
        </div>
      </li>
      <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administración
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Agregar Vacuna</a>
          <a class="dropdown-item" href="#">Agregar enfermedad</a>
        </div>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="/software/cliente/clientePerfil.php" method="get" onsubmit = "return validarBusqueda();">
      <input name = "cliente" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar" id = "buscar">
      <input class="btn btn-outline-success my-2 my-sm-0" value="Buscar" type = "submit"id = "butonBuscar">
    </form>
  </div>
</nav>