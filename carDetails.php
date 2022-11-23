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
    <div class="container mt-2">
        <div class="row m-0">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $counter = 0;
                                foreach ($pic as $p) {
                                    $class = "";
                                    if ($counter == 0) {
                                        $class = "active";
                                    } ?>
                                    <div class="carousel-item <?php echo $class ?>">
                                        <img class="d-block w-100" src="admin/app-assets/images/cars/<?php echo $p->img ?>" alt="img" class="img-fluid"/>
                                    </div>
                                <?php $counter++;
                                } ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
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
        </div>
    </div>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.carousel').carousel();
        });
    </script>
</body>


</html>