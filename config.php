<?php
class config 
{

    var $url;
    var $params;
    //https://crm-hoken.duoit.com.br/modules/Webforms/capture.php
    
   function curl($dados){

    $fields_string = "";
    foreach($dados->params as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,  $dados->url);
    curl_setopt($ch, CURLOPT_POST, count($dados->params));
    curl_setopt($ch, CURLOPT_POSTFIELDS	, $fields_string);
    $head = curl_exec($ch);
    curl_close($ch);
    return $head;

    }
 

}

?>