<?php

$strAccessToken = "GvVbsxwUB2rmY6pVXPplkHrb7UD+UjsN1VSbpuZLFgNRiFr82ObKlKda/9HpCm146Ay/ekPpm/xAMtJwSwFAuC2+LepcVxezOTjONjWOHjOtQEs59l/VEpDwh8nKf99tenIkzgIEX1eOgHbbxr0s4QdB04t89/1O/w1cDnyilFU=";

$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);

$strUrl = "https://api.line.me/v2/bot/message/reply";
$_userId = $arrJson['events'][0]['source']['userId'];
$_msg = $arrJson['events'][0]['message']['text'];
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$filename = ''.$_userId.'.txt';
if (file_exists($filename)) {
  $myfile = fopen(''.$_userId.'.txt', "w+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);
} else {
  $myfile = fopen(''.$_userId.'.txt', "x+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);
}


$api_key="raGvU0tka_kLPSFwL7ObSQKwZGR-91G2";
$url = 'https://api.mlab.com/api/1/databases/byone/collections/linebot?apiKey='.$api_key.'';
$json = file_get_contents('https://api.mlab.com/api/1/databases/byone/collections/linebot?apiKey='.$api_key.'&q={"question":"'.$_msg.'"}');
$data = json_decode($json);
$isData=sizeof($data);
if (strpos($_msg, '@') !== false) {
    $x_tra = str_replace("@","", $_msg);
    $pieces = explode("&", $x_tra);
    $_question=str_replace("","",$pieces[0]);
    $_answer=str_replace("","",$pieces[1]);
    //Post New Data
    $newData = json_encode(
      array(
        'question' => $_question,
        'answer'=> $_answer
      )
    );
    $opts = array(
      'http' => array(
          'method' => "POST",
          'header' => "Content-type: application/json",
          'content' => $newData
       )
    );
    $context = stream_context_create($opts);
    $returnValue = file_get_contents($url,false,$context);
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'รับทราบจ้า';
}else{
  if (strpos($_msg, '#') !== false) {
    $x_tra = str_replace("#", $_msg);
    //Post New Data
    $newData = json_encode(
      array(
        'mode' => $x_tra,
      )
    );
    $opts = array(
      'http' => array(
          'method' => "POST",
          'header' => "Content-type: application/json",
          'content' => $newData
       )
    );
    $context = stream_context_create($opts);
    $returnValue = file_get_contents($url,false,$context);
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'เปลี่ยนโหมด';
  } else {
if ($mode = 1) {
        $_question = $_msg
        $newData = json_encode(
      array(
        'question' => $_question,
      )
    );
    $opts = array(
      'http' => array(
          'method' => "POST",
          'header' => "Content-type: application/json",
          'content' => $newData
       )
    );
    $context = stream_context_create($opts);
    $returnValue = file_get_contents($url,false,$context);
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'เรียนรู้คำถาม';
  } else {
    if ($mode = 2) {
        $_answer = $_msg
        $newData = json_encode(
      array(
        'answer' => $_answer,
      )
    );
    $opts = array(
      'http' => array(
          'method' => "POST",
          'header' => "Content-type: application/json",
          'content' => $newData
       )
    );
    $context = stream_context_create($opts);
    $returnValue = file_get_contents($url,false,$context);
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'เรียนรู้คำถาม';
    } else {
  if($isData >0){
   foreach($data as $rec){
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = $rec->answer;
   }
  }else{
    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = 'บอทไม่รู้ วิธีสอนพิมพ์: @คำถาม&คำตอบ';
  }
  }
    }
  }
}


$channel = curl_init();
curl_setopt($channel, CURLOPT_URL,$strUrl);
curl_setopt($channel, CURLOPT_HEADER, false);
curl_setopt($channel, CURLOPT_POST, true);
curl_setopt($channel, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($channel, CURLOPT_RETURNTRANSFER,true);
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($channel);
curl_close ($channel);

sleep(5);
  $myfile = fopen(''.$_userId.'.txt', "w+") or die("Unable to open file!");
  fwrite($myfile, $_msg1);
  fclose($myfile);
?>
