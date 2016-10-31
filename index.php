<?php

//$url = rtrim("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]","/");
//if(strstr($url,"?")){
//  $url = strstr($url,"?",true);
//}
//
//$valid_url = array(
//  'default' => '',
//  'en' => '',
//  'ge' => ''
//);
//
//$correct_url = false;
//$lang = "";
//$secondlang = "";
//
//foreach($valid_url as $key=>$val){
//  if($url == $val){
//    $correct_url = true;
//    $lang = $key;
//    break;
//  }
//}

//Country Detection
//TODO make country detection cooler
//TODO New country detection not tested
//require_once 'php/Country_Detect.php';
//switchToCorrectLanguage($correct_url, $lang, $valid_url);


//if($lang == "ge"){
//  $secondlang = "en";
//}
//else{
//  $secondlang = "ge";
//}
//$texts = json_decode(file_get_contents('php/texts.json'),true);

$random_number_for_disabling_cache = time();

//Mobile Detection
require_once 'php/Mobile_Detect.php';
$detect = new Mobile_Detect;
$is_mobile = $detect->isMobile();
$is_tablet = $detect->isTablet();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico?v=1"/>

  <!--  for Android-->
  <meta name="theme-color" content="#CDA34C">
  <link rel="icon" sizes="192x192" href="img/favicon192.png">

  <link rel="stylesheet" href="css/style.css">
<!--  <link rel="stylesheet" href="css/style.css?v=--><?//=$random_number_for_disabling_cache?><!--">-->

  <title>My Boilerplate</title>

<!--  <meta name="description" content="--><?//= $texts['tags']['description'][$lang]?><!--" />-->
<!--  <meta property="og:type" content="website">-->
<!--  <meta property="fb:app_id" content="--><?//= $texts['tags']['app-id'][$lang]?><!--" />-->
<!--  <meta property="og:image" content="--><?//= $valid_url['default'] . $texts['tags']['image'][$lang]?><!--">-->
<!--  <meta property="og:url" content="--><?//= $valid_url['default'] . $texts['tags']['url'][$lang]?><!--">-->
<!--  <meta property="og:title" content="--><?//= $texts['tags']['fb-title'][$lang]?><!--">-->
<!--  <meta property="og:description" content="--><?//= $texts['tags']['fb-description'][$lang]?><!--">-->

</head>
<body>

  <div id="svg-container">
    <?php //include 'img/svg-icons.svg'; ?>
  </div>
  <!--svg viewBox="0 0 141 35" class="main-logo">
    <use xlink:href="#logo"></use>
  </svg-->
  <header>header</header>
  <nav>navigation</nav>
  <section>section</section>
  <footer>footer</footer>

  <script>
    <?= "var isMobile=" . (($is_mobile) ? 'true' : 'false')?>;
    <?= "var isTablet=" . (($is_tablet) ? 'true' : 'false')?>;
  </script>
<!--  <script src="js/script.js?v=--><?//=$random_number_for_disabling_cache?><!--"></script>-->
  <script src="js/lib.js"></script>
  <script src="js/script.js"></script>
  <script src="//localhost:35729/livereload.js"></script>

</body>