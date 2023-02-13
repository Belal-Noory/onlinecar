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
   <style>
      .card-img-top {
         height: 200px;
      }

      @media screen and (max-width: 575px) {
         .car {
            width: 140px;
         }

         .card-img-top {
            height: 100px;
         }
      }
   </style>
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
            <div class="col-lg-12">
               <!-- header inner -->
               <div class="container">
                  <div style="display: flex; flex-direction:row;justify-content: space-evenly;align-items: center;flex-wrap: wrap;">
                     <a href="#"><img src="admin/app-assets/images/logo/logo.png" style="width: 80px" alt="#"></a>
                     <a href="tel:+93780295949" class="text-white"><i class="fa fa-phone"></i> +93 780 295 949</a>
                     <a href="mailto:info@motarafg.com" class="text-white"><i class="fa fa-inbox"></i> info@motarafg.com</a>
                  </div>
               </div>
               <!-- end header inner -->
               <div class="container-fluid" style="display: flex;justify-content: center;align-items: center;flex-wrap: wrap;">
                  <h1 class="text-center text-white main_heading _left_side">خوش آمدید به بازار آنلاین موتر</h1>
               </div>
               <h2 class="text-center text-white">خود بخر خود بفروش</h2>
               <!-- end header -->
            </div>
         </section>

         <!-- end section -->
         <section id="cars">
            <div class="container">
               <div class="full">
                  <h1 class="text-center p-1" style="font-size: 2rem;">لیست همه موتر ها</h1>
               </div>
               <div class="row">
                  <?php
                  $cars_data = $cars->fetchAll(PDO::FETCH_OBJ);
                  $counter = 1;
                  foreach ($cars_data as $cr) {
                     echo "<div class='car col-lg-3 col-md-4 col-sm-6'>
                              <a href='carDetails.php?car=$cr->id'>
                                 <div class='card'>
                                    <img class='card-img-top img-fluid' src='admin/app-assets/images/cars/$cr->mainpic' alt='im'>
                                    <div class='card-body text-right text-center p-0' style='background-color: rgba(30, 144, 255, .7);'>
                                       <div class='row p-1'>
                                          <p class='card-text text-white col-md-6 col-sm-12'>$cr->model :مودل</p>
                                          <p class='card-text text-white col-md-6 col-sm-12'>$cr->palet:پلیت</p>
                                          <p class='card-text text-white col-12 '>$cr->price:قیمت</p>
                                       </div>
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
         <!-- <div class="section layout_padding" id="about">
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
         </div> -->
         <!-- end section -->

         <!-- section -->
         <!-- <section id="why_choose_us" class="dark_bg_blue layout_padding cross_layout padding_top_0">
            <div class="container" id="model">

            </div>
         </section> -->
         <!-- end section -->

         <!-- footer -->
         <footer style="margin-top: 10px;">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="full">
                        <h3>MOTAR AFG</h3>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="full">
                        <ul class="social_links">
                           <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="full">
                        <h4 class="widget_heading">ارتباط با ما</h4>
                        <div class="full cont_footer">
                           <p>
                              <strong>کابل افغانستان</strong>
                              <br>
                              0780295949<br </p>
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
   <!-- three.min.js r87 -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/92/three.min.js"></script>
   <!-- GLTFLoader.js -->
   <script src="https://cdn.jsdelivr.net/gh/mrdoob/three.js@r92/examples/js/loaders/GLTFLoader.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/three-orbitcontrols@2.110.3/OrbitControls.min.js"></script>
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
</body>

</html>