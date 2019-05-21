@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <form action="/novo-sistema-bravus/public/cadastro_prospect" method="POST">
                  {!! csrf_field() !!}
          <div class="form-group control-label">
          <label for="inputNome">Nome Completo</label>
          <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Coloque o nome completo do Prospect">
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Coloque E-mail">
              </div>
              <div class="form-group col-md-3">
                <label for="inputTel">Telefone</label>
                <input type="tel" class="form-control" id="inputTel" name="inputTel" placeholder="(11)XXXX-XXXX">
              </div>
              <div class="form-group col-md-3">
                <label for="inputTel2">Telefone 2</label>
                <input type="text" class="form-control" id="inputTel2" name="inputTel2" placeholder="(11)XXXX-XXXX">
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-5">
                <label for="selectMeioDeContato">Meio de Contato</label>
                <select class="custom-select mr-sm-2" name="selectMeioDeContato" id="selectMeioDeContato">
                  <option selected>Escolha um...</option>
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
                  <option selected>Escolha uma...</option>
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
                  <option selected>Escolha uma...</option>
                  <option value="Homem">Homem</option>
                  <option value="Mulher">Mulher</option>
                  <option value="Outros">Outro</option>

                </select>
              </div>
          </div>
          <label for="checkModalidade">Modalidades de Interesse</label>
          <div id="checkModalidade" class="form-group d-flex justify-content-around">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="funcional" value="1">
              <label class="form-check-label" for="funcional">Funcional</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="pilates" value="2">
              <label class="form-check-label" for="pilates">Pilates</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="lutasGeral" value="3" >
              <label class="form-check-label" for="lutasGeral">Lutas em Geral</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" name="modalidades[]" type="checkbox" id="boxe" value="4" >
              <label class="form-check-label" for="boxe">Boxe</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="jiujitsu" value="5" >
              <label class="form-check-label" for="jiujitsu">Jiu Jitsu</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="kenpo" value="6" >
              <label class="form-check-label" for="kenpo">Kenpo</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="kravmaga" value="7" >
              <label class="form-check-label" for="kravmaga">Krav Magá</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="modalidades[]" id="muaythai" value="8" >
              <label class="form-check-label" for="muaythai">Muay Thai</label>
            </div>
          </div>

          <div  class="form-row">
            <div class="form-group control-label col-12">
            <label for="inputDescricaoProspect">Descrição da pessoa</label>
            <textarea rows="4" cols="80" class="form-control" id="inputDescricaoProspect" name="inputDescricaoProspect" placeholder="Descreva a pessoa que você acabou de atender: Como ela é fisicamente? Tem algum objetivo? Já treina? Mora perto?"></textarea>
            </div>
          </div>

          <div  class="form-row">
                <div  class="form-group col-md-6 radio">
                  <p>Marcou experimental?</p>
                    <label class="radio-inline">
                    <input type="radio" name="checkExperimental" value="ExpSim" >Sim
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="checkExperimental" value="ExpNao" checked>Não
                    </label>
                </div>

                  <div class="form-group col-md-6">
                    <label for="inputConsultora">Consultora responsável</label>
                    <input id="inputConsultora" class="form-control text-center" name="inputConsultora" value="{{ Auth::user()->name }}" readonly>

                  </div>

          </div>
          <div class="botao">
            <button type="submit" class="btn btn-primary text-center">Salvar Prospect</button>

          </div>
    </form>
              @isset($msgErro)
              <div class="alert alert-danger">
                  {{ $msgErro }}
              </div>
              @endisset

</div>
@endsection
