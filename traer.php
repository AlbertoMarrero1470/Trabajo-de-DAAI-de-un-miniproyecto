<?php


if(!empty($_GET['id'])){


    $db = mysqli_connect("localhost","root","","video");

    if(($db->connect_error)){
        die("base de datos no conectada " . $db->connect_error);
    }

    $resultado = $db->query("SELECT images FROM image where id={$_GET['id']}");

    if($resultado->num_rows > 0 ){
        $imgData=$resultado->fetch_assoc();

        //render image
        header("content-type: image/jpg");
        echo $imgData['image'];
    }else{
        echo 'image not found...';
    }

}

?>