<?php
session_start();
require "../../init.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // login
    if (isset($_POST["login"])) {
        $email = $_POST["user-name"];
        $pass = $_POST["user-password"];
        if ($email == "info@motarafg.com" && $pass == "Farhad@hotak12") {
            $_SESSION["user_online"] = "loggedin";
            header("location:../../../admin/add.php");
        } else {
            header("location:../../../admin/index.php?login=wronge");
        }
    }

    // add car
    if (isset($_POST["addcar"])) {
        $name = $_POST["name"];
        $model = $_POST["model"];
        $color = $_POST["color"];
        $price = $_POST["price"];
        $cat = $_POST["cat"];
        $Details = $_POST["details"];
        $owner = $_POST["owner"];
        $phone = $_POST["phone"];

        $car = new Car();
        $carID = $car->addCar([$name, $model, $color, $cat, $Details, $price, 0,$owner,$phone]);
        if ($carID > 0) {
            if (isset($_FILES["file"])) {
                $total = count($_FILES["file"]["name"]);
                for ($i = 0; $i < $total; $i++) {
                    $filename = time().$_FILES["file"]["name"][$i];
                    if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],"../../admin/app-assets/images/cars/$filename"))
                    {
                        $car->addCarPic($carID,$filename);
                    }
                }
            }
        }
        header("location:../../../admin/add.php?added=true");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["logout"])) {
        session_destroy();
        header("location:../../../admin/index.php");
    }
}
