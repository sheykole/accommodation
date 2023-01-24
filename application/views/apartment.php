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



<!-- Property Detail Start -->
<section id="property" class="padding_top padding_bottom_half">
  <div class="container">
    <div class="row">
      <?php if($this->session->flashdata('item')){ ?> 
            <p class="text-center text-danger"><?=$this->session->flashdata('item');?></p>
        <?php } ?>
      <div class="col-md-8 listing1 property-details">
        <h2 class="text-uppercase"><?=$list->info?></h2>
        <p class="bottom30"><?=$list->hostel_address?></p>
        <div id="property-d-1" class="owl-carousel">
          <?php foreach ($images as $key) { ?>
            
          <div class="item"><img src="<?=base_url()?>upload/apartments/<?=$key->path?>" alt="image"/></div>
        <?php } ?>
        </div>
        <div id="property-d-1-2" class="owl-carousel">
          <?php foreach ($images as $key) { ?>
            
          <div class="item"><img src="<?=base_url()?>upload/apartments/<?=$key->path?>" alt="image"/></div>
        <?php } ?>
        </div>
        <h2 class="text-uppercase">Property Description</h2>
        <p><?=$list->desc?></p>
       
        <h2 class="text-uppercase bottom20">Features</h2>
        <div class="row bottom40">
          <?php foreach ($features as $key) { ?>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="pro-list">
              <li> <?=dbInfo('feature_m','id',$key->feature,'name')?></li>             
            </ul>
          </div>
          <?php } ?>
        </div>       
        

        <?php if(($this->session->userdata('username'))!=null) {?>
         <h2 class="text-uppercase bottom20">Review Accommodation</h2> 
         <?php if($reviews!=''){ foreach ($reviews as $k) { 
          echo '<p>'.dbInfo('admin_m','username',$k->student_id,'name').' - '.date('d/m/Y H:i:s',strtotime($k->dateadded)).'  <blockquote>'.$k->description.'</blockquote></p>'; }?>
          <hr>
          <?php } ?>
        <div class="col-sm-12 bottom40" id="message">
            <form class="callus" method="post">
              <input type="hidden" name="acc_id" value="<?=$list->acc_id?>">
              <div class="row">                
                <div class="col-sm-6">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Review" name="msg"></textarea>
                    <?=form_error('msg')?>
                  </div>
                </div>
                <div class="col-sm-12 row">
                  <div class="row">
                    <div class="col-sm-3">
                      <input type="submit" name="review" class="btn-blue uppercase border_radius" value="review now">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        <?php  }?>

        <h2 class="text-uppercase bottom20">Contact Agent</h2>
        <div class="row">
          <div class="col-sm-6 bottom40">
            <div class="agent_wrap">
              <h3><?=dbInfo('admin_m','id',$list->user_id,'name');?></h3>
              <table class="agent_contact table">
                <tbody>
                  <tr class="bottom10">
                    <td><strong>Phone:</strong></td>
                    <td class="text-right"><?=dbInfo('admin_m','id',$list->user_id,'phone');?></td>
                  </tr>
                  <tr>
                    <td><strong>Email Adress:</strong></td>
                    <td class="text-right"><a href="#."><?=dbInfo('admin_m','id',$list->user_id,'email');?></a></td>
                  </tr>
                </tbody>
              </table>
              <div style="border-bottom:1px solid #d3d8dd;" class="bottom15"></div>              
            </div>
          </div>
          
        </div>
        <?php if(($this->session->userdata('username'))!=null) {?>
          
        <div class="col-sm-12 bottom40" id="message">
            <form class="callus" method="post">
              <input type="hidden" name="acc_id" value="<?=$list->acc_id?>">
              <input type="hidden" name="agent_id" value="<?=$list->user_id?>">
              <div class="row">                
                <div class="col-sm-6">
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Message" name="msg"></textarea>
                    <?=form_error('msg')?>
                  </div>
                </div>
                <div class="col-sm-12 row">
                  <div class="row">
                    <div class="col-sm-3"> 
                      <input type="submit" name="message" class="btn-blue uppercase border_radius" value="submit now">
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        <?php } ?>
      </div>
      <aside class="col-md-4 col-xs-12">
        <div class="property-query-area clearfix">
          <div class="col-md-12">
            <h3 class="text-uppercase bottom20 top15">Advanced Search</h3>
          </div>
          <form class="callus">
            <div class="single-query form-group col-sm-12">
              <input type="text" class="keyword-input" placeholder="Keyword (e.g. 'office')">
            </div>
            <div class="single-query form-group col-sm-12">
              <div class="intro">
                <select>
                  <option selected="" value="any">Location</option>
                  <option>All areas</option>
                  <option>Bayonne </option>
                  <option>Greenville</option>
                  <option>Manhattan</option>
                  <option>Queens</option>
                  <option>The Heights</option>
                </select>
              </div>
            </div>
            <div class="single-query form-group col-sm-12">
              <div class="intro">
                <select>
                  <option class="active">Property Type</option>
                  <option>All areas</option>
                  <option>Bayonne </option>
                  <option>Greenville</option>
                  <option>Manhattan</option>
                  <option>Queens</option>
                  <option>The Heights</option>
                </select>
              </div>
            </div>
            <div class="single-query form-group col-sm-12">
              <div class="intro">
                <select>
                  <option class="active">Property Status</option>
                  <option>All areas</option>
                  <option>Bayonne </option>
                  <option>Greenville</option>
                  <option>Manhattan</option>
                  <option>Queens</option>
                  <option>The Heights</option>
                </select>
              </div>
            </div>
            <div class="search-2 col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="single-query form-group">
                    <div class="intro">
                      <select>
                        <option class="active">Min Beds</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="single-query form-group">
                    <div class="intro">
                      <select>
                        <option class="active">Min Baths</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-sm-6">
                  <div class="single-query form-group">
                    <input type="text" class="keyword-input" placeholder="Min Area (sq ft)">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="single-query form-group">
                    <input type="text" class="keyword-input" placeholder="Max Area (sq ft)">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 bottom10">
              <div class="single-query-slider">
                <label><strong>Price Range:</strong></label>
                <div class="price text-right">
                  <span>$</span>
                  <div class="leftLabel"></div>
                  <span>to $</span>
                  <div class="rightLabel"></div>
                </div>
                <div data-range_min="0" data-range_max="1500000" data-cur_min="0" data-cur_max="1500000" class="nstSlider">
                  <div class="bar"></div>
                  <div class="leftGrip"></div>
                  <div class="rightGrip"></div>
                </div>
              </div>
            </div>
            <div class="col-sm-12 form-group">
              <button type="submit" class="btn-blue border_radius">Search</button>
            </div>
          </form>
          <div class="col-sm-12">
            <div class="group-button-search">
              <a data-toggle="collapse" href=".search-propertie-filters" class="more-filter bottom15">
                <i class="fa fa-plus text-1" aria-hidden="true"></i><i class="fa fa-minus text-2 hide" aria-hidden="true"></i>
                <div class="text-1">Show more search options</div>
                <div class="text-2 hide">less more search options</div>
              </a>
            </div>
          </div>
          <div class="search-propertie-filters collapse">
            <div class="container-2">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <div class="search-form-group white">
                    <input type="checkbox" name="check-box" />
                    <span>Rap music</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </aside>
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

