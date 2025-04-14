<?php
if ($_FILES["image"]["name"] !== "") {
    $file = "./images/";
    $newImageName = openssl_random_pseudo_bytes(15);
    $imageFileType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $target_file = $file . bin2hex($newImageName) . "." . $imageFileType;
    $image = bin2hex($newImageName) . "." . $imageFileType;
    $uploadOk = 1;

    if($_FILES["image"]["name"] === "") {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            array_push($errors, "File is an image - " . $check["mime"] . ".");
            $uploadOk = 1;
        } else {
            array_push($errors,"File is not an image.");
            $uploadOk = 0;
        }
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        array_push($errors, "Your file is too large.");
        $uploadOk = 0;
    }

    if (
        $imageFileType != "jpg" && $imageFileType != "png"
    ) {
        array_push($errors, "Only JPG and PNG files are allowed");
        $uploadOk = 0;
    }

    if ($uploadOk === 0) {
        array_push($errors, "You need add image !");
    } else {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            array_push($errors, "File is not uploaded !");
        }
    }
}
