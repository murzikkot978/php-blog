<?php
if ($_FILES["image"]["name"] !== "") {
    $file = "./images/";
    $newImageName = openssl_random_pseudo_bytes(15);
    $imageFileType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $target_file = $file . bin2hex($newImageName) . "." . $imageFileType;
    $uploadOk = 1;

    if ($_FILES["image"]["name"] === "") {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            add_flash_message('File is an image - ' . $check["mime"] . '.');
        } else {
            add_flash_message("File is not an image.");
            $uploadOk = 0;
        }
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        add_flash_message("File is too large.");
        $uploadOk = 0;
    }

    if (
        $imageFileType !== "jpg" && $imageFileType !== "png"
    ) {
        add_flash_message("Sorry, only JPG and PNG files are allowed.");
        $uploadOk = 0;
    }

    if ($uploadOk === 0) {
        add_flash_message("You need add image !");
    } else {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            add_flash_message("Sorry, there was an error uploading your file.");
        } else {
            $image = bin2hex($newImageName) . "." . $imageFileType;
        }
    }
}
