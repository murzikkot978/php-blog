<?php
if ($_FILES["photo"]["name"] !== "") {
    $file = "./userPhoto/";
    $newPhotoName = openssl_random_pseudo_bytes(15);
    $photoFileType = pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $target_file = $file . bin2hex($newPhotoName) . "." . $photoFileType;
    $uploadOk = 1;

    if ($_FILES["photo"]["name"] === "") {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            add_flash_message('File is an photo - ' . $check["mime"] . '.');
        } else {
            add_flash_message("File is not an photo.");
            $uploadOk = 0;
        }
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        add_flash_message("File is too large.");
        $uploadOk = 0;
    }

    if (
        $photoFileType !== "jpg" && $photoFileType !== "png"
    ) {
        add_flash_message("Sorry, only JPG and PNG files are allowed.");
        $uploadOk = 0;
    }

    if ($uploadOk === 0) {
        add_flash_message("You need add photo !");
    } else {
        if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            add_flash_message("Sorry, there was an error uploading your file.");
        } else {
            $photo = bin2hex($newPhotoName) . "." . $photoFileType;
        }
    }
}
