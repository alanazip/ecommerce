<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>G.A.L</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  <link href="{{ asset('css/table.css') }}" rel="stylesheet">
  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto:wght@700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a class="navbar-brand ms-lg-5 {{ (Route::current()->getName() === 'site.home' ? ' active' : '') }}" href="{{ route('site.home') }}">
    <img src="https://i.ibb.co/gMrG9N9/GAL.png" alt="GAL">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if (Route::has('login'))
    <div class="collapse navbar-collapse" id="navbarCollapse">

      <div class="navbar-nav ms-auto mt-3 " style="margin-right: 60px">

        @canany(['admin', 'user'])
        @auth
        @csrf
        <div style="color: black;" class="nav-item nav-link{{ (Route::current()->getName() === 
          'site.home' ? ' active' : '') }}" href="{{ route('site.home') }}">
        <a style="width: 100px; height: 70px; margin-left: 10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('site.home') }}"> 
            <p style="margin-top: 15px;">Início</p></a>
        </div>

        <div style="color: black;" class="nav-item nav-link" >
        <a style="width: 100px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10 " href="#sobre-nos"> 
            <p style="margin-top: 5px;">Sobre nós</p></a>
        </div>

        <div style="color: black;" class="nav-item nav-link
        {{ (Route::current()->getName() === 'site.produtos' ? ' active' : '') }}" 
        href="{{ route('site.produtos') }}">
        <a style="width: 100px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('site.produtos') }}">
             <p style="margin-top: 15px;">jogos</p></a>
        </div>

        @can('user')
        <div style="color: black;" class="nav-item nav-link
        {{ (Route::current()->getName() === 'site.contatos' ? ' active' : '') }}" 
        href="{{ route('site.produtos') }}">
        <a style="width: 120px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('site.contatos') }}">
             <p style="margin-top: 8px;">Contate-nos</p></a>
        </div>
        @endcan

        <div style="color: black;" class="nav-item nav-link
        {{ (Route::current()->getName() === 'site.compras' ? ' active' : '') }}" 
        href="{{ route('site.compras') }}">
        <a style="width: 110px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('site.carrinho') }}">
             <p style="margin-top: 10px;">Carrinho <i class="bi bi-cart"></i></p></a>
        </div>

        @endauth
        @can('admin')
        <div class="nav-item dropdown btn btn-outline-success" 
        style="width: 240px; height: 70px; margin-left: 20px; 
            margin-top: 10px; border-radius: 10px; background-color: white;">

          <a href="#"  style="margin-top: -15px; margin-left: -1px;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Área Administrativa</a>
          
          <div class="dropdown-menu m-0 " style="border-radius: 10px; ">
            <a href="/produtosmanager/create" class="dropdown-item">Adicionar Jogo</a>
            <a class="dropdown-item {{ (Route::current()->getName() === 'site.fornecedores' ? ' active' : '') }}" href="{{ route('fornecedoresmanager.index') }}">Fornecedores</a>
            <a href="{{ route('fornecedoresmanager.create') }}" class="dropdown-item">Adicionar Fornecedores</a>
            <a class="dropdown-item {{ (Route::current()->getName() === 'site.categorias' ? ' active' : '') }}" href="{{ route('categoriasmanager.index') }}">Adicionar Categorias</a>
            <a class="dropdown-item" href="{{ route('site.categorias') }}">Categorias</a>
            <a href="/contatosmanager" class="dropdown-item">Visualizar Avaliações</a>
            <a href="{{ route('adminmanager.index') }}" class="dropdown-item">Usuários</a>
          </div>
        </div>
        <br><br>
        @endcan
        @endcanany

        @auth
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <div class="nav-item dropdown btn btn-outline-success text-center" 
            style="width: 110px; height: 70px; margin-left: 20px; 
            margin-top: 10px; border-radius: 10px; background-color: white;">
            <a href="#" class="nav-link dropdown-toggle" 
            style="margin-top: -15px; margin-left: 5px;" data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
            <div class="dropdown-menu m-0" style="border-radius: 10px; ">
              <a href="/profile" class="dropdown-item">Editar Perfil</a>
              <a class="dropdown-item"
              :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sair</a>
              @else

            <!-- daqui para baixo é quando não há um usuário logado -->
            <!-- começo -->
              <div style="color: black;" class="nav-item nav-link{{ (Route::current()->getName() === 
          'site.home' ? ' active' : '') }}" href="{{ route('site.home') }}">
        <a style="width: 100px; height: 70px; margin-left: 10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('site.home') }}"> 
            <p style="margin-top: 15px;">Início</p></a>
        </div>

        <div style="color: black;" class="nav-item nav-link" >
        <a style="width: 100px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10 " href="#sobre-nos"> 
            <p style="margin-top: 5px;">Sobre nós</p></a>
        </div>

        <div style="color: black;" class="nav-item nav-link
        {{ (Route::current()->getName() === 'site.produtos' ? ' active' : '') }}" 
        href="{{ route('site.produtos') }}">
        <a style="width: 100px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('site.produtos') }}">
             <p style="margin-top: 15px;">jogos</p></a>
        </div>

        <div style="color: black;" class="nav-item nav-link
        {{ (Route::current()->getName() === 'site.compras' ? ' active' : '') }}" 
        href="{{ route('login') }}">
        <a style="width: 110px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('login') }}">
             <p style="margin-top: 15px;">Compras</p></a>
        </div>

        <div style="color: black;" class="nav-item nav-link" 
        href="{{ route('login') }}">
        <a style="width: 110px; height: 70px; margin-left: -10px; color:black; 
            margin-top: -20px; border-radius: 10px; background-color: white;" 
            class="btn btn-outline-success pt-10  " href="{{ route('login') }}">
             <p style="margin-top: 15px;">ENTRAR</p></a>
        </div>
        <!-- fim -->
              @endauth
            </div>
            @endif
          </div>
        </form>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  @yield('content')
  <div class="container-fluid bg-light mt-5 py-5">
    <div class="container pt-5">
      <div class="row g-5">
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Contate-nos</h5>
          <p class="mb-4">Fale conosco</p>
          <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>45 Rua Terezina, Presidente Prudente, SP</p>
          <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>gal@dominio.com</p>
          <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>+018 99816 8675</p>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Conteudo</h5>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre nós</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Nossos serviços</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Envie seu curriculo</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Ultimos destaques</a>
          </div>
        </div>        
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Conteudo</h5>
          <div class="d-flex flex-column justify-content-start">
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Sobre nós</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Nossos serviços</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Envie seu curriculo</a>
            <a class="text-body mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Ultimos destaques</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Assine nossa newsletter</h5>
          <form action="">
            <div class="input-group">
              <input type="text" class="form-control p-3" placeholder="gal@dominio.com">
              <button class="btn btn-primary">Assine</button>
            </div>
          </form>
          <h6 class="text-uppercase mt-4 mb-3">Nos siga nas redes sociais</h6>
          <div class="d-flex">
            <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-twitter"></i></a>
            <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-facebook"></i></a>
            <a class="btn btn-outline-primary btn-square me-2" href="#"><i class="bi bi-linkedin"></i></a>
            <a class="btn btn-outline-primary btn-square" href="#"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
        <div class="col-12 text-center text-body">
          <a class="text-body" href="">Termos & Condições</a>
          <span class="mx-1">|</span>
          <a class="text-body" href="">Politica de Privacidade</a>
          <span class="mx-1">|</span>
          <a class="text-body" href="">Contate o suporte</a>
          <span class="mx-1">|</span>
          <a class="text-body" href="">Formas de pagamento</a>
          <span class="mx-1">|</span>
          <a class="text-body" href="">Ajuda</a>
          <span class="mx-1">|</span>
          <a class="text-body" href="">Duvidas frequentes</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid bg-dark text-white-50 py-4">
    <div class="container">
      <div class="row g-5">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-md-0">&copy; <a class="text-white" href="#">G.A.L</a>. All Rights Reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <p class="float-end"><a class="text-white" href="#">Voltar ao topo</a></p>
        </div>
      </div>
    </div>
  </div>


  <main role="main">

  </main>

  <script src="{{ asset('js/main.js') }}" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

</body>

</html>