<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Castle | Property Detail</title>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/reality-icon.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/owl.transitions.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/style.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/range-Slider.min.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>public/front/css/search.css">
<link rel="icon" href="<?=base_url()?>public/front/images//icon.png">
</head>
<body>


<!--Loader-->
<div class="loader">
  <div class="span">
    <div class="location_indicator"></div>
  </div>
</div>
 <!--Loader--> 
 
 

<!--Header-->
<header class="layout_default">
  <div class="topbar grey">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <p>We are Best in Town With 40 years of Experience.</p>
        </div>
        <div class="col-md-7 text-right">
          <ul class="breadcrumb_top text-right">
      <?php if(($this->session->userdata('username'))!=null) {?>
        <li><a href="<?=site_url('home/logout')?>"><i class="icon-icons179"></i>Logout</a></li>
        <?php } else { ?><li><i class="icon-icons179"></i><a href="<?=site_url('login')?>">Login</a> /<a href="<?=site_url('login/register')?>"> Register</a></li> <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="header-upper">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12">
          <div class="logo"><a href="<?=site_url('home')?>"><img alt="" src="<?=base_url()?>public/front/images/logo.png"></a></div>
        </div>
        <!--Info Box-->
        <div class="col-md-9 col-sm-12 right">
          <div class="info-box first">
            <div class="icons"><i class="icon-telephone114"></i></div>
            <ul>
              <li><strong>Phone Number</strong></li>
              <li>+234 706 105 7869</li>
            </ul>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- Start Header Navigation -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
            <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand sticky_logo" href="index3.html"><img src="<?=base_url()?>public/front/images/logo-white.png" class="logo" alt=""></a>
          </div> <!-- End Header Navigation -->
          <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeIn" data-out="fadeOut">
              <li class="dropdown active">
                <a href="<?=site_url('home')?>">Home </a>                
              </li>
              <li class="dropdown active">
                <a href="<?=site_url('home/apartments')?>">Lists </a>                
              </li>
              
              <li><a href="#">Contact Us</a></li>
             
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
</header>
<!--Header Ends-->



<!-- Page Banner Start-->
<section class="page-banner padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-uppercase">Property Details</h1>
        <p>Serving students since 1999.</p>
        <ol class="breadcrumb text-center">
          <li><a href="#.">Home</a></li>
          <li><a href="#.">Student Accommodation</a></li>
          <li class="active"><?=$list->info?></li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- Page Banner End -->



<section id="deal" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="uppercase">Best Deal Properties</h2>
        <p class="heading_space">We have Properties in these Areas View a list of Featured Properties.</p>
      </div>
    </div>
    <div class="row">
      <?php $i=0;foreach ($list as $key ) { $i++; if($i<=6){

        $img = $this->image_m->get(array('acc_id'=>$key->acc_id),true);
        ?>
        
      <div class="col-sm-6">
      <div class="listing_full">
            <div class="image">
              <img alt="image" src="<?=base_url()?>upload/apartments/<?=$img->path?>">
              <span class="tag_t">For Sale</span>
            </div>
            <div class="listing_full_bg">
              <div class="listing_inner_full">
                <span><a href="#."><i class="icon-like"></i></a></span>
                <a href="<?=site_url('home/apartment/'.$key->acc_id);?>">
                  <h3><?=$key->info?></h3>
                  <p><?=$key->hostel_address?></p>
                </a>
                <div class="favroute clearfix">
                  <div class="property_meta"></span><span class="border-l">$<?=$key->amount?> / pm</span></div>
                </div>
              </div>
            </div>
          </div>
      </div>
    <?php } } ?>
  
     
    </div>

  </div>
</section>
<!-- Property Detail End -->



<!--Footer-->
<!--Footer-->
<footer class="footer_third">
  <div class="container contacts">
    <div class="row">
      <div class="col-sm-4 text-center">
        <div class="info-box first">
          <div class="icons"><i class="icon-telephone114"></i></div>
          <ul class="text-center">
            <li><strong>Phone Number</strong></li>
            <li>+234 706 105 7869</li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="info-box">
          <div class="icons"><i class="icon-icons74"></i></div>
          <ul class="text-center">
            <li><strong>Derby,</strong></li>
            <li>UK</li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4 text-center">
        <div class="info-box">
          <div class="icons"><i class="icon-icons142"></i></div>
          <ul class="text-center">
            <li><strong>Email Address</strong></li>
            <li><a href="#.">seyi.oke@derby.au.uk</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container padding_top">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="footer_panel bottom30">
          <a href="#." class="logo bottom30"><img src="<?=base_url()?>public/front/images/logo-white.png" alt="logo"></a>
          <p class="bottom15">We are the best student accommodation provider
          </p>
        </div>
      </div>
    
    </div>
    <!--CopyRight-->
    <div class="copyright_simple">
      <div class="row">
        <div class="col-md-6 col-sm-5 top20 bottom20">
          <p>Copyright &copy; <?=date('Y')?> <span>Castle</span>. All rights reserved.</p>
        </div>
        <div class="col-md-6 col-sm-7 text-right top15 bottom10">
          <ul class="social_share">
            <li><a href="#." class="facebook"><i class="icon-facebook-1"></i></a></li>
            <li><a href="#." class="twitter"><i class="icon-twitter-1"></i></a></li>
            <li><a href="#." class="google"><i class="icon-google4"></i></a></li>
            <li><a href="#." class="linkden"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#." class="vimo"><i class="icon-vimeo3"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--CopyRight-->

<script src="<?=base_url()?>public/front/js/jquery-2.1.4.js"></script>
<script src="<?=base_url()?>public/front/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>public/front/js/bootsnav.js"></script>
<script src="<?=base_url()?>public/front/js/jquery.parallax-1.1.3.js"></script>
<script src="<?=base_url()?>public/front/js/jquery.appear.js"></script>
<script src="<?=base_url()?>public/front/js/jquery-countTo.js"></script>
<script src="<?=base_url()?>public/front/js/masonry.pkgd.min.js"></script>
<script src="<?=base_url()?>public/front/js/range-Slider.min.js"></script>
<script src="<?=base_url()?>public/front/js/owl.carousel.min.js"></script> 
<script src="<?=base_url()?>public/front/js/jquery.cubeportfolio.min.js"></script>
<script src="<?=base_url()?>public/front/js/selectbox-0.2.min.js"></script>
<script src="<?=base_url()?>public/front/js/zelect.js"></script>
<script src="<?=base_url()?>public/front/js/jquery.themepunch.tools.min.js"></script>
<script src="<?=base_url()?>public/front/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?=base_url()?>public/front/js/revolution.extension.layeranimation.min.js"></script>
<script src="<?=base_url()?>public/front/js/revolution.extension.navigation.min.js"></script>
<script src="<?=base_url()?>public/front/js/revolution.extension.parallax.min.js"></script>
<script src="<?=base_url()?>public/front/js/revolution.extension.slideanims.min.js"></script>
<script src="<?=base_url()?>public/front/js/revolution.extension.video.min.js"></script>
<script src="<?=base_url()?>public/front/js/neary-by-place.js"></script> 
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U&libraries=places"></script> 
<script src="<?=base_url()?>public/front/js/google-map.js"></script> 
<script src="<?=base_url()?>public/front/js/jquery.fancybox.js"></script>
<script src="<?=base_url()?>public/front/js/custom.js"></script>
<script src="<?=base_url()?>public/front/js/functions.js"></script>
</body>
</html>

