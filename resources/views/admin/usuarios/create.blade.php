@extends('admin.layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
      <h1>Cadastrar Usuário</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard')}}">Painel</a></div>
        <div class="breadcrumb-item active"><a href="{{ route('usuarios.index')}}">Listar</a></div>
        <div class="breadcrumb-item">Usuário</div>
      </div>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Usuário</h4>

              <div class="card-header-action">
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#ajuda">Ajuda?</a>
              </div>

            </div>

            <div class="card-body">

                <form action="{{ route('usuarios.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                    <label for="">Foto(500x500px)</label>
                    <input type="file" name="capa" class="form-control" >
                  </div>

                <div class="form-group row mb-4">

                <div class="col-sm-6">
                    <label for="">Nome</label>
                    <input type="text" name="nome" placeholder="Add nome" class="form-control" value="{{ old('nome')}}">
                </div>

                <div class="col-sm-6">
                    <label for="">Sobrenome</label>
                    <input type="text" name="sobrenome" placeholder="Add sobrenome" class="form-control" value="{{ old('sobrenome')}}">
                </div>

            </div>

                 <div class="form-group row mb-4">

                    <div class="col-sm-10">
                    <label for="">Whatsapp</label>
                    <input type="text" id="cel" name="fone" placeholder="Add Whatsapp Válido" class="form-control" value="{{ old('fone')}}">
                    </div>

                 </div>

                  <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" name="email" placeholder="Add seu e-mail" class="form-control" value="{{ old('email')}}">
                  </div>

                  <div class="form-group">
                    <label for="">Nível</label>
                    <select name="nivel" class="form-control">
                        <option value="admin">Administrador</option>
                        <option value="medico">Médico</option>
                        <option value="user">Cliente</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Senha</label>
                    <input type="password" name="password" placeholder="Add uma senha de no mínimo 8 caractéres" class="form-control" value="{{ old('password') }}">
                  </div>

                  <button type="submit" class="btn btn-primary">Salvar</button>

                </form>

            </div>

          </div>
        </div>

      </div>

    </div>
</section>

@endsection
