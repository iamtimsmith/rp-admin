{{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">Brand</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/monsters">Monsters</a>
        </li>
      </ul>
    </div>
  </div>
</nav> --}}

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        {{--<button class="btn" @click="openLeft"><i class="fa fa-bars"></i></button> --}}
        <offcanvas-left></offcanvas-left>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="/">RP Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2 justify-content-end">
        <offcanvas-right></offcanvas-right>
    </div>
  </div>
</nav>
