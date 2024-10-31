<?php


session_start();
include 'Mobile-Detect/Mobile_Detect.php';

$detect = new Mobile_Detect();

// Check for any mobile device.
// if ($detect->isMobile())
//    print_r('<h1>Mobile</h1>');
// else
//    print_r('<h1>Desktop</h1>');
$env = parse_ini_file('.env');
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
  session_unset();
  session_destroy(); 
}

$conn = mysqli_connect($env['DB_HOST'],$env['DB_USERNAME'],$env['DB_PASSWORD'],$env['DB_DATABASE']);
$section1 = mysqli_query($conn,'select * from content where section = 1 order by position asc');
$section1 = mysqli_fetch_all ($section1, MYSQLI_ASSOC);
$section1 = json_decode(json_encode($section1, JSON_FORCE_OBJECT));

$section2 = mysqli_query($conn,'select * from content where section = 2 order by position asc');
$section2 = mysqli_fetch_all ($section2, MYSQLI_ASSOC);
$section2 = json_decode(json_encode($section2, JSON_FORCE_OBJECT));

$section3_title = mysqli_fetch_assoc(mysqli_query($conn,'select * from content where section = 3 and position="0"'));
$section3 = mysqli_query($conn,'select * from content where section = 3 order by position asc');
$section3 = mysqli_fetch_all ($section3, MYSQLI_ASSOC);
$section3 = json_decode(json_encode($section3, JSON_FORCE_OBJECT));

$section4 = mysqli_query($conn,'select * from content where section = 4 order by position asc');
$section4 = mysqli_fetch_all ($section4, MYSQLI_ASSOC);
$section4 = json_decode(json_encode($section4, JSON_FORCE_OBJECT));

$section5 = mysqli_query($conn,'select * from content where section = 5 order by position asc');
$section5 = mysqli_fetch_all ($section5, MYSQLI_ASSOC);
$section5 = json_decode(json_encode($section5, JSON_FORCE_OBJECT));

$section6 = mysqli_query($conn,'select * from content where section = 6 order by position asc');
$section6 = mysqli_fetch_all ($section6, MYSQLI_ASSOC);
$section6 = json_decode(json_encode($section6, JSON_FORCE_OBJECT));

$section7 = mysqli_query($conn,'select * from content where section = 7 order by position asc');
$section7 = mysqli_fetch_all ($section7, MYSQLI_ASSOC);
$section7 = json_decode(json_encode($section7, JSON_FORCE_OBJECT));


// var_dump($section1);


?>
<html class="wide wow-animation desktop landscape rd-navbar-static-linked" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Site Title-->
  <title>Anand Sangeet | Home</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <script type="text/javascript" async="" src="./Home-Default_files/ec.js.download"></script>
  <script type="text/javascript" async="" src="./Home-Default_files/analytics.js.download"></script>
  <script async="" src="./Home-Default_files/gtm.js.download"></script>
  <link rel="icon" href="images/logo.jpeg" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="./Home-Default_files/css">
  <link rel="stylesheet" href="./Home-Default_files/bootstrap.css">
  <link rel="stylesheet" href="./Home-Default_files/style.css">
  <link rel="stylesheet" href="fontawesome.css">
  <!-- <link rel="stylesheet" href="data:text/css;charset=utf-8;base64"> -->
</head>
  <style type="text/css">
  	.top_image{
  		position: fixed;
  		top: 0;
  		max-height:20px; 
  		width: 100%;
  	}
  </style>
  <body class=" rd-navbar-default-linked">
    <!-- Page -->
    <div class="page">
      <div id="page-loader" style="display: none;">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
      </div>
      <!-- Panel Thumbnail-->
      <!-- Page Header-->
      <?php if ($detect->isMobile()){ ?>
      <img src="images/top_img.jpeg" class="top_img">
 		 <?php 	}else{ ?>
      <img src="images/top_image_desktop.png" style="width: 100%;" class="top_img">
    <?php   } ?>
      <header class="page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap" style="height: 100px;"> 
          <nav class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-stick-up-clone="false" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" data-md-stick-up-offset="69px" data-lg-stick-up-offset="1px" data-body-class="rd-navbar-default-linked">
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle toggle-original" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand-->
                <div class="rd-navbar-brand"><a class="brand-name" href="anandsangeet.com"><img src="images/logo.png" alt="" width="50px" height="50px"></a></div>
              </div>
              <!-- RD Navbar Nav-->
              <div class="rd-navbar-nav-wrap toggle-original-elements">
                <div class="rd-navbar-nav-wrap__element"><?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == '1'){ ?><a class="button button-gray-light-outline" href="index.php?action=logout">Logout</a><?php }else{ ?><a class="button button-gray-light-outline" href="login.php">Login</a><?php } ?></div>
              </div>
            </div>
          </nav>
        </div>
      </header>



<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------Section 1(slider) Data----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<?php 
  // while ($section = mysqli_fetch_assoc($section1)) {
  //   var_dump($section);
  //   echo "<br>";
  // }
?>

      <!-- Swiper-->
      <section id="section_1_data">
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <a href="javascript:void(0);"  class="btn btn-primary" onclick="edit_section('1')">edit</a> <!-- edit banner section -->
        <?php } ?>
        <div class="swiper-container swiper-slider swiper-slider_fullheight swiper-container-horizontal" data-simulate-touch="false" data-loop="true" data-autoplay="4000">

            <div class="swiper-wrapper" style="transform: translate3d(-3038px, 0px, 0px); transition-duration: 0ms;">
            <?php 
                foreach ($section1 as $section) {
                  if($detect->isMobile()){
                    if ($section->type == 'mobile') {
                      echo '<div class="swiper-slide bg-gray-lighter swiper-slide-active" data-slide-bg="'.$section->value.'" data-swiper-slide-index="1" style="bakground-image: url(\''.$section->value.'\'); background-size: cover; width: 1519px;" onclick="document.getElementById(\'banner_'.$section->value.'\').click();"></div>';
                      if(isset($_SESSION['admin']) && $_SESSION['admin']){ 
                        echo '<input type="file" name="banner_'.$section->value.'" id="banner_'.$section->value.'">';
                      }
                      echo '<script> document.getElementById("pagination").innerHTML += "<span class=\'swiper-pagination-bullet\'></span>"; 
                              </script>';
                    }
                  }
              else {
                  if($section->type == 'desktop'){
                    echo '<div class="swiper-slide bg-gray-lighter swiper-slide-active" data-slide-bg="'.$section->value.'" data-swiper-slide-index="1" style="background-image: url(\''.$section->value.'\'); background-size: cover; width: 1519px;"></div>';
                      echo '<script> document.getElementById("pagination").innerHTML += "<span class=\'swiper-pagination-bullet\'></span>"; 
                              </script>';
                     }
                  }
                }
                ?>
</div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets" id="pagination">
                </div>

                <div class="swiper-button-prev linear-icon-chevron-left"></div>
                <div class="swiper-button-next linear-icon-chevron-right"></div>
              </div>
          </div>
        </section>

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------Section 1(slider) Edit----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
        <section id="section_1_edit" style="display: none;">
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <button class="btn btn-info">submit</button> <!-- edit banner section -->
        <?php } ?>
        <div class="swiper-container swiper-slider swiper-slider_fullheight swiper-container-horizontal" data-simulate-touch="false" data-loop="true" data-autoplay="40000">

            <div class="swiper-wrapper" style="transform: translate3d(-3038px, 0px, 0px); transition-duration: 0ms;">
            <?php 
                foreach ($section1 as $section) {
                  if($detect->isMobile()){
                    if ($section->type == 'mobile') {
                      echo '<div class="swiper-slide bg-gray-lighter swiper-slide-active" data-slide-bg="'.$section->value.'" data-swiper-slide-index="1" style="bakground-image: url(\''.$section->value.'\'); background-size: cover; width: 1519px;"></div>';
                      echo '<script> document.getElementById("pagination").innerHTML += "<span class=\'swiper-pagination-bullet\'></span>"; 
                              </script>';
                    }
                  }
              else {
                  if($section->type == 'desktop'){
                    echo '<div class="swiper-slide bg-gray-lighter swiper-slide-active" data-slide-bg="'.$section->value.'" data-swiper-slide-index="1" style="background-image: url(\''.$section->value.'\'); background-size: cover; width: 1519px;"></div>';
                      echo '<script> document.getElementById("pagination").innerHTML += "<span class=\'swiper-pagination-bullet\'></span>"; 
                              </script>';
                     }
                  }
                }
                ?>
</div>
                <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets" id="pagination">
                </div>

                <div class="swiper-button-prev linear-icon-chevron-left"></div>
                <div class="swiper-button-next linear-icon-chevron-right"></div>
              </div>
          </div>
        </section>







        <!-- Presentation -->
<!--       <section class="section-xl bg-default text-center" id="section-see-features">
        <div class="container">
          <div class="row justify-content-lg-center">
            <div class="col-lg-10 col-xl-10">
              <h3>Consistency is the key</h3>
              <p>Learning music can be extremely fun and rewarding but that doesn’t mean it’s easy (and I don’t think anybody would ever suggest it is). In fact, picking up an instrument and sticking with it is always going to be tough — but something that makes so many people quit their musical dreams is the fact they don’t know where to go to learn more. Hiring a Private Instrument Teacher is always a great option but for some, it’s not practical for any number of reasons such as price, time, or perhaps even location. Thankfully, these factors no longer need to keep people from realizing their ambitions as future superstars.</p>
            </div>
          </div>
        </div>
      </section> -->

      <!-- Section 2 Data Mode -->
      <section id="section_2_data" class="bg-gray-lighter object-wrap" style="">
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <a href="javascript:void(0);" class="btn btn-info" onclick="edit_section('2')">edit</a> <!-- edit about section -->
        <?php } ?>
        <div class="section-xxl section-xxl_bigger">
          <div class="container">
            <div class="row">
              <?php 
                  foreach ($section2 as $section) {
                      if($section->position == '0'){
                          echo '<div class="col-lg-12 text-center mb-4">'.$section->value.'</div>';
                      }
                      else{
                        if($section->type == 'image'){
                            echo '<div class="col-lg-6 mt-5"><img src="'.$section->value.'"></div>';
                        }
                        else{
                            echo '<div class="col-lg-6 mt-5"> <p style="color: #000;">'.$section->value.'</p></div>';
                        }
                      }
                  }
               ?>
              
            </div>
          </div>
          <!-- <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-right bg-image" style="background-image: url(images/home-default-1-960x640.jpg)"></div> -->
        </section>



      <!-- Section 2 Edit Mode -->
           <section id="section_2_edit" class="bg-gray-lighter object-wrap" id="section_2_edit" style="display: none;">
        <form action="action.php" method="post"enctype="multipart/form-data" target="_blank">
        <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <button class="btn btn-info">submit</button> <!-- edit about section -->
        <?php } ?>
          <input type="hidden" name="section" value="2">
        <div class="section-xxl section-xxl_bigger">
          <div class="container">
            <div class="row">
              <?php 
                  foreach ($section2 as $section) {
                      if($section->position == '0'){
                          echo '<div class="col-lg-12 text-center mb-4">
                                  <input type="text" name="section2'.$section->position.'" value="'.$section->value.'">
                              </div>';
                      //   if($section->type == 'image')
                      //    echo '<div class="col-lg-12 text-center mb-4">
                      //             <h3>'.$section->value.'</h3>
                      //         </div>';
                      }
                      else{
                        if($section->type == 'image'){
                            echo '<div class="col-lg-6 mt-5"><img src="'.$section->value.'" id="img_2'.$section->position.'">

                                  <input type="file" name="section2'.$section->position.'" id="2'.$section->position.'" style="visibility:hidden;" onchange=\'loadImage(this,"img_2'.$section->position.'")\'>

                                  <button type="button" onclick="document.getElementById(\'2'.$section->position.'\').click();">Change</button>

                                  </div>';
                        }
                        else{
                            echo '<div class="col-lg-6 mt-5"><textarea class="col-12" name="section2'.$section->position.'" rows="7">'.$section->value.'</textarea></div>';
                        }
                      }
                  }
               ?>
              
            </div>
          </div>
        </div>
        </form>
          <!-- <div class="object-wrap__body object-wrap__body-sizing-1 object-wrap__body-md-right bg-image" style="background-image: url(images/home-default-1-960x640.jpg)"></div> -->
        </section>
  

     <section id="section_3_data" class="section-xl bg-default">
      <section class="bg-primary text-center">
          <!-- RD Parallax-->
          <div class="parallax-container rd-parallax-light">
          <div class="parallax-content">
            <div class="container section-xxl">
              <h2 style="font-weight: bold;"><?php echo htmlentities($section3_title['value']) ?></h2>
            </div>
          </div>
        </div>
      </section>
     	<?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <a href="javascript:void(0);" class="btn btn-info" onclick="edit_section('3')">edit</a> <!-- edit about section -->
        <?php } ?>
        <div class="container">

            <?php
$row = 1;
foreach ($section3 as $section) {
  if($section->position == 0)
      continue;
    
     if ($detect->isMobile()){
      // echo "<script>alert('mobile')</script>";
      if(($section->position)%2 == 1){
        echo '<div class="row justify-content-md-center flex-lg-row align-items-lg-center justify-content-lg-between row-50">';
      } 
        if($section->type == 'image'){
              echo '<div class="col-md-9 col-lg-6"><img src="'.$section->value.'" alt="" width="652" height="491"></div>';
        }
        else{
              echo '<div class="col-md-9 col-lg-6">'.$section->value.'</div>';
        }
        if(($section->position)%2 == 0){
          echo '</div>';
        }
    }
    else{ 
          if(($section->position)%2 == 1){
            
              if($row%2 == 0){
                echo '<div class="row justify-content-md-center flex-lg-row-reverse align-items-lg-center justify-content-lg-between row-50">';
              }
              else{
                echo '<div class="row justify-content-md-center flex-lg-row align-items-lg-center justify-content-lg-between row-50">';
              }
              $row++; 
            }
          if($section->type == 'image'){
              echo '<div class="col-md-9 col-lg-6"><img src="'.$section->value.'" width="652" height="491"></div>';
        }
        else{
              echo '<div class="col-md-9 col-lg-6">'.$section->value.'</div>';
        }
        if($section->position%2 == 0){
          echo '</div>';
        }
        
      }
  }
  ?>

          </div>
        </div>
      </section>

     <section id="section_3_edit" class="section-xl bg-default" style="display: none;">
      <form action="action.php" method="post"enctype="multipart/form-data" target="_blank">
        <input type="hidden" name="section" value="3">

<section class="bg-primary text-center">
          <!-- RD Parallax-->
          <div class="parallax-container rd-parallax-light">
          <div class="parallax-content">
            <div class="container section-xxl">
              <h2 style="font-weight: bold;"><input type="text" name="section3<?php echo htmlentities($section3_title['position']) ?>" value="<?php echo htmlentities($section3_title['value']) ?>"></h2>
            </div>
          </div>
        </div>
      </section>

     	<?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
             <button class="btn btn-info">submit</button> 
        <?php } ?>
        <div class="container">
<?php
$row = 1;
foreach ($section3 as $section) {
  if($section->position == 0)
      continue;

     if ($detect->isMobile()){
      // echo "<script>alert('mobile')</script>";
      if(($section->position)%2 == 1){
        echo '<div class="row justify-content-md-center flex-lg-row align-items-lg-center justify-content-lg-between row-50">';
      }	
     		if($section->type == 'image'){
	            echo '<div class="col-md-9 col-lg-6"><img src="'.$section->value.'" id="img_3'.$section->position.'" alt="" width="652" height="491">
                       <input type="file" name="section2'.$section->position.'" id="3'.$section->position.'" style="visibility:hidden;" onchange=\'loadImage(this,"img_3'.$section->position.'")\'>

                                  <button type="button" onclick="document.getElementById(\'3'.$section->position.'\').click();">Change</button></div>';
     		}
     		else{
	            echo '<div class="col-md-9 col-lg-6"><textarea class="col-12" name="section3'.$section->position.'" rows="7">'.$section->value.'</textarea></div>';
     		}
        if(($section->position)%2 == 0){
          echo '</div>';
        }
	  }
	  else{ 
          if(($section->position)%2 == 1){
              if($row%2 == 0){
                echo '<div class="row justify-content-md-center flex-lg-row-reverse align-items-lg-center justify-content-lg-between row-50">';
              }
              else{
                echo '<div class="row justify-content-md-center flex-lg-row align-items-lg-center justify-content-lg-between row-50">';
              }
              $row++; 
            }
	        if($section->type == 'image'){
	            echo '<div class="col-md-9 col-lg-6"><img src="'.$section->value.'" id="img_3'.$section->position.'" alt="" width="652" height="491">
              <input type="file" name="section3'.$section->position.'" id="3'.$section->position.'" style="visibility:hidden;" onchange=\'loadImage(this,"img_3'.$section->position.'")\'>

                                  <button type="button" onclick="document.getElementById(\'3'.$section->position.'\').click();">Change</button></div>';
     		}
     		else{
	            echo '<div class="col-md-9 col-lg-6"><textarea class="col-12" name="section3'.$section->position.'"  rows="12">'.$section->value.'</textarea></div>';
     		}
        if($section->position%2 == 0){
          echo '</div>';
        }
        
	    }
	}
  ?>
          </div>
        </form>
      </section>




      <!-- Blurbs-->

      <section class="section-xl bg-gray-lighter">
        <div class="container">
          <?php
    foreach ($section4 as $section) {
        if($section->position == '0'){
            echo '<h3 class="text-center">'.$section->value.'</h3>';
            }
          }
          ?>
          <div class="row row-50">
            <div class="col-md-12 col-lg-12">
              <!-- Blurb minimal-->
              <article class="blurb blurb-minimal">
                <div class="unit flex-row unit-spacing-md">
                  <div class="unit-left">
                    <div class="blurb-minimal__icon"><span class="icon linear-icon-magic-wand"></span></div>
                  </div>
                  <div class="unit-body">

                    <p class="blurb__title">Music for all</p>
                    <p>We together have a goal to give this great knowledge of classical music to the upcoming generation. With our all efforts of teaching we teach our students and send them to Akhil Bhartiya Gandharva Mahavidyalaya for appearing exams of tabla , singing and harmonium. Our wish is that our students should pass the Visharad purna exam with good grades .
                     If a person or a student becomes a Sangeet Visharad he/she can :-
                     <ul>
                      <li>● teach classical music's correct knowledge to students.</li>
                      <li>● work in a school  or college as a music teacher.</li>
                      <li>● get first preference while finding jobs .</li>
                    </ul>
                    <br>
                    If a student passes any of the three or four exams of Akhil Bhartiya Gandharva Mahavidyalaya {madhyama pratham or madhyama purna}  he / she gets first preference than other students in getting admissions in the colleges.
                    </p>
                  </div>
                </div>
              </article>
            </div>
        <?php
        /*    <div class="col-md-6 col-lg-4">
              <!-- Blurb minimal-->
              <article class="blurb blurb-minimal">
                <div class="unit flex-row unit-spacing-md">
                  <div class="unit-left">
                    <div class="blurb-minimal__icon"><span class="icon linear-icon-menu3"></span></div>
                  </div>
                  <div class="unit-body">
                    <p class="blurb__title">transfer the elixir or our culture to </p>
                    <p>This template is fully responsive and Retina-ready, which means its ability to be displayed on any modern gadgets, from computers and laptops to smartphones and tablets. It is also perfectly optimized for high-resolution displays and other devices.</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <!-- Blurb minimal-->
              <article class="blurb blurb-minimal">
                <div class="unit flex-row unit-spacing-md">
                  <div class="unit-left">
                    <div class="blurb-minimal__icon"><span class="icon linear-icon-users2"></span></div>
                  </div>
                  <div class="unit-body">
                    <p class="blurb__title">Made for People</p>
                    <p>Monstroid² is built for real users that enjoy easy website development and at the same are looking for a clear and stunning design. Our template can provide you with lots of child themes so you don’t need to buy other templates and adapt your website to them.</p>
                  </div>
                </div>
              </article>
            </div>
           */ ?>
          </div>
        </div>
      </section>

        <!-- RD Parallax-->
      <!-- <section class="bg-gray-dark text-center">
        <div class="parallax-container bg-image rd-parallax-light" data-parallax-img="images/parallax-01.jpg"><div class="material-parallax parallax"><img src="./Home-Default_files/parallax-01.jpg" alt="" style="display: block; transform: translate3d(-50%, 3px, 0px);"></div>
        <div class="parallax-content">
          <div class="container section-xxl">
            <h2>Like What We Offer?</h2>
            <p>Start with this demo now or check out the others to choose what you need.</p><a class="button button-primary" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#">View now!</a>
          </div>
        </div>
      </div>
    </section> -->

    <section class="section-xl bg-default text-center">
      <div class="container">
        <div class="row row-30 justify-content-lg-center">
          <div class="col-lg-11 col-xl-9">
            <h3>Representing Our Staff</h3>
            <p>You can easily Check the members of your staff, team or workforce.</p>
          </div>
        </div>
        <div class="row row-50 offset-top-1">
          <div class="col-md-6 col-lg-4">
            <!-- Thumb corporate-->
            <div class="thumb thumb-corporate">
              <div class="thumb-corporate__main"><a href="images/ANAND_480BY362.png"><img src="images/ANAND_480BY362.png" alt="" width="480" height="362"></a></div>
              <div class="thumb-corporate__caption">
                <p class="thumb__title">Anand Rajaram Jadhav</p>
                <p class="thumb__subtitle">Tabla Visharad Purna</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <!-- Thumb corporate-->
            <div class="thumb thumb-corporate">
              <div class="thumb-corporate__main"><a href="images/prabha atre.jpeg"><img src="images/prabha atre.jpeg" alt="" width="480" height="362"></a></div>
              <div class="thumb-corporate__caption">
                <p class="thumb__title">Hemangi Rajaram Jadhav</p>
                <p class="thumb__subtitle">Harmonium Visharad Purna</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4">
            <!-- Thumb corporate-->
            <div class="thumb thumb-corporate">
              <div class="thumb-corporate__main"><a href="images/IMG-20190905-WA0007.jpeg"></a><img src="images/IMG-20190905-WA0007.jpeg" style="height: 418px; width: 315px;" alt=""></a></div>
              <div class="thumb-corporate__caption">
                <p class="thumb__title">Surekha Rajaram Jadhav</p>
                <p class="thumb__subtitle">Music Teacher</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<?php 
$section5_title = mysqli_fetch_assoc(mysqli_query($conn,'select * from content where section = 5 and position="0"'));
$section5 = mysqli_fetch_all(mysqli_query($conn,'select * from gallery where status = "active"'), MYSQLI_ASSOC);
$section5 = json_decode(json_encode($section5, JSON_FORCE_OBJECT));
 ?>
            

    <!-- Gallery-->
     <section id="section_5_data" class="section-xl bg-default" data-lightgallery="group">
      <section class="bg-success text-center">
          <!-- RD Parallax-->
          <div class="parallax-container rd-parallax-light">
          <div class="parallax-content">
            <div class="container section-xxl">
              <h2 style="font-weight: bold;"><?php echo $section5_title['value'] ?></h2>
            </div>
          </div>
        </div>
      </section>
      <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
            <a href="javascript:void(0);" class="btn btn-info mb-3" onclick="edit_section('5')">edit</a> <!-- edit about section -->
        <?php } ?>
      <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
             <!-- <button class="btn btn-info">submit</button>  -->
        <?php } ?>

      <div class="container-fluid">
        <div class="row row-10 row-horizontal-10">
  <?php
  foreach ($section5 as $section) {
    echo '<div class="col-md-4 col-xl-3"> <a class="thumb-modern" data-lightgallery="item" href="'.$section->image.'">
            <figure><img src="'.$section->image.'" style="width: 100%; height: 100%;" alt="" width="472" height="355">
            </figure>
            <div class="thumb-modern__overlay"></div></a><p style="margin-top: -2px; margin-bottom: 3px;">'.$section->description.'</p></div>';
  }
  ?>

                        </div>
                        <!-- <input type="file" name=> -->
                      </div>
                    </section>



    <!-- Gallery-->
     <section id="section_5_edit" class="section-xl bg-default" data-lightgallery="group" style="display: none;">
       <form method="post" action="action.php" enctype="multipart/form-data" target="_blank">
        <input type="hidden" name="section" value="<?php echo htmlentities($section5_title['section']) ?>">
        <section class="bg-success text-center">
          <!-- RD Parallax-->
          <div class="parallax-container rd-parallax-light">
          <div class="parallax-content">
            <div class="container section-xxl">
              <h2 style="font-weight: bold;"><input type="text" name="section5<?php echo htmlentities($section5_title['position']) ?>" value="<?php echo $section5_title['value'] ?>"></h2>
            </div>
          </div>
        </div>
      </section>
      <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
             <button class="btn btn-info mb-3">submit</button> 
        <?php } ?>

      <div class="container-fluid">
        <div class="row row-10 row-horizontal-10" id="gallery-div">
  <?php
  foreach ($section5 as $section) {
    // print_r($section);
    if($section->status == 'active'){
      $status = 'inactivate';
    }
    else{
      $status = 'activate';
    }
    echo '<div class="col-md-4 col-xl-3" id="g-'.$section->id.'"><button type="button" class="btn btn-danger" onclick="gallery_edit(\''.$section->id.'\',\'delete\')">Delete</button><button id="btn_update_'.$section->id.'" type="button" class="btn btn-success" onclick="gallery_edit(\''.$section->id.'\',\''.$status.'\')">'.$status.' </button> <a class="thumb-modern" data-lightgallery="item" href="'.$section->image.'">
            <figure><img src="'.$section->image.'" style="width: 100%; height: 100%;" alt="" width="472" height="355">
            </figure>
            <div class="thumb-modern__overlay"></div></a><textarea name="desc['.$section->id.']" rows="3" cols="35" style="background-color : grey; color : #fff;">'.$section->description.'</textarea></div> <input type="hidden" name="g['.$section->id.']" value="'.$section->status.'">';
  }
  ?>

                        </div>
  <div class="col-md-4 col-xl-3">
    <p><button type="button" class="btn btn-danger" onclick="gallery_edit('','add')">Add Image</button></p>
  </div>
                        <!-- <input type="file" name=> -->
                      </div>
                    </form>
                    </section>



          <script type="text/javascript">
var new_image = 0;

            function gallery_edit(id,status){
              // alert('id : '+id+'\n status : '+status)
              if (status == 'delete') {
                $('input[name ="g['+id+']"]').val('delete');
                $('#g-'+id).hide();
              }
              if(status == 'activate'){
                $('input[name ="g['+id+']"]').val('active');
                console.log('$(\'#btn_update_'+id+'\').attr(\'onclick\',"gallery_edit(\''+id+'\',\'inactivate\')");')
                $('#btn_update_'+id).attr('onclick',"gallery_edit('"+id+"','inactivate')");
                $('#btn_update_'+id).html('inactivate');
              }
              if(status == 'inactivate'){
                $('input[name ="g['+id+']"]').val('inactive');
                console.log('$(\'#btn_update_'+id+'\').attr(\'onclick\',"gallery_edit(\''+id+'\',\'activate\')");')
                $('#btn_update_'+id).attr('onclick',"gallery_edit('"+id+"','activate')");
                $('#btn_update_'+id).html('activate');
              }
              if(status == 'add'){
                new_image++;
                $('#gallery-div').append(
                  '<div class="col-md-4 col-xl-3" id="g-'+new_image+'"><button type="button" class="btn btn-danger" onclick="gallery_edit(\''+new_image+'\',\'delete\')">Delete</button><button id="btn_update_'+new_image+'" type="button" class="btn btn-success" onclick="gallery_edit(\''+new_image+'\',\'inactivate\')">inactivate</button><a class="thumb-modern" data-lightgallery="item" href="javascript:void(0);"><figure><img id="new_img_'+new_image+'" src="" style="width: 100%; height: 100%;" alt="" width="472" height="355"></figure></a><textarea rows="3" cols="35" style="background-color : grey; color : #fff;"></textarea><input type="file" id="f'+new_image+'" name="new_image['+new_image+']" onchange=\'loadImage(this,"new_img_'+new_image+'")\' hidden></div>')

                // loadImageWithOverlay(this,"new_image_'+new_image+'")
                $('input[name ="new_image['+new_image+']"').trigger('click');
              }
            }
</script>

          <script type="text/javascript">

          function edit_section(id) {
            $('#section_'+id+'_data').hide();
            $('#section_'+id+'_edit').show();

          }
          </script>

          <script type="text/javascript">
          function loadImage(obj,id){
            console.clear();
            console.log(obj);
            console.log(id);
            if (FileReader)
              {
                var reader = new FileReader();
                reader.readAsDataURL(obj.files[0]);
                reader.onload = function (e) {
                var image=new Image();
                image.src=e.target.result;
                image.onload = function () {
                  console.log('in load');
                  console.log(image.src)
                  console.log('id : '+id)
                  console.log(document.getElementById(id).src)
                  document.getElementById(id).src=image.src;
                  console.log(document.getElementById(id).src)
                }
                }
              }
          }
</script>

          <script type="text/javascript">

          function loadImageWithOverlay(obj,cls){
            console.clear();
            console.log(obj);
            console.log(cls);
            if (FileReader)
              {
                var reader = new FileReader();
                reader.readAsDataURL(obj.files[0]);
                reader.onload = function (e) {
                var image=new Image();
                image.src=e.target.result;
                image.onload = function () {
                  console.log('in load');
                  console.log(image.src)
                  console.log('id : '+cls)
                  $('.'+cls).attr('src',image.src);
                  $('.'+cls).attr('href',image.src);
                }
                }
              }
          }
        </script>



<?php 
$section6_title = mysqli_fetch_assoc(mysqli_query($conn,'select * from content where section = 6 and position="0"'));
// var_dump($section6_title);
$section6 = mysqli_fetch_all(mysqli_query($conn,'select * from certificate where status = "active"'), MYSQLI_ASSOC);
$section6 = json_decode(json_encode($section6, JSON_FORCE_OBJECT));
// var_dump($section6);
 ?>
                    <section class="bg-secondary text-center">
          <!-- RD Parallax-->
          <div class="parallax-container rd-parallax-light">
          <div class="parallax-content">
            <div class="container section-xxl">
              <h2 style="font-weight: bold;"><?php echo $section6_title['value'] ?></h2>
            </div>
          </div>
        </div>
      </section>

    <!-- Gallery-->



      <!-- Gallery-->
     <section class="section-xl bg-default" data-lightgallery="group">
      <div class="container-fluid">
        <div class="row row-10 row-horizontal-10">
  <?php
  foreach ($section6 as $section) {
    echo '<div class="col-md-4 col-xl-3"> <a class="thumb-modern" data-lightgallery="item" href="'.$section->image.'">
            <figure><img src="'.$section->image.'" style="width: 100%; height: 100%;" alt="" width="472" height="355">
            </figure>
            <div class="thumb-modern__overlay"></div></a><p style="margin-top: -2px; margin-bottom: 3px;">'.$section->description.'</p></div>';
  }
  ?>

                        </div>
                      </div>
                    </section>



                    <!-- Post Your Latest News-->
                    <section class="section-xl bg-gray-dark text-center">
                      <div class="container">
                        <h3>Any Query? Feel free to ask us</h3>
                        <div class="row row-50">
                          <div class="col-md-12">
                            <!-- Post classic-->
                            <article class="post-minimal text-center">

                            	<div class="text-center">
                                  <a href="tel:8369894806"><button class="button button-primary" type="submit">Call for query!</button></a>
                                  <a href="https://api.whatsapp.com/send?phone=+918369894806&amp;text=Hi%20I%20came%20here%20from%20your%20website%20" target="_blank"><button class="button button-primary" type="submit">WhatsApp!</button></a>
                                  <a href="mailto:sanjay@anandsangeet.com"><button class="button button-primary" type="submit">Mail your query!</button></a>
                                </div>

                              </article>
                            </div>
                              
                              </div>
                            </div>
                          </section>
<!-- <a class="button button-primary" href="tel:8369894806">Call for query!</button> -->
<!-- <a class="button button-primary" href="https://api.whatsapp.com/send?phone=+918369894806&amp;text=Hi%20I%20came%20here%20from%20your%20website%20" target="_blank">Whatsapp Now</a> -->
<?php
/*
                          <!-- Share Your Company Testimonials-->
                          <section class="section-lg bg-gray-lighter text-center">
                            <div class="container">
                              <h3>Share Your Company Testimonials</h3>
                              <!-- Owl Carousel-->
                              <div class="owl-carousel owl-carousel-spacing-1 owl-loaded owl-drag" data-autoplay="true" data-items="1" data-stage-padding="15" data-loop="true" data-margin="30" data-nav="true" style="">



                                <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-3330px, 0px, 0px); transition: all 0.25s ease 0s; width: 7800px; padding-left: 15px; padding-right: 15px;"><div class="owl-item cloned" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">This template has everything I was looking for my business website to have. From easy-to-customize pages to flawlessly working web tools, Monstroid² is my number one choice!</p>
                                    </div>
                                    <p class="quote-default__cite">James Wilson</p>
                                  </div>
                                </div></div><div class="owl-item cloned" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">It’s great that there are such templates that are available to both professional and beginner web developers at affordable price. The job you did with this template is surely appreciated, thank you!</p>
                                    </div>
                                    <p class="quote-default__cite">Sam Lee</p>
                                  </div>
                                </div></div><div class="owl-item" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">I love to use your ready-made and beautifully looking templates. They are available at very affordable prices and they save me a lot of time, and deliver from a lot of sweat and tears!</p>
                                    </div>
                                    <p class="quote-default__cite">Jane Smith</p>
                                  </div>
                                </div></div><div class="owl-item active" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">This template has everything I was looking for my business website to have. From easy-to-customize pages to flawlessly working web tools, Monstroid² is my number one choice!</p>
                                    </div>
                                    <p class="quote-default__cite">James Wilson</p>
                                  </div>
                                </div></div><div class="owl-item" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">It’s great that there are such templates that are available to both professional and beginner web developers at affordable price. The job you did with this template is surely appreciated, thank you!</p>
                                    </div>
                                    <p class="quote-default__cite">Sam Lee</p>
                                  </div>
                                </div></div><div class="owl-item cloned" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.1news84,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">I love to use your ready-made and beautifully looking templates. They are available at very affordable prices and they save me a lot of time, and deliver from a lot of sweat and tears!</p>
                                    </div>
                                    <p class="quote-default__cite">Jane Smith</p>
                                  </div>
                                </div></div><div class="owl-item cloned" style="width: 1080px; margin-right: 30px;"><div class="item">
                                  <!-- Quote default-->
                                  <div class="quote-default">
                                    <svg class="quote-default__mark" version="1.1" baseProfile="tiny" x="0px" y="0px" width="30.234px" height="23.484px" viewBox="0 0 30.234 23.484">
                                      <g>
                                        <path d="M12.129,0v1.723c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959 c0,0.445,0.07,0.773,0.211,0.984c0.093,0.141,0.199,0.211,0.316,0.211c0.117,0,0.293-0.082,0.527-0.246 c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.519,0.545,3.551,1.635c1.031,1.09,1.547,2.385,1.547,3.885 c0,1.57-0.592,2.953-1.775,4.148c-1.184,1.195-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 C0.715,19.441,0,17.274,0,14.555c0-3.164,0.972-6,2.918-8.508C4.863,3.539,7.933,1.524,12.129,0z M29.039,0v1.723 c-2.438,0.891-4.348,2.291-5.73,4.201c-1.383,1.911-2.074,3.897-2.074,5.959c0,0.445,0.07,0.773,0.211,0.984 c0.094,0.141,0.199,0.211,0.316,0.211s0.293-0.082,0.527-0.246c0.75-0.539,1.699-0.809,2.848-0.809c1.336,0,2.52,0.545,3.551,1.635 s1.547,2.385,1.547,3.885c0,1.57-0.592,2.953-1.775,4.148s-2.619,1.793-4.307,1.793c-1.969,0-3.668-0.809-5.098-2.426 s-2.145-3.785-2.145-6.504c0-3.164,0.973-6,2.918-8.508C21.773,3.539,24.844,1.524,29.039,0z"></path>
                                      </g>
                                    </svg>
                                    <div class="quote-default__text">
                                      <p class="q">This template has everything I was looking for my business website to have. From easy-to-customize pages to flawlessly working web tools, Monstroid² is my number one choice!</p>
                                    </div>
                                    <p class="quote-default__cite">James Wilson</p>
                                  </div>
                                </div></div></div></div><div class="owl-nav"><div class="owl-prev"></div><div class="owl-next"></div></div><div class="owl-dots disabled"></div></div>
                              </div>
                            </section>
                            */
                            ?>

                            <!-- Page Footer -->
                            <section class="pre-footer-corporate">
                              <div class="container">
                                <div class="row justify-content-sm-center justify-content-lg-start row-30 row-md-60">
                                  <div class="col-sm-10 col-md-6 col-lg-10 col-xl-3">
                                    <h6>About</h6>
                                    <p><?php echo (mysqli_fetch_assoc(mysqli_query($conn,'select * from content where section = "about"')))['value'] ?> </p>
                                  </div>


                                  <!-- <div class="col-sm-10 col-md-6 col-lg-3 col-xl-3">
                                    <h6>Navigation</h6>
                                    <ul class="list-xxs">
                                      <li><a href="http://anandsangeet.com">Home</a></li>
                                    </ul>
                                  </div> -->



                                  <!-- <div class="col-sm-10 col-md-6 col-lg-5 col-xl-3">
                                    <h6>Recent Comments</h6>
                                    <ul class="list-xs">
                                      <li>
                                        <article class="comment-minimal">
                                          <p class="comment-minimal__author">Brian Williamson on</p>
                                          <p class="comment-minimal__link"><a href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/standard-post.html">Site Speed and Search Engines Optimization Aspects</a></p>
                                        </article>
                                      </li>
                                      <li>
                                        <article class="comment-minimal">
                                          <p class="comment-minimal__author">Brian Williamson on</p>
                                          <p class="comment-minimal__link"><a href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/standard-post.html">5 Things to Know Before You Buy an HTML Template</a></p>
                                        </article>
                                      </li>
                                      <li>
                                        <article class="comment-minimal">
                                          <p class="comment-minimal__author">Brian Williamson on</p>
                                          <p class="comment-minimal__link"><a href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/standard-post.html">Turning Your Site into a Sales Machine</a></p>
                                        </article>
                                      </li>
                                    </ul>
                                  </div> -->
                                  <div class="col-sm-10 col-md-6 col-lg-4 col-xl-3">
                                    <h6>Contacts</h6>
                                    <ul class="list-xs">
                                      <li>
                                        <dl class="list-terms-minimal">
                                          <dt style="font-weight: bold;">Address</dt>
                                          <dd>Anand Sangeet classes, Room No. 5, 1st Floor, Shivsamreeti society, juvekar marg, op sanjay apt, Bhandup (east), Mumbai 400042</dd>
                                        </dl>
                                      </li>
                                      <li>
                                        <dl class="list-terms-minimal">
                                          <dt>Phone1</dt><dd><a href="callto:+918369894806">+91 83698 94806</a></dd>
                                        </dl>
                                        <dl class="list-terms-minimal">
                                          <dt>Phone2</dt><dd><a href="callto:+919833513927">+91 98335 13927</a></dd>
                                        </dl>
                                        <dl class="list-terms-minimal">
                                          <dt>Phone3</dt><dd><a href="callto:+919820850684">+91 98208 50684</a></dd>
                                        </dl>
                                      </li>
                                      <li>
                                        <dl class="list-terms-minimal">
                                          <dt>E-mail</dt>
                                          <dd><a href="mailto:admin@anandsangeet.com">admin@anandsangeet.com</a></dd>
                                        </dl>
                                      </li>
                                      <li>
                                        <dl class="list-terms-minimal">
                                          <dt>We are open</dt>
                                          <dd>daily: 5:30pm - 9:30pm</dd>
                                        </dl>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </section>

                            <footer class="footer-corporate">
                              <div class="container">
                                <div class="footer-corporate__inner">
                                  <!-- <p class="rights"><span></span><span>&nbsp;</span><span id="copyright-year">2019</span>. -->
                                    <!-- {%FOOTER_LINK}-->
                                  </p>
                                  <ul class="list-inline-xxs">
                                    <li><a class="icon icon-xxs icon-primary fa fa-facebook" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#"></a></li>
                                    <li><a class="icon icon-xxs icon-primary fa fa-twitter" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#"></a></li>
                                    <li><a class="icon icon-xxs icon-primary fa fa-google-plus" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#"></a></li>
                                    <li><a class="icon icon-xxs icon-primary fa fa-vimeo" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#"></a></li>
                                    <li><a class="icon icon-xxs icon-primary fa fa-youtube" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#"></a></li>
                                    <li><a class="icon icon-xxs icon-primary fa fa-pinterest" href="https://livedemo00.template-help.com/wt_62267_v8/62267-default/#"></a></li>
                                  </ul>
                                </div>
                              </div>
                            </footer>
                          </div>
                          <!-- Global Mailform Output-->
                          <div class="snackbars" id="form-output-global"></div>
                          <!-- Javascript-->
                          <script src="./Home-Default_files/core.min.js.download"></script>
                          <script src="./Home-Default_files/script.js.download"></script>
                      </body><!-- Google Tag Manager --></html>