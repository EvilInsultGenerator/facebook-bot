<?php
/**
 * Created by PhpStorm.
 * User: marvin
 * Date: 08/30/2016
 * Time: 10:56
 */

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '240506093016544',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

file_put_contents("fb.txt",file_get_contents("php://input"));

$fb = file_get_contents("fb.txt");
$fb = json_decode($fb);

$id = $fb->entry[0]->messaging[0]->sender->id;
$reid = $fb->entry[0]->messaging[0]->recipient->id;
$message = $fb->entry[0]->messaging[0]->message->text;

$token = "EAADavTA9leABAFRXDbfjT9IwkhJPJLrXDGFjGdrm1CHZBba5YaZARrZCmZCA9kydyrUyyZAjFWZCKUbOpaSxTtpvVLuZB4KICg4YKAMf28wvNTjEolbZA4a4md5daK88wocZBdRc0D7PDVZB467xQFjlZCC2EZAm9BZCjXbBPwMGXTnyrZBQZDZD";

$fp = json_decode(file_get_contents('user.json'), true);

$site =json_encode(array(
         "type" => "web_url",
         "url" => " https://evilinsult.com ",
         "title" => "Evil Insult Generator Homepage"
 ));

$element = array(
            "title" => "Evil Insult Generator Homepage",
            "image_url" => "https://evilinsult.com/bots/facebook/evil.jpg",
            "subtitle" => "Click",
            "buttons" => [$site]
             );

$URL= array(
         "type" => "template",
         "payload" => array(
               "template_type" => "generic",
               "elements" => [$element]
        )
 );

$buttonGenerate = array(
        "content_type" => "text",
        "title" => "Generate",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonGenerate"
 );

$buttonLanguage = array(
        "content_type" => "text",
        "title" => "Language",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonLanguage"
 );
 
 $buttonHomepage = array(
        "content_type" => "text",
        "title" => "Homepage",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_buttonHomepage"
 );
 
$keyboardSet =[$buttonGenerate,$buttonLanguage,$buttonHomepage];

$buttonEN= array(
        "content_type" => "text",
        "title" => "en",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_EN"
 );

$buttonDE = array(
        "content_type" => "text",
        "title" => "de",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_DE"
 );
 $buttonES= array(
        "content_type" => "text",
        "title" => "es",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_EN"
 );

$buttonPT = array(
        "content_type" => "text",
        "title" => "pt",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_DE"
 );
 $buttonRU= array(
        "content_type" => "text",
        "title" => "ru",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_EN"
 );

$buttonFR = array(
        "content_type" => "text",
        "title" => "fr",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_DE"
 );
 $buttonCN= array(
        "content_type" => "text",
        "title" => "cn",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_EN"
 );

$buttonSW = array(
        "content_type" => "text",
        "title" => "sw",
        "payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_DE"
 );
 //Create new button for keyboardLanguage, for example: 
 //$buttonRU = array(
 // "content_type" => "text",
 //"title" => "ru",
 //"payload" => "DEVELOPER_DEFINED_PAYLOAD_FOR_PICKING_RU"
 // );
$keyboardLanguage = [$buttonZH,$buttonES,$buttonEN,$buttonHI,$buttonAR,$buttonPT,$buttonBN,$buttonRU,$buttonJA,$buttonJV,$buttonSW,$buttonDE,$buttonKO,$buttonFR,$buttonTE,$buttonMR,$buttonTR,$buttonTA,$buttonVI,$buttonUR,$buttonEL/*add button here, for example: $buttonRU */];


if(($message=='zh')||($message=='es')||($message=='en')||($message=='hi')||($message=='ar')||($message=='pt')||($message=='bn')||($message=='ru')($message=='ja')||($message=='jv')||($message=='sw')||($message=='de')||($message=='ko')||($message=='fr')||($message=='te')||($message=='mr')($message=='tr')||($message=='ta')||($message=='vi')||($message=='ur')||($message=='el')){
 $is = false;
        foreach ( $fp as $key=> $value) {
        if($key==$chat_id){
            $is = true;
         }
        }
        if ($is!= false) {
           foreach ( $fp as $key=> $value) {
             if($key==$chat_id){
                $fp[$key] = $message;
             }
            }
             $arr3 = json_encode($fp);
             file_put_contents('user.json', $arr3);
             $fuck = "Language successfully changed to: ".$message;
             $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "$fuck",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
          }
          else{
           $fp[$id] = $message;
           $arr3 = json_encode($fp);
           file_put_contents('user.json', $arr3);
           $fuck = "Language successfully changed to: ".$message;
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "$fuck",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
          }
          $message = "none";
}

switch ($message) {
        case 'Generate':
          $lang = 'en';
          foreach ( $fp as $key=> $value) {
          if($key==$id){
          $lang = $value;
          }
          }
          $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang='.$lang);
          //You should add a new operator "if" for comparing with language which was added (for example  if($lang =='ru'))
          // After that you should add a new expression for the variable "fuck" (for example $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=ru')                                                                                                                           Внимание сюда |         
          //                                                                                                                                                             ^
          //                                                                                                                                                 look here   |
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "$fuck",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
        break;
        case 'Language':
          $lang = 'en';
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "Choose language",
           "quick_replies" => json_encode($keyboardLanguage)
            )
           );
        break;
        case 'Homepage':
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => " ",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
           $date = array(
           'recipient' => array('id' => "$id" ),
           'message' => array(
                      "attachment" =>$URL
                              )
           );
        break;
        
        case 'none':
        break;
//You should add a new "case" with description abbreviation needed language  (for example ru, fr, pt)
// after you should copy some case which was created before and you should change something therre
// the expression assigned to a variable "fuck", depending on the desired language
// (for example $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=ru')
//                                                                                          ^
//                                                                              Look here   |
          default:
          $lang = 'en';
          foreach ( $mass as $key=> $value) {
          if($key==$chat_id){
          $lang = $value;
          }
          }
          $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang='.$lang);
          // You shouldd add a new operator "if" for comparing with language which was added (for example if($lang =='ru'))
          // after you sholud add a new expression for a variabe "fuck":  $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=ru);
          //                                                                                                                                          ^
          //                                                                                                                           Look here      |
           $data = array(
           'recipient' => array('id' => "$id" ),
           'message' => array("text" => "$fuck",
           "quick_replies" => json_encode($keyboardSet)
            )
           );
}

function checkUser($mass,$chat_id){
    $is = false;
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $is = true;
        }
    }
    return $is;
}
function AddUser($chat_id,$mass,$message){
    $mass[$chat_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
}
 $options = array(
          'http' => array(
             'method' => 'POST',
             'content' => json_encode($data),
             'header' => "Content-Type: application/json"
             )
 );
 $option = array(
          'http' => array(
             'method' => 'POST',
             'content' => json_encode($date),
             'header' => "Content-Type: application/json"
             )
 );


$context = stream_context_create($options);
$contexts = stream_context_create($option);
file_get_contents("https://graph.facebook.com/v2.7/me/messages?access_token=$token",false, $contexts);
file_get_contents("https://graph.facebook.com/v2.7/me/messages?access_token=$token",false, $context);
