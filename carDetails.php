<?php
require("./init.php");
$car = new Car();
$cars = $car->getAllCars();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Car Detalis</title>
    <meta name="keywords" content="motarafg">
    <meta name="description" content="This is begist website for dealing cars in afghanistan.">
    <meta name="author" content="Belal Noory">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css">
    <style>
        .gallery-container {
            background-color: #fff;
            color: #35373a;
            min-height: 100vh;
            padding: 30px 50px;
        }

        .gallery-container h1 {
            text-align: center;
            margin-top: 50px;
            font-family: 'Droid Sans', sans-serif;
            font-weight: bold;
        }

        .gallery-container p.page-description {
            text-align: center;
            margin: 25px auto;
            font-size: 18px;
            color: #999;
        }

        .tz-gallery {
            padding: 40px;
        }

        /* Override bootstrap column paddings */
        .tz-gallery .row>div {
            padding: 2px;
        }

        .tz-gallery .lightbox img {
            width: 100%;
            border-radius: 0;
            position: relative;
        }

        .tz-gallery .lightbox:before {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -13px;
            margin-left: -13px;
            opacity: 0;
            color: #fff;
            font-size: 26px;
            font-family: 'Glyphicons Halflings';
            content: '\e003';
            pointer-events: none;
            z-index: 9000;
            transition: 0.4s;
        }


        .tz-gallery .lightbox:after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            background-color: rgba(46, 132, 206, 0.7);
            content: '';
            transition: 0.4s;
        }

        .tz-gallery .lightbox:hover:after,
        .tz-gallery .lightbox:hover:before {
            opacity: 1;
        }

        .baguetteBox-button {
            background-color: transparent !important;
        }

        @media(max-width: 768px) {
            body {
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <?php
    $car_id = $_GET["car"];
    $car_pic = $car->getCarPics($car_id);
    $pic = $car_pic->fetchAll(PDO::FETCH_OBJ);

    // get car
    $car_data = $car->getCar($car_id);
    $car_details = $car_data->fetch(PDO::FETCH_OBJ);
    ?>

    <div class="gallery-container mb-0">
        <div class="tz-gallery mb-0">
            <div class="row">
                <?php 
                    foreach ($pic as $pics) {
                        echo " <div class='col-sm-12 col-md-4'>
                                <a class='lightbox' href='admin/app-assets/images/cars/$pics->img'>
                                    <img src='admin/app-assets/images/cars/$pics->img' alt='Bridge'>
                                </a>
                            </div>";
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="container mt-0">
        <div class="row">
            <div class="col-lg-12 row bg-light text-right" dir="rtl">
                <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                    <p class="text-muted">نام موتر</p>
                    <p class="h5"><?php echo $car_details->name ?></p>
                </div>
                <div class="col-md-4 col-6  ps-30 my-4">
                    <p class="text-muted">مودل موتر</p>
                    <p class="h5 m-0"><?php echo $car_details->model ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">رنگ موتر</p>
                    <p class="h5 m-0"><?php echo $car_details->color ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">قیمت موتر</p>
                    <p class="h5 m-0"><?php echo $car_details->price ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">تفصیلات</p>
                    <p class="h5 m-0"><?php echo $car_details->details ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        $(document).ready(function() {
            baguetteBox.run('.tz-gallery');
        });
    </script>
</body>


</html>