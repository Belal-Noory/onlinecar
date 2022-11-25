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

        $machin = $_POST["machin"];
        $document = $_POST["docs"];
        $girbag = $_POST["girbag"];
        $salon = $_POST["salon"];
        $door = $_POST["door"];
        $palet = $_POST["palet"];
        $mainpic = "";
        $car = new Car();

        if (isset($_FILES["mainpic"])) {
            $mainpic = time() . $_FILES["mainpic"]["name"];
            if (move_uploaded_file($_FILES["mainpic"]["tmp_name"], "../../admin/app-assets/images/cars/$mainpic")) {
                $carID = $car->addCar([$name, $model, $color, $cat, $Details, $price, 0, $owner, $phone,$machin,$document,$girbag,$salon,$door,$mainpic,$palet]);
                $car->addCarPic($carID, $mainpic);
            }
        }

        if ($carID > 0) {
            if (isset($_FILES["file"])) {
                $total = count($_FILES["file"]["name"]);
                for ($i = 0; $i < $total; $i++) {
                    $filename = time() . $_FILES["file"]["name"][$i];
                    if (move_uploaded_file($_FILES["file"]["tmp_name"][$i], "../../admin/app-assets/images/cars/$filename")) {
                        $car->addCarPic($carID, $filename);
                    }
                }
            }
        }

        header("location:../../../admin/add.php?added=true");
    }

    // delete card
    if(isset($_POST["delete"]))
    {
        $car = new Car();
        $ID = $_POST["ID"];
        // get car
        $carDetails = $car->getCar($ID);
        $car_data = $carDetails->fetch(PDO::FETCH_OBJ);
        unlink("../../admin/app-assets/images/cars/$car_data->mainpic");
        $car->deleteCar($ID);

        // delete car images
        $car_img_data = $car->getCarPics($ID);
        $car_img = $car_img_data->fetchAll(PDO::FETCH_OBJ);
        foreach ($car_img as $img) {
            unlink("../../admin/app-assets/images/cars/$img->img");
        }
        $car->deleteCarPic($ID);
        echo $ID;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["logout"])) {
        session_destroy();
        header("location:../../../admin/index.php");
    }
}
