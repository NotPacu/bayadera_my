<?php
include("./connect.php");



function invalid_info($cause){
    echo "invalid info : $cause";
    exit;
}

//Recive parametros y convierte la sec_key en md5
try{
    $rl_name = $_GET["real_name"];
    $phone = $_GET["phone"];
    $bird_datetime = $_GET["bird_datetime"];
    $email = $_GET["email"];
    $nickname = $_GET["nickname"];
    $sec_key = $_GET["sec_key"];

    if (strpos($rl_name,"'") or  strpos($rl_name,'"') or strpos($rl_name,"´") or strpos($rl_name,"´") or  strpos($rl_name,"\00") or strpos($rl_name,"\n") or strpos($rl_name,"\r") or strpos($rl_name,"\x1a")){
        invalid_info("Nombre real");
    }

    if (strpos($sec_key,"'") or  strpos($sec_key,'"') or strpos($sec_key,"´") or strpos($sec_key,"´") or  strpos($sec_key,"\00") or strpos($sec_key,"\n") or strpos($sec_key,"\r") or strpos($sec_key,"\x1a")){
        invalid_info("Contraseña");
    }

    if (strpos($nickname,"'") or  strpos($nickname,'"') or strpos($nickname,"´") or strpos($nickname,"´") or  strpos($nickname,"\00") or strpos($nickname,"\n") or strpos($nickname,"\r") or strpos($nickname,"\x1a")){
        invalid_info("Nombre de usuario");
    }


    if (strpos($email,"'") or  strpos($email,'"') or strpos($email,"´") or strpos($email,"´") or  strpos($email,"\00") or strpos($email,"\n") or strpos($email,"\r") or strpos($email,"\x1a")){
        invalid_info("Email");
    }

    if (strpos($bird_datetime,"'") or  strpos($sec_key,'"') or strpos($sec_key,"´") or strpos($sec_key,"´") or  strpos($sec_key,"\00") or strpos($sec_key,"\n") or strpos($sec_key,"\r") or strpos($sec_key,"\x1a")){
        invalid_info("Fecha de nacimiento");
    }

    if (!$_GET["eula"]){
        invalid_info(" Eula ");
    }



    if(preg_match('/^[0-9]{10}+$/', $phone)) {
        
    } else {
        invalid_info("telefono");
    }

    if(preg_match("/^([a-zA-Z' ]+)$/",$rl_name)){
       
    }else{
        invalid_info("nombre real");
    }

    



    
    

    

    $sec_key = md5($sec_key);

 //Debug
}catch(Exception $e){
    if ($debug_mode){
        echo $e;
        exit;
    }

    echo "Error al conectarse con el servidor";
    exit;
}

if ($debug_mode){
    $bypass_email_confirmation = true;
    $bypass_phone_confirmation  = true;
}else{
    $bypass_email_confirmation = false;
    $bypass_phone_confirmation  = false;
}


if (!$bypass_email_confirmation and !$bypass_phone_confirmation){
    exit;
}

$user_info = array("real_name" => $rl_name, "phone" => $phone , "bird_datetime" => $bird_datetime,"nickname"=> $nickname);
$user_info_json = json_encode($user_info);

$query = "insert into users (user_rol,password_hash,user_info_json,email,email_confirmed,phone_confirmed) VALUES (2,'$sec_key','$user_info_json','$email',0,0)";
echo $query;
//mysqli_query($connection,$query);
//$connection->query($query);


mysqli_query($connection,$query);

//ALTER TABLE tablename AUTO_INCREMENT = 1




header('Location: '.$path_redirect."/shop/search");



?>