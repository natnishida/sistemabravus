<?php

namespace App\Http\Controllers;

use App\User;
use \App\Prospect as Prospect;
use \App\Modalidades as Modalidades;
use \App\ProspectModalidades as ProspectModalidades;
use \App\Freepass as Freepass;
use \App\Acoes as Acoes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SistemaController extends Controller

{

  /**
  * Show the Profile for the Given User.
  * @param int $id
  */

public function inserirProspect(Request $r) {
  if ($r->isMethod('get')) {
  return view('cadastro_prospect');
}

$validatedData = $r->validate([
    'inputNome'=> 'required',
    'selectMeioDeContato' => 'required',
    'selectTemperatura' => 'required',
    'selectGenero' => 'required',
    'inputTel' => 'required',
    'inputEmail' => 'required',
    'inputDescricaoProspect' => 'required',
    'checkExperimental' => 'required',
    'modalidades' => 'required',

]);

  $novoProspect = new Prospect;


  $novoProspect->data_contato_prospect = date('Y-m-d H:i:s');
  $novoProspect->nome_prospect = $r->input("inputNome");
  $novoProspect->meio_contato_prospect = $r->input("selectMeioDeContato");
  $novoProspect->temperatura_prospect = $r->input("selectTemperatura");
  $novoProspect->genero_prospect = $r->input("selectGenero");
  $novoProspect->telefone_prospect = $r->input("inputTel");
  $novoProspect->telefone2_prospect = $r->input("inputTel2");
  $novoProspect->email_prospect = $r->input("inputEmail");
  $novoProspect->descricao_prospect = $r->input("inputDescricaoProspect");
  $novoProspect->consultora_cadastro_prospect = $r->input("inputConsultora");
  $novoProspect->experimental_prospect = $r->input("checkExperimental");
  $novoProspect->consultora_atualizacao = $r->input("inputConsultora");

  $novoProspect->save();

  $id_prospect = $novoProspect->id_prospect;
  $nome_prospect = $novoProspect->nome_prospect;
  // $modalidades = [];
  //
  // foreach ($r->input("modalidades") as $id_modalidade) {
  //   $modalidades[] = ["id_prospect"=>$id_prospect, "id_modalidade"=>$id_modalidade]
  // };

  $modalidades = $r->input("modalidades");
  foreach ($modalidades as $modalidade) {
    $novaModalidade = new ProspectModalidades;
    $novaModalidade->id_prospect = $id_prospect;
    $novaModalidade->id_modalidade = $modalidade;
    $novaModalidade->save();
  }

  if ($novoProspect->experimental_prospect === "ExpNao") {
    $novocrm = new Acoes;
    $novocrm->id_prospect = $id_prospect;
    $novocrm->nome_prospect = $nome_prospect;

    switch (Carbon::now()->dayOfWeek) {
      case 0:
        $novocrm->data_acao = Carbon::now()->addDays(1)->format('Y-m-d');
        $novocrm->nome_acao = "E-mail de boas vindas";
        $novocrm->status_acao = "Pendente";
        break;
      case 5:
        $novocrm->data_acao = Carbon::now()->addDays(3)->format('Y-m-d');
        $novocrm->nome_acao = "E-mail de boas vindas";
        $novocrm->status_acao = "Pendente";

        break;
      case 6:
        $novocrm->data_acao = Carbon::now()->addDays(2)->format('Y-m-d');
        $novocrm->nome_acao = "E-mail de boas vindas";
        $novocrm->status_acao = "Pendente";
        break;
      default:
        $novocrm->data_acao = Carbon::now()->addDays(1)->format('Y-m-d');
        $novocrm->nome_acao = "E-mail de boas vindas";
        $novocrm->status_acao = "Pendente";
        break;
    }
  $novocrm->save();
  }

  if ($novoProspect->experimental_prospect === "ExpNao") {

      $novocrm = new Acoes;
      $novocrm->id_prospect = $id_prospect;
      $novocrm->nome_prospect = $nome_prospect;

    switch (Carbon::now()->dayOfWeek) {
      case 0:
      $novocrm->data_acao = Carbon::now()->addDays(8)->format('Y-m-d');
      $novocrm->nome_acao = "Uma semana após contato sem FreePass.";
      $novocrm->status_acao = "Pendente";
        break;
      case 5:
        $novocrm->data_acao = Carbon::now()->addDays(7)->format('Y-m-d');
        $novocrm->nome_acao = "Uma semana após contato sem FreePass.";
        $novocrm->status_acao = "Pendente";
        break;
      case 6:
        $novocrm->data_acao = Carbon::now()->addDays(9)->format('Y-m-d');
        $novocrm->nome_acao = "Uma semana após contato sem FreePass.";
        $novocrm->status_acao = "Pendente";
        break;
      default:
        $novocrm->data_acao = Carbon::now()->addDays(7)->format('Y-m-d');
        $novocrm->nome_acao = "Uma semana após contato sem FreePass.";
        $novocrm->status_acao = "Pendente";
        break;
    }
    $novocrm->save();
  }

  if ($novoProspect->experimental_prospect === "ExpSim" && $novoProspect->save()) {
    return view('cadastro_freepass', ['novoProspect' => $novoProspect]);
  } elseif ($novoProspect->experimental_prospect === "ExpNao" && $novoProspect->save()) {
    return view('home',
    ['msgSucesso' => "Dados gravados com sucesso!"]);
  } else {
    return view('cadastro_prospect',
    ['msgErro' => 'Erro na gravação do Prospect']);
  }
}

public function inserirFreePass(Request $r) {
  if ($r->isMethod('get')) {
  return view('cadastro_freepass');
}

$novoFreePass = new Freepass;


$novoFreePass->id_prospect = $r->input("inputIdFreePass");
$novoFreePass->nome_prospect = $r->input("inputNomeFreePass");
$novoFreePass->data_freepass = $r->input("inputDataFreePass");
$novoFreePass->hora_freepass = $r->input("inputHoraFreePass");
$novoFreePass->nome_modalidade = $r->input("inputModalidadeFreePass");
$novoFreePass->anamnese_feita_freepass = $r->input("inputAnamneseFreePass");
$novoFreePass->status_freepass = $r->input("inputStatusFreePass");
$novoFreePass->detalhes_negociacao_freepass = $r->input("inputNegociacaoFreePass");
$novoFreePass->consultora_cadastro_freepass = $r->input("inputConsultoraFreePass");
$novoFreePass->consultora_atualizacao_freepass = $r->input("inputConsultoraFreePass");

$novoFreePass->save();

$id_prospect = $novoFreePass->id_prospect;
$nome_prospect = $novoFreePass->nome_prospect;
$id_freepass = $novoFreePass->id_freepass;
$data_freepass = $novoFreePass->data_freepass;
$anamnese_feita_freepass = $novoFreePass->anamnese_feita_freepass;

//inserir as regras aqui de crm para free pass.
// 1- normal: veio e free pass é para daqui a dois ou mais dias - enviar e-mail de boas vindas + lembrança de free pass + ação pos FP

$data_hoje = Carbon::now()->format('Y-m-d');
$data_amanha = Carbon::tomorrow()->format('Y-m-d');
$data_depois_amanha = Carbon::tomorrow()->addDays(1)->format('Y-m-d');
$dia_semana_freepass = date('w', strtotime($data_freepass));


// versoes com freepass
//Ligar para Fazer Anamnese, confirmar Free Pass E mandar e-mail de boas vindas com Free Pass
// Fazer Anamnese e Lembrança do Free Pass (1 dia antes) & Email de Boas Vindas




if ($data_freepass == $data_amanha) {
  $novocrm = new Acoes;
  $novocrm->id_prospect = $id_prospect;
  $novocrm->id_freepass = $id_freepass;
  $novocrm->nome_prospect = $nome_prospect;
  $novocrm->data_acao = $data_amanha;
  $novocrm->nome_acao = "Ligar para Fazer Anamnese, confirmar Free Pass E mandar e-mail de boas vindas com Free Pass";
  $novocrm->status_acao = "Pendente";
  $novocrm->save();

} else if (Carbon::now()->dayOfWeek == 6 && $data_freepass == $data_depois_amanha) {
  $novocrm = new Acoes;
  $novocrm->id_prospect = $id_prospect;
  $novocrm->id_freepass = $id_freepass;
  $novocrm->nome_prospect = $nome_prospect;
  $novocrm->data_acao = $data_depois_amanha;
  $novocrm->nome_acao = "Ligar para Fazer Anamnese, confirmar Free Pass E mandar e-mail de boas vindas com Free Pass";
  $novocrm->status_acao = "Pendente";
  $novocrm->save();

} else if ($data_freepass == $data_hoje && $anamnese_feita_freepass != "Feita") {
  $novocrm = new Acoes;
  $novocrm->id_prospect = $id_prospect;
  $novocrm->id_freepass = $id_freepass;
  $novocrm->nome_prospect = $nome_prospect;
  $novocrm->data_acao = $data_freepass;
  $novocrm->nome_acao = "Fazer Anamnese para Free Pass do mesmo dia.";
  $novocrm->status_acao = "Pendente";
  $novocrm->save();

} else {
  switch ($dia_semana_freepass) {
    case '1':
    $novocrm = new Acoes;
    $novocrm->id_prospect = $id_prospect;
    $novocrm->id_freepass = $id_freepass;
    $novocrm->nome_prospect = $nome_prospect;
      $novocrm->data_acao = date('Y-m-d', strtotime("-3 days",strtotime($data_freepass)));
      $novocrm->nome_acao = "Fazer Anamnese e Lembrança do Free Pass (1 dia antes) ";
      $novocrm->status_acao = "Pendente";
        $novocrm->save();

        $novocrm = new Acoes;
        $novocrm->id_prospect = $id_prospect;
        $novocrm->id_freepass = $id_freepass;
        $novocrm->nome_prospect = $nome_prospect;


        switch (Carbon::now()->dayOfWeek) {
          case 0:
            $novocrm->data_acao = Carbon::now()->addDays(1)->format('Y-m-d');
            $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
            $novocrm->status_acao = "Pendente";
            $novocrm->save();
            break;
          case 5:
            $novocrm->data_acao = Carbon::now()->addDays(3)->format('Y-m-d');
            $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
            $novocrm->status_acao = "Pendente";
            $novocrm->save();

            break;
          case 6:
            $novocrm->data_acao = Carbon::now()->addDays(2)->format('Y-m-d');
            $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
            $novocrm->status_acao = "Pendente";
            $novocrm->save();
            break;
          default:
            $novocrm->data_acao = Carbon::now()->addDays(1)->format('Y-m-d');
            $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
            $novocrm->status_acao = "Pendente";
            $novocrm->save();
            break;
        }

      break;

    default:
    $novocrm = new Acoes;
    $novocrm->id_prospect = $id_prospect;
    $novocrm->id_freepass = $id_freepass;
    $novocrm->nome_prospect = $nome_prospect;
        $novocrm->data_acao = date('Y-m-d', strtotime("-1 day",strtotime($data_freepass)));
        $novocrm->nome_acao = "Fazer Anamnese e Lembrança do Free Pass (1 dia antes) ";
        $novocrm->status_acao = "Pendente";
          $novocrm->save();

          $novocrm = new Acoes;
          $novocrm->id_prospect = $id_prospect;
          $novocrm->id_freepass = $id_freepass;
          $novocrm->nome_prospect = $nome_prospect;


          switch (Carbon::now()->dayOfWeek) {
            case 0:
              $novocrm->data_acao = Carbon::now()->addDays(1)->format('Y-m-d');
              $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
              $novocrm->status_acao = "Pendente";
              $novocrm->save();
              break;
            case 5:
              $novocrm->data_acao = Carbon::now()->addDays(3)->format('Y-m-d');
              $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
              $novocrm->status_acao = "Pendente";
              $novocrm->save();

              break;
            case 6:
              $novocrm->data_acao = Carbon::now()->addDays(2)->format('Y-m-d');
              $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
              $novocrm->status_acao = "Pendente";
              $novocrm->save();
              break;
            default:
              $novocrm->data_acao = Carbon::now()->addDays(1)->format('Y-m-d');
              $novocrm->nome_acao = "E-mail de boas vindas com Data do FreePass Marcado";
              $novocrm->status_acao = "Pendente";
              $novocrm->save();
              break;
          }
      break;
  }
}

if ($novoFreePass->save()) {
  return view('home',
  array('msgSucesso' => 'FreePass gravado com sucesso'));
} else {
  return view('cadastro_freepass',
  array('msgErro' => 'Erro na gravação do FreePass'));
}
}

// Mostra Lista dos prospects

public function listaProspects() {
  $prospects = Prospect::All();
  return view('listaProspects', array('prospects' => $prospects));
}

public function listaFreepass() {
  $freepass = Freepass::All();
  return view('listaFreepass', array('freepass' => $freepass));
}

public function listaAcoes() {
  $data_hoje = Carbon::now()->format('Y-m-d');
  $acoespendentes = DB::table('freepass')
  ->where('data_freepass', '<', $data_hoje)
  ->where('status_freepass', 'like', '%agendado')
  ->get();

  foreach ($acoespendentes as $acaopendente) {

      $novaacaopendente = new Acoes;
      $novaacaopendente->id_prospect = $acaopendente->id_prospect;
      $novaacaopendente->id_freepass = $acaopendente->id_freepass;
      $novaacaopendente->nome_prospect = $acaopendente->nome_prospect;
      $novaacaopendente->data_acao = $data_hoje;
      $novaacaopendente->nome_acao = "Marque se veio ou não veio";
      $novaacaopendente->status_acao = "Pendente";
      $novaacaopendente->save();

  }

  $acoescrm = Acoes::All();
  return view('listaAcoes', array('acoescrm' => $acoescrm));
}

// atualizacoes

public function atualizarProspect($id,Request $r){
  if ($r->isMethod('get')) {
    $prospect = Prospect::find($id);
    return view('atualizacao_prospect', array('prospect' => $prospect));
  }
    $prospect = Prospect::find($id);
    $prospect->data_contato_prospect = $r->input("inputDataContato");
    $prospect->nome_prospect = $r->input("inputNome");
    $prospect->meio_contato_prospect = $r->input("selectMeioDeContato");
    $prospect->temperatura_prospect = $r->input("selectTemperatura");
    $prospect->genero_prospect = $r->input("selectGenero");
    $prospect->telefone_prospect = $r->input("inputTel");
    $prospect->telefone2_prospect = $r->input("inputTel2");
    $prospect->email_prospect = $r->input("inputEmail");
    $prospect->descricao_prospect = $r->input("inputDescricaoProspect");
    $prospect->experimental_prospect = $r->input("checkExperimental");
    $prospect->consultora_atualizacao = $r->input("inputConsultora");

    $freepass = Freepass::where('id_prospect', $id)->get();
    foreach ($freepass as $umfreepass) {
    $umfreepass->nome_prospect = $r->input("inputNome");
    $umfreepass->consultora_atualizacao_freepass = $r->input("inputConsultora");
    $umfreepass->save();
    }

    if ($prospect->experimental_prospect === "ExpSim" && $prospect->save()) {
      return view('cadastro_freepass', ['novoProspect' => $prospect]);
    } elseif ($prospect->experimental_prospect === "ExpNao" && $prospect->save()) {
      return view('atualizacao_prospect',
      array('msgSucesso' => 'Prospect atualizado com sucesso', 'prospect' => $prospect));
    } else {
      return view('atualizacao_prospect',
      array('msgErro' => 'Erro na atualização do prospect', 'prospect' => $prospect));
    }
}

public function listaFreepassCliente($id){
  $freepass = Freepass::where('id_prospect', $id)->get();
  return view('listaFreepassCliente', array('freepass' => $freepass));
}

public function atualizarFreePass($id,Request $r){
  if ($r->isMethod('get')) {
    $freepass = Freepass::find($id);
    return view('atualizacao_freepass', array('freepass' => $freepass));
  }
  $freepass = Freepass::find($id);

  $freepass->data_freepass = $r->input("inputDataFreePass");
  $freepass->hora_freepass = $r->input("inputHoraFreePass");
  $freepass->nome_modalidade = $r->input("inputModalidadeFreePass");
  $freepass->anamnese_feita_freepass = $r->input("inputAnamneseFreePass");
  $freepass->status_freepass = $r->input("inputStatusFreePass");
  $freepass->detalhes_negociacao_freepass = $r->input("inputNegociacaoFreePass");
  $freepass->consultora_atualizacao_freepass = $r->input("inputConsultoraFreePass");

  $freepass->save();

  if ($freepass->save()) {
    return view('home',
    array('msgSucesso' => 'FreePass atualizado com sucesso'));
  } else {
    return view('cadastro_freepass',
    array('msgErro' => 'Erro na atualização do FreePass'));
  }
}

public function listaFreepassDia(){
  $data_hoje = Carbon::now()->format('Y-m-d');
  $freepass = DB::table('freepass')
  ->where('data_freepass','<=', $data_hoje)
  ->where('status_freepass', 'like', '%agendado')
  ->get();
  return view('listaFreepassDoDia', ['freepass' => $freepass]);
}

}
