<?php



$path_connect = "./../../mysql/connect.php";
include("./../../oauth/cookieValidation.php");
if (!$validated or !isset($user_id)) {
    http_response_code(401);
    include("./../../error401.html");
    exit;
    //header("Location: ./trabajofinal/error404.html");
} else {
    $query = "select perm_rol.upload_products from users INNER JOIN perm_rol on perm_rol.id_rol=users.user_rol where user_id='$user_id';";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        http_response_code(401);
        include("./../../error401.html");
        exit;
    }
    $result_fetch = mysqli_fetch_all($result);
    if (!isset($result_fetch[0][0])) {
        http_response_code(401);
        include("./../../error401.html");
        exit;
    }
    if (!$result_fetch[0][0] == 1) {
        http_response_code(401);
        include("./../../error401.html");
        exit;
    }
}
if ($validated and $user_id) {
    $result = mysqli_query($connection, "SELECT user_info_json from users where user_id=$user_id;");
    $result_fetch = mysqli_fetch_all($result);
    if ($result_fetch) {
        $info = $result_fetch[0][0];
        $info_json = json_decode($info, true);
        $nickname = $info_json["nickname"];
    }
}
?>
<?php
function invalid_form($msg){
    echo "<br>";
    echo "<br>";
    echo $msg;
    exit;
}






function generate_safe_name($file_name,$extension){
    $rand_factor = random_int(10,100000);
    $safe_name = md5($file_name . $rand_factor . time()."time:colombia".$extension);
    if($extension == "NN"){
        return $safe_name;
    }
    return $safe_name.".".$extension;
}



if(!isset($_POST["submit"])){
    invalid_form("Algo ha salido mal..");
}
if(!isset($_FILES)){
    invalid_form("Algo ha salido mal.. 0x1");
}

try{

    $city_list=array("Medellin","Itagui","Estrella","Bello","barrancabermeja","Sabaneta");
    $prdc_name = $_POST['prdc_name'];
    $pdrc_city = trim($_POST['pdrc_city']);
    $prdc_invent = trim($_POST['prdc_invent']);
    $prdc_description = mysqli_escape_string($connection,$_POST['prdc_description']);
    $pdrc_price = trim($_POST['pdrc_price']);
    $date = date('d-M-Y');
    
    echo $prdc_name . "<br>";
    echo $pdrc_city . "<br>";
    echo $prdc_invent . "<br>";
    echo $prdc_description . "<br>";
    echo $pdrc_price . "<br>";


    
    echo "<br>";
    print_r($_FILES);
    echo "<br>";
    
}catch(Exception $e){
    invalid_form("Algo ha salido mal.. 0x1");
}

if(!preg_match("/^[a-zA-z0-9\s]{3,70}$/",$prdc_name)){
    invalid_form("Algo ha salido mal 0x2");
}

if(!preg_match("/^[0-9]{3,17}$/",$pdrc_price)){
    invalid_form("Algo ha salido mal 0x4");
}

if(!preg_match("/^[0-9]{1,3}$/",$prdc_invent)){
    invalid_form("Algo ha salido mal 0x5");
}
if(!preg_match("/^.{3,1001}$/",$prdc_description)){
    invalid_form("Algo ha salido mal 0x6");
}
if(!in_array($pdrc_city,$city_list)){
    invalid_form("Algo ha salido mal 0x7");
}

if(count($_FILES) > 5 or count($_FILES) <=  1){
    invalid_form("Algo ha salido mal 0x8");
}
$img_list_ids = "";
foreach (array_reverse($_FILES) as $key => $value) {
    try{

    
    if(isset($value["type"])){
        if($value["type"] != "image/jpeg"){
            invalid_form("Algo ha salido mal 0x9 -- El tipo de archivo no es valido");
            break;
        }
    }
    if($value["size"] >= 5000000){
        invalid_form("Algo ha salido mal 0x10 -- El archivo es demasiado grande");
        break;
    }
    

   
    $safe_name_file = generate_safe_name($key,"jpg");
    $filename = __DIR__."..\\..\\..\\img_pdrc\\".$safe_name_file;
    move_uploaded_file($_FILES[$key]["tmp_name"],__DIR__."..\\..\\..\\img_pdrc\\".$safe_name_file);
    $query = "INSERT into images(img_path,upload_user_id,active) VALUES('$safe_name_file',$user_id,1)";
    $result_file_inclusion = mysqli_query($connection,$query);
    if(!$result_file_inclusion){
        invalid_form("Algo ha salido mal 0x11");
    }
    $query = "SELECT image_id FROM images WHERE img_path = '$safe_name_file'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) != 1){
        invalid_form("Algo ha salido mal 0x12");
    }
    $fetch_result = mysqli_fetch_all($result);
    if(!isset($fetch_result[0][0])){
        invalid_form("Algo ha salido mal 0x13");
    }

    $img_path_id = (string) $fetch_result[0][0];

    $img_list_ids = $img_list_ids . $img_path_id;
    $img_list_ids = $img_list_ids.",";
    /////////////////////////////////////////////////

    


    }catch(Exception $e){
        invalid_form("Algo ha salido mal.. Ax1");
    }
    
}
try{
    $query = "insert INTO products(seller_id,pictures_list_id,description,product_name,product_price,pdrc_inventory,pdrc_city,pdrc_approve,pdrc_active,pdrc_creation_date) VALUES($user_id,'$img_list_ids','$prdc_description','$prdc_name','$pdrc_price','$prdc_invent','$pdrc_city',1,1,'$date')";

    $result = mysqli_query($connection,$query);
    if(!$result){
        invalid_form("Algo ha salido mal.. B0x1");    
    }
}catch(Exception $e){
    invalid_form("Algo ha salido mal.. Bx1");
}


//move_uploaded_file($_FILES["file0"]["tmp_name"],__DIR__."..\\..\\..\\img_pdrc\\".generate_safe_name("file0","jpg"));

header('Location: '."./../sellerproduct.php");
?>