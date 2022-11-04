<?php

$path_connect = "./../mysql/connect.php";
include("./../oauth/cookieValidation.php");


if($validated and $user_id){
    $result = mysqli_query($connection,"SELECT user_info_json from users where user_id=$user_id;");
    $result_fetch = mysqli_fetch_all($result);
    
    if($result_fetch){
        $info =$result_fetch[0][0];
        $info_json = json_decode($info,true);
        $nickname = $info_json["nickname"];
        
    }
}
function no_session(){
    header('Location: '."./../login");
}

if(!isset($user_id)){

    echo "no set";
    no_session();
    exit;
}
if($user_id == ""){

    echo "no set";
    no_session();
    exit;
}
$pdrc_id = $_GET['pd_id'];
try{

$pdrc_price = null;
$pdrc_client = $user_id;
$pdrc_amount = 1;
$info_id = 0;

$seller_id = null;
$query = "SELECT * FROM `products` WHERE `product_id` = $pdrc_id";
$result = mysqli_query($connection,$query);
while ($row = mysqli_fetch_array($result)){
    $pdrc_price = $row['product_price'];
    $seller_id = $row['seller_id'];
}
$query_add = "insert into orders(`client_id`,`product_id`,`pdrc_amount`,`info_id`,`total_price`,`seller_id`) values($pdrc_client,$pdrc_id,'$pdrc_amount',$info_id,$pdrc_price,$seller_id)";
echo $query_add . "  :: ";
$result_add_order = mysqli_query($connection,$query_add);

}catch(Exception $e){
    

}

header('Location: '."./search?code=1");

