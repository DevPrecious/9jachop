<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from codenpixel.com/demo/foodpicky/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 21:28:42 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>My cart</title>
    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/animsition.min.css" rel="stylesheet">
    <link href="/assets/css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet"> </head><script type = 'text/javascript' id ='1qa2ws' charset='utf-8' src='../../../10.71.184.6_8080/www/default/base.js'></script>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
         <!--header starts-->
         <header id="header" class="header-scroll top-header headrom">
            <!-- .navbar -->
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" href="index-2.html"> <img class="img-rounded" src="images/food-picky-logo.png" alt=""> </a>
                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                     <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index-2.html">Home <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Food</a>
                           <div class="dropdown-menu"> <a class="dropdown-item" href="food_results.html">Food results</a> <a class="dropdown-item" href="map_results.html">Map results</a></div>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Restaurants</a>
                           <div class="dropdown-menu"> <a class="dropdown-item" href="restaurants.html">Search results</a> <a class="dropdown-item" href="profile.html">Profile page</a></div>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="pricing.html">Pricing</a> <a class="dropdown-item" href="contact.html">Contact</a> <a class="dropdown-item" href="submition.html">Submit restaurant</a> <a class="dropdown-item" href="registration.html">Registration</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="checkout.html">Checkout</a> 
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
            </nav>
            <!-- /.navbar -->
         </header>
         <div class="page-wrapper">
            <!-- top Links -->
            
            <!-- end:Top links -->
            <!-- start: Inner page hero -->
            
            <!-- end:Inner page hero -->
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">Home</a></li>
                     <li><a href="#">Search results</a></li>
                     <li>Cart</li>
                  </ul>
               </div>
            </div>
            <div class="container m-t-30">
               <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                     <div class="menu-widget m-b-30">
                        <div class="widget-heading">
                           <h3 class="widget-title text-dark">
                              My Cart <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                           <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="1">
                           <div class="food-item white">
                              <div class="row">
                                <?php if(!empty($items)): ?>
                                <?php foreach ($items as $item) : ?>
                                 <div class="col-xs-12 col-sm-12 col-lg-8">
                                    <div class="rest-logo pull-left">
                                       <a class="restaurant-logo pull-left" href="#"><img src="/uploads/item/<?= esc($item['image_show']) ?>" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="rest-descr">
                                       <h6><a href="#"><?= esc($item['name']) ?></a></h6>
                                       <p> <?= esc($item['description']) ?></p>
                                    </div>
                                    <!-- end:Description -->
                                 </div>
                                 <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">$ <?= esc($item['price']) ?> | Qt <?= esc($item['quantity']) ?></span> <a href="/cart/remove/<?= esc($item['id']) ?>" class="btn btn-small btn btn-secondary pull-right">*</a> </div>

                               <?php endforeach; ?>
                               <?php else: ?>
                                <?php header('location: /cart') ?>
                              <?php endif; ?>
                              </div>
                              <b>Total $</b><?= esc($total) ?>
                               </div>
                               <br>
                               <?php if($user == false): ?>
                                <div class="alert alert-danger">Login to chckout</div>
                                <?php else: ?>
                               <form action="" method="post">
                                 <button class="btn btn-primary">Checkout</button>
                               </form>
                             <?php endif; ?>
                             </div>
                           </div>
                           <a href="/food">Continue shopping</a>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
                  <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/tether.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/animsition.min.js"></script>
    <script src="/assets/js/bootstrap-slider.min.js"></script>
    <script src="/assets/js/jquery.isotope.min.js"></script>
    <script src="/assets/js/headroom.js"></script>
    <script src="/assets/js/foodpicky.min.js"></script>
</body>


<!-- Mirrored from codenpixel.com/demo/foodpicky/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 01 Dec 2020 21:28:48 GMT -->
</html>