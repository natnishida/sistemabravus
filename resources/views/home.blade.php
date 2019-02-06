@extends('layouts.app')

@section('content')
@isset($msgSucesso)

    <div class="alert alert-success">
        {{ $msgSucesso }}
    </div>

@endisset
@isset($msgErro)

    <div class="alert alert-danger">
        {{ $msgErro }}
    </div>

@endisset

<h1 class="lista-admin" style="margin-top: 2%">Painel Administrativo - Bravus Club</h1>
  <p style="font-size: 2em; text-align: center">O que você deseja fazer?</p>
<div class="container d-flex justify-content-center align-self-stretch row m-auto" >

  <!-- Card de opções administrativas -->

    <div class="card col-sm-12 col-lg-3 p-2 border border-dark align-self-stretch" style="margin: 0">
        <img class="card-img-top" src="../public/img/iconePlano.PNG" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Prospects</h5>
          <p class="card-text">Painel administrativo para visualização, cadastro e atualização de prospects.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><a href="/novo-sistema-bravus/public/cadastro_prospect">Cadastrar novo prospect</a></li>
          <li class="list-group-item">Buscar novo prospect</li>
          <li class="list-group-item"><a href="/novo-sistema-bravus/public/prospects">Visualização da lista completa de prospects</a></li>
        </ul>

      </div>
      <div class="card col-sm-12 col-lg-3 p-2 border border-dark align-self-stretch" style="margin: 0">
          <img class="card-img-top" src="../public/img/iconeFreepass.PNG" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Free Pass</h5>
            <p class="card-text">Painel administrativo para visualização, cadastro e atualização de Free Pass.</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="/novo-sistema-bravus/public/cadastro_freepass">Cadastrar novo Free Pass</a></li>
            <li class="list-group-item">Buscar Free Pass</li>
            <li class="list-group-item"><a href="/novo-sistema-bravus/public/freepass">Visualização da lista completa de Free Pass</a></li>
          </ul>

        </div>

        <div class="card col-sm-12 col-lg-3 p-2 border border-dark align-self-stretch" style="margin: 0">
            <img class="card-img-top" src="../public/img/iconeTema.PNG" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Ação do Dia</h5>
              <p class="card-text">Painel administrativo para visualizar e realizar ações do dia.</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item"><a href="/novo-sistema-bravus/public/freepassdia">Ver os Free Pass do dia</a></li>
              <li class="list-group-item"><a href="/novo-sistema-bravus/public/acoescrm">Fazer ações do dia</a></li>
              <li class="list-group-item"><a href="{{ route('home') }}">Relatório de ações do dia</a></li>

            </ul>

          </div>

          <div class="card col-sm-12 col-lg-3 p-2 border border-dark align-self-stretch" style="margin: 0">
              <img class="card-img-top" src="../public/img/iconeCliente.PNG" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Metas</h5>
                <p class="card-text">Painel administrativo para acompanhamento de metas.</p>
              </div>
              <ul class="list-group list-group-flush " >
                <li class="list-group-item">Cadastrar nova venda</li>
                <li class="list-group-item">Atualizar venda</li>
                <li class="list-group-item">Relatório de metas</li>
              </ul>
            </div>


<!-- Fim dos Cards de opções administrativas -->
</div>
<!-- fim da div container dos cards de opções administrativas -->


@endsection
