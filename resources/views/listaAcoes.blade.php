@extends('layouts.app')

@section('content')

<h1>Lista de Ações CRM a serem feitas</h1>

<div class="p-5 lista-admin">


    <table class="table table-hover" >
      <thead class="thead-dark">
          <tr>
              <th>Atualizar</th>
              <th scope="col">ID do Prospect</th>
              <th scope="col">Id Free Pass</th>
              <th scope="col">Nome do Prospect</th>
              <th scope="col">Data da ação CRM</th>
              <th scope="col">Nome Ação CRM</th>
              <th scope="col">Status da Ação CRM</th>
              <th scope="col">Obs da ação CRM</th>
              <th scope="col">Consultora Responsável por contato futuro (se houver)</th>
              <th scope="col">Data de criação da Ação CRM</th>
              <th scope="col">Data de atualização da Ação CRM</th>
          </tr>
      </thead>
        @isset($acoescrm)
            @forelse($acoescrm as $acaocrm)
            <tbody>
            <tr>
                <th scope="row"><a href="/novo-sistema-bravus/public/atualizacao_acaocrm/{{ $acaocrm -> id_acoes }}">Atualizar</a></th>
                <td>{{ $acaocrm -> id_prospect}}</td>
                <td>{{ $acaocrm -> id_freepass}}</td>
                <td>{{ $acaocrm -> nome_prospect}}</td>
                <td>{{ $acaocrm -> data_acao}}</td>
                <td>{{ $acaocrm -> nome_acao}}</td>
                <td>
                  <form class="" action="index.html" method="post">
                    <select class="" name="inputAtualizacaoStatusAcao" id="inputAtualizacaoStatusAcao">
                      <option selected value="{{ $acaocrm -> status_acao}}">{{ $acaocrm -> status_acao}}</option>
                      <option value="Pendente">Pendente</option>
                      <option value="Finalizado">Finalizado</option>
                      <option value="Reagendado">Reagendado</option>
                      <option value="Sem contato cadastrado">Sem contato cadastrado</option>
                    </select>
                  </form>

                </td>
                <td>{{ $acaocrm -> obs_acao}}</td>
                <td>{{ $acaocrm -> consultora_responsavel_ligacao_futura}}</td>
                <td>{{ $acaocrm -> created_at}}</td>
                <td>{{ $acaocrm -> updated_at}}</td>
            </tbody>
            @empty
            <p>Não há registro de produtos.</p>
            @endforelse
        @endisset
    </table>

</div>

@endsection
