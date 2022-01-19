<?php 

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgcontent = addslashes(file_get_contents($image));

        /*
        * Insert image data into database

        */

        //DB details
        $db = mysqli_connect("localhost","root","","video");

        if(($db->connect_error)){
            die("base de datos no conectada " . $db->connect_error);
        }

        $dateTime = date("Y-m-d H:i:s");

        //Insertar image contenet into database
        $insert = $db->query("INSERT INTO images (image, created) VALUES ('$imgcontent','$dateTime')");
        if($insert){
            echo "El archivo se ha guardado correctamente";
        }else{
            echo "Subida de archivo fallido";
        }
    }else{
        echo "por favor seleccione una imagen para subir";
    }
}


?>