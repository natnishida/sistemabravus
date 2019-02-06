@extends('layouts.app')

@section('content')

<h1>Lista de FreePass</h1>

<div class="p-5 lista-admin">
<a class="btn btn-dark mb-3" href="/novo-sistema-bravus/public/prospects">Voltar para a lista de prospects</a>
<a class="btn btn-dark mb-3" href="/novo-sistema-bravus/public/freepass">Voltar para a lista de FreePass</a>

    <table class="table table-hover" >
      <thead class="thead-dark">
          <tr>
              <th>Atualizar</th>
              <th>FreePass</th>
              <th scope="col">ID do FreePass</th>
              <th scope="col">ID do Prospect</th>
              <th scope="col">Nome do Prospect</th>
              <th scope="col">Data do FreePass</th>
              <th scope="col">Hora do FreePass</th>
              <th scope="col">Modalidade do FreePass</th>
              <th scope="col">Anamnese feita do FreePass</th>
              <th scope="col">Status do FreePass</th>
              <th scope="col">Detalhes da negociação do FreePass</th>
              <th scope="col">Consultora da atualização do FreePass</th>
              <th scope="col">Data de criação do FreePass</th>
              <th scope="col">Data de atualização do FreePass</th>
          </tr>
      </thead>
        @isset($freepass)
            @forelse($freepass as $umfreepass)
            <tbody>
            <tr>
                <th scope="row"><a href="/novo-sistema-bravus/public/atualizacao_freepass/{{ $umfreepass -> id_freepass }}">Atualizar</a></th>
                <td><a href="/novo-sistema-bravus/public/freepass/{{ $umfreepass -> id_prospect }}">Free Pass</a></td>
                <td>{{ $umfreepass -> id_freepass}}</td>
                <td>{{ $umfreepass -> id_prospect}}</td>
                <td>{{ $umfreepass -> nome_prospect}}</td>
                <td>{{ $umfreepass -> data_freepass}}</td>
                <td>{{ $umfreepass -> hora_freepass}}</td>
                <td>{{ $umfreepass -> nome_modalidade}}</td>
                <td>{{ $umfreepass -> anamnese_feita_freepass}}</td>
                <td>{{ $umfreepass -> status_freepass}}</td>
                <td>{{ $umfreepass -> detalhes_negociacao_freepass}}</td>
                <td>{{ $umfreepass -> consultora_atualizacao_freepass}}</td>
                <td>{{ $umfreepass -> created_at}}</td>
                <td>{{ $umfreepass -> updated_at}}</td>
            </tbody>
            @empty
            <p>Não há registro de produtos.</p>
            @endforelse
        @endisset
    </table>

</div>

@endsection
