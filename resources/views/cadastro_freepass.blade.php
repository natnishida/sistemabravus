@extends('layouts.app')

@section('content')
<div class="container">
      <form action="/novo-sistema-bravus/public/cadastro_freepass" method="POST">
                  {!! csrf_field() !!}
          <div class="d-flex flex-column justify-content-center mb-3">

            @isset($novoProspect)

            <div class="form-group control-label row align-items-center">
              <p style="text-align: left" class="col-2 m-0">ID:</p>
              <input type="text" readonly class="form-control col-4 p-0" id="inputIdFreePass" name="inputIdFreePass" value="{{ $novoProspect -> id_prospect }}" style="text-align: center">
            </div>
            <div class="form-group control-label row align-items-center">
            <p style="text-align: left" class="col-2 m-0">Nome:</p>
            <input type="text" readonly class="form-control col-10 p-0" id="inputNomeFreePass" name="inputNomeFreePass" value="{{ $novoProspect -> nome_prospect }}" style="text-align: center">
            </div>
            
            @else

            <div class="form-group control-label row align-items-center">
              <p style="text-align: left" class="col-2 m-0">ID:</p>
              <input type="text" class="form-control col-4 p-0" id="inputIdFreePass" name="inputIdFreePass" value="" style="text-align: center">
            </div>
            <div class="form-group control-label row align-items-center">
            <p style="text-align: left" class="col-2 m-0">Nome:</p>
            <input type="text" class="form-control col-10 p-0" id="inputNomeFreePass" name="inputNomeFreePass" value="" style="text-align: center">
            </div>
            @endisset
            <div class="form-group control-label row align-items-center">
            <p style="text-align: left" class="col-2 m-0">Consultora responsável:</p>
            <input type="text" readonly class="form-control col-10 p-0" id="inputConsultoraFreePass" name="inputConsultoraFreePass" value="{{ Auth::user()->name }}" style="text-align: center">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2 mt-1">
              <label for="inputDataFreePass">Data do FreePass</label>
              <input class="m-0" type="date" id="inputDataFreePass" name="inputDataFreePass">
            </div>
            <div class="form-group col-md-1 mt-1">
              <label for="inputHoraFreePass">Hora</label>
              <input class="m-0" type="time" id="inputHoraFreePass" name="inputHoraFreePass">
            </div>
              <div class="form-group col-md-3">
                <label for="inputModalidadeFreePass">Modalidade do FreePass</label>
                <select class="custom-select mr-sm-2" name="inputModalidadeFreePass" id="inputModalidadeFreePass">
                  <option selected>Escolha um...</option>
                  <option value="Funcional">Funcional</option>
                  <option value="Pilates">Pilates</option>
                  <option value="Boxe">Boxe</option>
                  <option value="Jiu Jitsu">Jiu Jitsu</option>
                  <option value="Muay Thai">Muay Thai</option>
                  <option value="Kenpo">Kenpo</option>
                  <option value="Krav Magá">Krav Magá</option>
                  <option value="Visita">Visita</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputAnamneseFreePass">Status da Anamnese</label>
                <select class="custom-select mr-sm-2" name="inputAnamneseFreePass" id="inputAnamneseFreePass">
                  <option selected>Escolha uma...</option>
                  <option value="Feita">Feita</option>
                  <option value="Não feita">Não feita</option>
                  <option value="Sem contato">Sem contato</option>
                  <option value="Marcou e veio no mesmo dia">Marcou e veio no mesmo dia</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputStatusFreePass">Status do Free Pass</label>
                <select class="custom-select mr-sm-2" name="inputStatusFreePass" id="inputStatusFreePass">
                  <option selected value="Agendado">Agendado</option>
                  <option value="Veio">Veio</option>
                  <option value="Faltou">Faltou</option>
                  <option value="Reagendado">Reagendado</option>
                </select>
              </div>
          </div>


          <div  class="form-row">
            <div class="form-group control-label col-12">
            <label for="inputNegociacaoFreePass">Detalhes da negociação</label>
            <textarea rows="8" cols="80" class="form-control" id="inputNegociacaoFreePass" name="inputNegociacaoFreePass" placeholder="Insira qualquer dado de negociação que tenha sido passado."></textarea>
            </div>
          </div>


            <div class="botao">
              <button type="submit" class="btn btn-primary text-center">Salvar Free Pass</button>

            </div>

    </form>
    @isset($msgErro)

        <div class="alert alert-danger">
            {{ $msgErro }}
        </div>

    @endisset

</div>
@endsection
