@extends('layouts.app')

@section('content')

<h1>Lista de Prospects</h1>

<div class="p-5 lista-admin">


    <table class="table table-hover" >
      <thead class="thead-dark">
          <tr>
              <th>Atualizar</th>
              <th>FreePass</th>
              <th scope="col">ID do Prospect</th>
              <th scope="col">Data de Contato do Prospect</th>
              <th scope="col">Nome do Prospect</th>
              <th scope="col">Meio de Contato do Prospect</th>
              <th scope="col">Temperatura do Prospect</th>
              <th scope="col">Genero do Prospect</th>
              <th scope="col">Telefone 1 do Prospect</th>
              <th scope="col">Telefone 2 do Prospect</th>
              <th scope="col">E-mail do Prospect</th>
              <th scope="col">Consultora de Cadastro do Prospect</th>
              <th scope="col">Tem experimental?</th>
              <th scope="col">Consultora da atualização do Prospect</th>
              <th scope="col">Data de criação do Prospect</th>
              <th scope="col">Data de atualização do Prospect</th>
          </tr>
      </thead>
        @isset($prospects)
            @forelse($prospects as $prospect)
            <tbody>
            <tr>
                <th scope="row"><a href="/novo-sistema-bravus/public/atualizacao_prospect/{{ $prospect -> id_prospect }}">Atualizar</a></th>
                <td><a href="/novo-sistema-bravus/public/freepass/{{ $prospect -> id_prospect }}">Free Pass</a></td>
                <td>{{ $prospect -> id_prospect}}</td>
                <td>{{ $prospect -> data_contato_prospect}}</td>
                <td>{{ $prospect -> nome_prospect}}</td>
                <td>{{ $prospect -> meio_contato_prospect}}</td>
                <td>{{ $prospect -> temperatura_prospect}}</td>
                <td>{{ $prospect -> genero_prospect}}</td>
                <td>{{ $prospect -> telefone_prospect}}</td>
                <td>{{ $prospect -> telefone2_prospect}}</td>
                <td>{{ $prospect -> email_prospect}}</td>
                <td>{{ $prospect -> consultora_cadastro_prospect}}</td>
                <td>{{ $prospect -> experimental_prospect}}</td>
                <td>{{ $prospect -> consultora_atualizacao}}</td>
                <td>{{ $prospect -> created_at}}</td>
                <td>{{ $prospect -> updated_at}}</td>
            </tbody>
            @empty
            <p>Não há registro de produtos.</p>
            @endforelse
        @endisset
    </table>

</div>

@endsection
