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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <div class="container pt-4 mb-3">
        <div class="row">
            <?php
            foreach ($pic as $pics) {
                echo "<a data-toggle='lightbox' data-gallery='example-gallery' class='col-sm-4 col-xs-4' href='admin/app-assets/images/cars/$pics->img'>
                          <img src='admin/app-assets/images/cars/$pics->img' alt='Bridge' class='img-fluid' />
                    </a>";
            }
            ?>
        </div>
    </div>

    <div class="container">
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
                    <p class="h5 m-0"><?php echo $car_details->price ?>$</p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">ماشین</p>
                    <p class="h5 m-0"><?php echo $car_details->machin ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">اسناد</p>
                    <p class="h5 m-0"><?php echo $car_details->document ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">گیربکس</p>
                    <p class="h5 m-0"><?php echo $car_details->girbag ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">صالون</p>
                    <p class="h5 m-0"><?php echo $car_details->salon ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">دروازه</p>
                    <p class="h5 m-0"><?php echo $car_details->door ?></p>
                </div>
                <div class="col-md-4 col-6 ps-30 my-4">
                    <p class="text-muted">پلیت</p>
                    <p class="h5 m-0"><?php echo $car_details->palet ?></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
</body>


</html>