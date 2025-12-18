<!DOCTYPE html>
<html lang="<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Painel Administrativo  &mdash; Henderson Vieira</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- FULL CALENDAR CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
<script src="{{ asset('backend/msfullcalendar/assets/js/index.global.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('backend/msfullcalendar/assets/css/style.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/js/select2/dist/css/select2.min.css') }}">

  <!-- CSS DATATABLE -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.bootstrap5.css">


  <!-- CSS Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">

  <!-- Favicons -->
	<link rel="icon" type="('backend/assets/image/png" href="https://maykonsilveira.com.br/{{ asset('backend/assets/icon/favicon-32x32.png') }}" sizes="32x32">
	<link rel="apple-touch-icon" href="/{{ asset('backend/assets/icon/favicon-32x32.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="/{{ asset('backend/assets/icon/apple-touch-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="/{{ asset('backend/assets/icon/apple-touch-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="/{{ asset('backend/assets/icon/apple-touch-icon-144x144.png') }}">

  <!-- ICONES -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap-iconpicker.min.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>

<style>
    .select2-container .select2-results__option {
    color: #333!important;
    background:none!important;
}

.select2-container .select2-results__option:hover{
    color: #fff!important;
    background:#3b0241!important;
}

.section{
    margin-top:-80px;
}

</style>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class=""></div>

      <!-- START NAVABAR - MAYKONSILVEIRA.COM.BR -->
      @include('admin.layouts.navbar')
      <!-- END NAVBAR - MAYKONSILVEIRA.COM.BR -->

      <!-- START SIDEBAR - MAYKONSILVEIRA.COM.BR -->
      @include('admin.layouts.sidebar')
      <!-- END SIDEBAR - MAYKONSILVEIRA.COM.BR -->

      <!-- START MAIN CONTENT - MAYKONSILVEIRA.COM.BR -->
      <div class="main-content">

        @yield('content')

      </div>
      <!-- END MAIN CONTENT - MAYKONSILVEIRA.COM.BR -->

      <!-- START FOOTER - MAYKONSILVEIRA.COM.BR -->
      <footer class="main-footer">
        <div class="footer-left">
          Todos os Direitos Reservados &copy; {{ date('Y')}} <div class="bullet"></div> Desenvolvido <a href="https://maykonsilveira.com.br/">Henderson Vieira</a> Versão 1.0
        </div>
        <div class="footer-right">

        </div>
      </footer>
      <!-- END FOOTER - MAYKONSILVEIRA.COM.BR -->
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('backend/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/page/features-post-create.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/select2/dist/js/select2.full.min.js') }}"></script>


  <!-- JS DATATABLE -->
 <script src="https://cdn.datatables.net/2.0.6/js/dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/2.0.6/js/dataTables.bootstrap5.js"></script>

  <!-- JS SWEET -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- JS Toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <!-- ICONES -->
  <script src="{{ asset('backend/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>


  <!-- Page Specific JS File -->
  <script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
  <script src="{{ asset('backend/assets/js/jmask.js') }}"></script>



<!-- FULL CALENDAR JS-->
 <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/locales/pt-br.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script src="{{ asset('backend/msfullcalendar/assets/js/bootstrap5/index.global.min.js') }}"></script>
 <script src="{{ asset('backend/msfullcalendar/assets/js/core/locales/locales-all.global.min.js') }}"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>



<script>
$(document).ready(function(){

$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$('body').on('click', '.delete-item', function(event){
event.preventDefault();

let deleteUrl = $(this).attr('href');

Swal.fire({
  title: "Tem certeza?",
  text: "Você não poderá reverter isso!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#1e5e2f",
  cancelButtonColor: "#d33",
  confirmButtonText: "Sim, exclua-o!"
}).then((result) => {
  if (result.isConfirmed) {

    $.ajax({
        type: 'DELETE',
        url: deleteUrl,

        success: function(data){

            if(data.status == 'success'){

                Swal.fire({
                title: "Excluído!",
                text: "Seu arquivo foi excluído com sucesso!",
                icon: "success"
                });

                window.location.reload();
            }

        },
        error: function(xhr, status, error){
          console.log(error);
        }

    })


  }
});

})


});

//----------- FEITO PARA O CADASTRAR E FUNCIONAR O SELECT 2 DENTRO DO MODAL ------------------ //
 $('#criarModal').on('shown.bs.modal', function () {
    $('.selectCriar').select2({
        dropdownParent: $('#criarModal') // isso é muito importante!
    });
 });

 //----------- FEITO PARA O EDITAR E FUNCIONAR O SELECT 2 DENTRO DO MODAL ------------------ //
 $('#verModal').on('shown.bs.modal', function () {
    $('.selectEditar').select2({
        dropdownParent: $('#verModal') // isso é muito importante!
    });
 });
</script>
@stack('scripts')
</body>
</html>
