<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login - Painel CMS</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('backend/assets/img/favicon.png') }}" type="image/png">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

  <style>
    body {
      background-color: #3c0061; /* Roxo */
    }
    .card {
      background-color: #1b002c;
      border: none;
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
    }
    .btn-primary {
      background-color: #ffcb05; /* Amarelo */
      border-color: #ffcb05;
      color: #000;
      font-weight: 600;
    }
    .btn-primary:hover {
      background-color: #e0b400;
      border-color: #e0b400;
    }
    .simple-footer {
      color: #fff;
      text-align: center;
    }
    .login-brand img {
      width: 120px;
    }
  </style>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-4 col-xl-4 offset-xl-4">

            <div class="login-brand mb-4 text-center text-white">
              <h1><strong>HV</strong>DEV</h1>
              <small></small>
            </div>

            <div class="card card-primary">
              <div class="card-body">
                <div class="text-center mb-4 text-white">
                  <h5>Acesso Administrativo</h5>
                </div>

                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf

                  <div class="form-group">
                    <label for="email" class="text-white">E-mail</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <code>{{ $errors->first('email') }}</code>
                    @endif
                    <div class="invalid-feedback">Digite seu e-mail</div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label text-white">Senha</label>
                      @if (Route::has('password.request'))
                        <div class="float-right">
                          <a href="{{ route('password.request') }}" class="text-small text-warning">
                            Esqueceu sua senha?
                          </a>
                        </div>
                      @endif
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2"  value="{{ old('password')}}"  required>

                    @if ($errors->has('password'))
                    <code>{{ $errors->first('password') }}</code>
                    @endif

                    <div class="invalid-feedback">Digite sua senha</div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label text-white" for="remember-me">Lembrar da senha</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Entrar
                    </button>
                  </div>
                </form>

              </div>
            </div>

            <div class="simple-footer mt-4">
              Todos os direitos reservados &copy; {{ date('Y') }} by Henderson Vieira
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
  <script src="{{ asset('backend/assets/modules/stisla.js') }}"></script>

  <!-- JS Libraries -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>
</html>
