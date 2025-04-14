<?php
if ($_FILES["image"]["name"] !== "") {
    $file = "./images/";
    $newImageName = openssl_random_pseudo_bytes(15);
    $imageFileType = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $target_file = $file . bin2hex($newImageName) . "." . $imageFileType;
    $image = bin2hex($newImageName) . "." . $imageFileType;
    if ($_FILES["image"]["tmp_name"] === "") {
        array_push($errors, "You need add image !");
    } else {
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            array_push($errors, "File is not uploaded !");
        }
    }
}
