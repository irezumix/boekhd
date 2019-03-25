<nav class="navbar navbar-expand-lg navbar-dark bg-test">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('invoices.incoming')}}">
            <i class="fas fa-arrow-left"></i>
            <br>
            AANKOOPFACTUREN
          </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('invoices.outgoing')}}">
              <i class="fas fa-arrow-right"></i>
              <br>
              VERKOOPFACTUREN
            </a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('invoices.create')}}">
              <i class="fas fa-plus"></i>
              <br>
              FACTUUR TOEVOEGEN
            </a>
        </li>
    </div>
</nav>