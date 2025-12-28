<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Panel Giriş</title>
  
    <link href="{{ asset('assets/dist/css/tabler.min.css') }}" rel="stylesheet"/>  <!-- 
    <link href="{{ asset('assets/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>  -->

  </head>
  <body >
     <!-- <script src="{{ asset('assets/dist/js/demo-theme.min.js?1684106062') }}"></script>  -->
    <div class="page">

        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-print-none" >
          <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
              <a href="{{ route('index') }}">
                <img src="{{ asset('uploads/logo.png') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
              </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
              <div class="nav-item d-none d-md-flex me-3">
                <div class="btn-list">
                  <a href="{{ route('index') }}" class="btn btn-info" rel="noreferrer">
                   Anasayfa
                  </a>
                </div>
              </div>
              
            </div>
          </div>
        </header>

      <div class="page-wrapper">
  
        <div class="page-body "  >
          <div class="container-xl">
            <div class="row row-cards justify-content-center" >
              <div class="col-md-6 col-xl-6">

                <form action="{{url('admin/login/do')}}" method="post" class="card">
                   @csrf

                    <div class="card-header">
                        <h4 class="card-title">Giriş Yapınız</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                            <div class="col-md-6 col-xl-12">
                                
                                <div class="mb-3">
                                <label class="form-label">E-Posta</label>
                                <input type="email" class="form-control" name="email" placeholder="E-posta...">
                                </div>
                                <div class="mb-3">
                                <label class="form-label">Şifre</label>
                                <input type="password" class="form-control" name="password" placeholder="Şifreniz...">
                                </div>
                                
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer text-end">
                    <div class="d-flex">
                
                        <button type="submit" class="btn btn-primary ms-auto">Giriş Yap</button>
                        @error('email')
                            <p style="color:red">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>

              </form>


            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  <a href="#" class="link-secondary" rel="noopener">
                   Sinem Türkoğlu
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- <script src="{{ asset('assets/dist/libs/nouislider/dist/nouislider.min.js?1684106062') }}" defer></script>
  <script src="{{ asset('assets/dist/libs/litepicker/dist/litepicker.js?1684106062') }}" defer></script>
  <script src="{{ asset('assets/dist/libs/tom-select/dist/js/tom-select.base.min.js?1684106062') }}" defer></script>
  <script src="{{ asset('assets/dist/js/demo.min.js?1684106062') }}" defer></script>  -->
  <script src="{{ asset('assets/dist/js/tabler.min.js?1684106062') }}" defer></script>
  
</body>
</html>