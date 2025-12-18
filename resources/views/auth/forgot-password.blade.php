<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Recuperar Senha - Painel de Controle</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

  <style>
    body {
      background-color: #4B006E; /* roxo de fundo conforme a imagem */
      color: #fff;
    }
    .card {
      background-color: #1c0128;
      border: none;
      box-shadow: 0 0 20px rgba(0,0,0,0.4);
    }
    .btn-warning {
      background-color: #f9b300;
      border-color: #f9b300;
      font-weight: bold;
      color: #000;
    }
    .simple-footer {
      color: #ccc;
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">

            <div class="text-center mb-4">
              <h1 class="text-white" style="font-weight:700;">HVDev</h1>
              <p class="text-white-50"></p>
            </div>

            <div class="card">
              <div class="card-header text-center"><h4 class="text-white">Recuperar Senha</h4></div>
              <div class="card-body">
                @if (session('status'))
                  <div class="alert alert-success mb-4" role="alert">
                    {{ session('status') }}
                  </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Digite seu e-mail" required autofocus value="{{ old('email')}}">

                    @if ($errors->has('email'))
                    <code>{{ $errors->first('email') }}</code>
                    @endif

                    <div class="invalid-feedback">
                      Por favor, insira seu e-mail.
                    </div>
                  </div>

                  <div class="form-group mb-4">
                    <button type="submit" class="btn btn-warning btn-lg btn-block" tabindex="4">
                      Recuperar
                    </button>
                  </div>

                  <div class="text-center">
                    <a href="{{ route('login') }}" class="text-white-50">Voltar para o Login</a>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer text-center mt-4">
              Criado por <b>Henderson Vieira</b><br>
              Todos os direitos reservados &copy; {{ date('Y') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>
</html>
