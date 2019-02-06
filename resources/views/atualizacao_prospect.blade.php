@extends('layouts.app')

@section('content')
<div class="container">
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
      <form action="/novo-sistema-bravus/public/atualizacao_prospect/{{ $prospect -> id_prospect}}" method="POST">
                  {!! csrf_field() !!}
          <div class="form-group control-label">
          <label for="inputNome">Nome Completo</label>
          <input type="text" class="form-control" id="inputNome" name="inputNome" value="{{ $prospect -> nome_prospect}}">
          </div>
          <div class="form-group control-label">
          <label for="inputDataContato">Data de contato</label>
          <input type="date" class="form-control" id="inputDataContato" name="inputDataContato" value="{{ $prospect -> data_contato_prospect}}">
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="{{ $prospect -> email_prospect}}">
              </div>
              <div class="form-group col-md-3">
                <label for="inputTel">Telefone</label>
                <input type="tel" class="form-control" id="inputTel" name="inputTel" value="{{ $prospect ->telefone_prospect}}">
              </div>
              <div class="form-group col-md-3">
                <label for="inputTel2">Telefone 2</label>
                <input type="text" class="form-control" id="inputTel2" name="inputTel2" value="{{ $prospect ->telefone2_prospect}}">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-5">
                <label for="selectMeioDeContato">Meio de Contato</label>
                <select class="custom-select mr-sm-2" name="selectMeioDeContato" id="selectMeioDeContato">
                  <option selected value="{{ $prospect ->meio_contato_prospect}}">{{ $prospect ->meio_contato_prospect}}</option>
                  <option value="Agendamento pelo Site">Agendamento pelo Site</option>
                  <option value="E-mail">E-mail</option>
                  <option value="Facebook">Facebook</option>
                  <option value="Indicacao">Indicação</option>
                  <option value="Instagram">Instagram</option>
                  <option value="Pessoalmente">Pessoalmente</option>
                  <option value="Resposta de E-mail">Resposta de E-mail</option>
                  <option value="Telefone">Telefone</option>
                  <option value="WhatsApp">WhatsApp</option>
                </select>
              </div>
              <div class="form-group col-md-5">
                <label for="selectTemperatura">Temperatura</label>
                <select class="custom-select mr-sm-2" name="selectTemperatura" id="selectTemperatura">
                  <option selected value="{{ $prospect ->temperatura_prospect}}">{{ $prospect ->temperatura_prospect}}</option>
                  <option value="Alta">Alta</option>
                  <option value="Baixa">Baixa</option>
                  <option value="Descartar">Descartar</option>
                  <option value="Esperando Turma">Esperando Turma</option>
                  <option value="Focar">Focar</option>
                  <option value="Futuramente">Futuramente</option>
                  <option value="GymPass">GymPass</option>
                  <option value="Média">Média</option>

                </select>

              </div>
              <div class="form-group col-md-2">
                <label for="selectGenero">Gênero</label>
                <select class="custom-select mr-sm-2" name="selectGenero" id="selectGenero">
                  <option selected value="{{ $prospect ->genero_prospect}}">{{ $prospect ->genero_prospect}}</option>
                  <option value="Homem">Homem</option>
                  <option value="Mulher">Mulher</option>
                  <option value="Outros">Outro</option>

                </select>
              </div>
          </div>
          <div  class="form-row">
            <div class="form-group control-label col-12">
            <label for="inputDescricaoProspect">Descrição da pessoa</label>
            <textarea rows="4" cols="80" class="form-control" id="inputDescricaoProspect" name="inputDescricaoProspect" placeholder="Descreva a pessoa que você acabou de atender: Como ela é fisicamente? Tem algum objetivo? Já treina? Mora perto?">{{$prospect->descricao_prospect}}</textarea>
            </div>
          </div>
          <div  class="form-row">
                <div  class="form-group col-md-6 radio">
                  <p>Marcou experimental?</p>
                    <label class="radio-inline">
                    <input type="radio" checked name="checkExperimental" value="{{ $prospect ->experimental_prospect}}" >{{ $prospect ->experimental_prospect}}
                    </label>
                    <label class="radio-inline">

                    <input type="radio" name="checkExperimental" value="ExpSim" >Sim
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="checkExperimental" value="ExpNao" >Não
                    </label>
                </div>

                  <div class="form-group col-md-6">
                    <label for="inputConsultora">Consultora responsável pela atualização</label>
                    <input id="inputConsultora" class="form-control text-center" name="inputConsultora" value="{{ Auth::user()->name }}" readonly>
                  </div>
          </div>
          <div class="botao">
            <button type="submit" class="btn btn-primary text-center">Salvar Prospect</button>

          </div>
    </form>

</div>
@endsection
