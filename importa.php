<?php
require_once('./config.php');
$url = "https://api.sheety.co/8876e395947f5220b2f64fa5b0571b24/cópiaDeFormulárioDeAplicaçãoAcquateria [copyNomeDoFormulário]V2 (respostas)/respostasAoFormulário1";
//$url = "http://localhost/relatorio/dados.json";
$json = file_get_contents($url);
$shets = json_decode($json);
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
$dataLocal = date('d/m/Y H:i:s', time());
ini_set('max_execution_time', 900); //300 seconds = 5 minutes
foreach($shets->respostasAoFormulário1 as $aplicacao => $row){
     
    // $params['__vtrftk'] = 'sid:b20b0c2be049c5181137d4e540f59ad52c769792,1628419676';
    $params['publicid'] = '8047e52ef13b98cfb8452d2c8cb77544';
    $params['name'] = 'landing-acquateria';
    $params['cf_980'] = 'FRANQUIA';
    $params['lastname'] = 'appform';
    $params['firstname'] = $row->nome;
    $params['email'] = $row->eMail;
    $params['mobile'] = $row->whatsapp;
    $params['cf_986'] = $row->estadoCivil;
    $params['cf_988'] = $row->formacao;
    $params['cf_1036'] = $row->investimento;
    $params['cf_998'] = $row->historico;
    $params['cf_996'] = $row->atividadesprofissionais;
    $params['cf_1000'] = $row->ultimaatividade;
    $params['cf_1034'] = $row->regiaointeresse;
    $params['cf_1066'] = $row->cidadedeinteresse;
    $params['cf_1036'] = $row->investimento;
    $params['cf_1038'] = $row->payback;
    $params['cf_1040'] = $row->dedicacao;
    $params['cf_1050'] = $row->remuneracao;
    $params['cf_1048'] = $row->suporte;
    $params['cf_1068'] = $row->comprou;
    $params['cf_1054'] = $row->experiencia;
    $params['cf_1069'] = $row->gostou;
    $params['cf_1052'] = $row->comoconheceu;
    $params['cf_1056'] = $row->resumo;
    $params['cf_1070'] = $row->datahora;
    $params['cf_1072'] = $row->id;
    if(substr($row->datahora, 0, 11 ) == substr($dataLocal, 0, 11)){
    
        $enviar = new config;
        $enviar->url = 'https://crm-hoken.duoit.com.br/modules/Webforms/capture.php';
        $enviar->params = $params;
        $retunado = $enviar->curl($enviar);
        sleep(30);
    }
}
?>
