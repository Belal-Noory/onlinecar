<?php
require("./init.php");
$car = new Car();
$cars = $car->getAllCars();
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Motar Afg</title>
   <meta name="keywords" content="motarafg">
   <meta name="description" content="This is begist website for dealing cars in afghanistan.">
   <meta name="author" content="Belal Noory">
   <!-- bootstrap css -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" href="css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- awesome fontfamily -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Tweaks for older IEs-->
   <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
   <!-- loader  -->
   <div class="loader_bg">
      <div class="loader"><img src="images/loading.gif" alt="" /></div>
   </div>
   <!-- end loader -->

   <div class="wrapper">
      <div class="sidebar">
         <!-- Sidebar  -->
         <nav id="sidebar">
            <div id="dismiss">
               <i class="fa fa-arrow-left"></i>
            </div>
            <ul class="list-unstyled components">
               <li class="active">
                  <a href="#home">صفحه اصلی</a>
               </li>
               <li>
                  <a href="#cars">لیست موتر ها</a>
               </li>
               <li>
                  <a href="#about">راجع به ما</a>
               </li>
               <li>
                  <a href="#why_choose_us">چرا ما؟</a>
               </li>
            </ul>
         </nav>
      </div>
      <div id="content">
         <!-- section -->
         <section id="home" class="top_section">
            <div class="row">
               <div class="col-lg-12">
                  <!-- header -->
                  <header>
                     <!-- header inner -->
                     <div class="container">
                        <div class="row">
                           <div class="col-lg-3 logo_section">
                              <div class="full">
                                 <div class="center-desk">
                                    <div class="logo">
                                       <a href="#"><img src="admin/app-assets/images/logo/logo.png" style="width: 80px" alt="#"></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-9">
                              <div class="right_header_info">
                                 <ul>
                                    <li>
                                       <img style="margin-right: 15px;" src="images/phone_icon.png" alt="#" />
                                       <a href="tel:+93780295949">+93 780 295 949</a>
                                    </li>
                                    <li>
                                       <img style="margin-right: 15px;" src="images/mail_icon.png" alt="#" />
                                       <a href="mailto:info@motarafg.com">info@motarafg.com</a>
                                    </li>
                                    <li>
                                       <button type="button" id="sidebarCollapse">
                                          <img src="images/menu_icon.png" alt="#" />
                                       </button>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end header inner -->
                  </header>
                  <section>
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-4">
                              <div class="full slider_cont_section" style="margin-bottom: 10px;">
                                 <h4 class="text-center">خوش آمدید به</h4>
                                 <h3 class="text-center">موتر</h3>
                                 <p class="text-center">جایکه شما میتوانید موتر دلخواهی تانرا پیدا کنید.</p>
                                 <div class="d-flex align-items-center justify-content-center">
                                    <a href="#cars" class="btn btn-warning">برم موتر پیدا کون</a>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-8">
                              <div id="slider_main" class="carousel slide" data-ride="carousel">
                                 <!-- The slideshow -->
                                 <div class="carousel-inner">
                                    <div class="carousel-item active">
                                       <img src="images/slider_1.png" alt="#" />
                                    </div>
                                    <div class="carousel-item">
                                       <img src="images/slider_2.png" alt="#" />
                                    </div>
                                 </div>
                                 <div class="full center">
                                    <a class="carousel-control-prev" href="#slider_main" data-slide="prev">
                                       <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    </a>
                                    <a class="carousel-control-next" href="#slider_main" data-slide="next">
                                       <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <!-- end header -->
               </div>
            </div>
         </section>

         <!-- end section -->
         <section id="cars">
            <div class="container pt-4">
               <div class="full">
                  <h3 class="main_heading _left_side margin_top_30 text-center">لیست همه موتر ها</h3>
               </div>
               <div class="row">
                  <?php
                  $cars_data = $cars->fetchAll(PDO::FETCH_OBJ);
                  $counter = 1;
                  foreach ($cars_data as $cr) {
                     $car_pic = $car->getCarPics($cr->id);
                     $pic = $car_pic->fetch(PDO::FETCH_OBJ);
                     echo "<div class='col-lg-4 col-md-6'>
                              <a href='carDetails.php?car=$cr->id'>
                                 <div class='card bg-dark p-0'>
                                    <img class='card-img' src='admin/app-assets/images/cars/$pic->img' alt='Card image' class='img-fluid'>
                                    <div class='card-img-overlay text-right' style='padding:0;margin: 0px;width: 100%;height: 100%;'>
                                       <h1 class='card-title' style='margin: 0px;'><span class='badge badge-primary'>$cr->price</span></h1>
                                       <h1 class='card-title' style='margin: 0px;'><span class='badge badge-primary'>$cr->color</span></h1>
                                       <h1 class='card-title' style='margin: 0px;'><span class='badge badge-primary'>$cr->name</span></h1>
                                    </div>
                                 </div>
                              </a>
                           </div>";
                  }
                  ?>
               </div>
            </div>
         </section>

         <!-- section -->
         <div class="section layout_padding" id="about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="full text_align_right r-img">
                        <img class="img-responsive" src="images/about_us_2.png" alt="#" />
                     </div>
                  </div>
                  <div class="col-lg-4 margin_top_30">
                     <div class="full margin_top_30">
                        <h3 class="main_heading _left_side margin_top_30">راجع به ما</h3>
                        <p class="large">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod..</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end section -->

         <!-- section -->
         <section id="why_choose_us" class="dark_bg_blue layout_padding cross_layout padding_top_0">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full center">
                        <h2 class="heading_main orange_heading">چرا ما؟</h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-4">
                     <div class="full">
                        <div class="choose_blog text_align_center">
                           <img src="images/c1_icon.png" />
                           <h4>FINANCING MADE EASY</h4>
                           <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                              interested.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="full">
                        <div class="choose_blog text_align_center">
                           <img src="images/c2_icon.png" />
                           <h4>WIDE RANGE OF BRANDS</h4>
                           <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                              interested.</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="full">
                        <div class="choose_blog text_align_center">
                           <img src="images/c3_icon.png" />
                           <h4>TRUSTED BY THOUSANDS</h4>
                           <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                              interested.</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end section -->

         <!-- footer -->
         <footer>
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="full">
                        <h3>AVALON MOTORS</h3>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="full">
                        <ul class="social_links">
                           <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="full">
                        <h4 class="widget_heading">Usefull Links</h4>
                     </div>
                     <div class="full f_menu">
                        <ul>
                           <li><a href="#home">صفحه اصلی</a></li>
                           <li><a href="#cars">لیست موتر ها</a></li>
                           <li><a href="#about">راجع به ما</a></li>
                           <li><a href="#why_choose_us">چرا ما؟</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="full">
                        <h4 class="widget_heading">ارتباط با ما</h4>
                        <div class="full cont_footer">
                           <p>
                              <strong>AVALON Car : Adderess</strong>
                              <br><br>
                              Newyork 10012, USA<br>
                              Phone: +987 654 3210<br>
                              demo@gmail.com
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </footer>
         <!-- end footer -->

         <!-- copyright -->
         <div class="cpy_right">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <p>© 2022 All Rights Reserved. Developed by <a href="https://resume-4756a.web.app/">Belal
                              Noory</a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- right copyright -->
      </div>
   </div>

   <div class="overlay"></div>

   <!-- Javascript files-->
   <script src="js/jquery.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <!-- Scrollbar Js Files -->
   <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script>
   <script type="text/javascript">
      $(document).ready(function() {
         $("#sidebar").mCustomScrollbar({
            theme: "minimal"
         });

         $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
         });

         $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
         });
      });
   </script>

   <script>
      // This example adds a marker to indicate the position of Bondi Beach in Sydney,
      // Australia.
      function initMap() {
         var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: {
               lat: 40.645037,
               lng: -73.880224
            },
         });

         var image = 'images/location_point.png';
         var beachMarker = new google.maps.Marker({
            position: {
               lat: 40.645037,
               lng: -73.880224
            },
            map: map,
            icon: image
         });
      }
   </script>
   <!-- google map js -->
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
   <!-- end google map js -->
</body>

</html>