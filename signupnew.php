<?php
error_reporting(1);
include_once('common.php');
require_once 'googleLib/GoogleAuthenticator.php';
$ga = new GoogleAuthenticator();
$secret = $ga->createSecret();
if(isset($_POST['btnsignup']))
{
//  var_dump($_POST);
  $email_id = $_POST['txtEmailID'];
  $password = $_POST['signuppassword'];
  $confirmpassword = $_POST['confirmpassword'];
  $spendingpassword = $_POST['spendingpassword'];
  $confirmspendingpassword = $_POST['confirmspendingpassword'];
  $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
  $confirmpassword_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $confirmpassword);
  $spendingpassword_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $spendingpassword);
  $confirmspendingpassword_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $confirmspendingpassword);

if($password_check && $confirmpassword_check && $spendingpassword_check && $confirmspendingpassword_check >0)
{

$postData = array(
  "email"=> $email_id ,
  "password" =>$password,  
  "confirmPassword"=> $confirmpassword,
  "spendingpassword"=> $spendingpassword,
  "confirmspendingpassword"=> $confirmspendingpassword,
  "googlesecreatekey"=>$secret
  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


$response = file_get_contents($url_api.'/user/createNewUser', FALSE, $context);

if($response === FALSE){
  die('Error');
}


$responseData = json_decode($response, TRUE);



if(isset($responseData['userMailId']))
{
  $message = $responseData['message'];

  header("location:loginnew.php?m=".$message);
}
else
{
  $error = $responseData['message'];
}

}
else
{
  $errorpassword = "Enter valid password";
}
}
?>

<!-- saved from url=(0030)https://www.luno.com/en/signup -->
<html lang="en" class="gr__luno_com"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>

<title>Sign up | ZenithNEX</title>


<script type="text/javascript" async="" src="./assets/recaptcha__en.js.download"></script><script type="text/javascript" async="" src="./assets/insight.min.js.download"></script><script async="" src="./assets/analytics.js.download"></script><script src="./assets/bugsnag-3.min.js.download" data-apikey="3cc67afdb6dd450441bc9023b5262f26" data-appversion="677a6f8"></script>




<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">

<link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-152x152.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-144x144.png">
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-120x120.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-114x114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-72x72.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/favicon-16x16.png">
<meta name="theme-color" content="#12326B">



<link rel="alternate" hreflang="en" href="https://www.luno.com/en/signup">
<link rel="alternate" hreflang="id" href="https://www.luno.com/id/signup">


<meta name="description" content="Click here to get a secure, free Bitcoin wallet in seconds.">


<meta property="og:locale" content="en">
<meta property="og:type" content="website">
<meta property="og:title" content="Sign up | Luno">


<meta property="og:site_name" content="Luno">
<meta property="og:image" content="https://d32exi8v9av3ux.cloudfront.net/web/677a6f8/website/common/img/default_og_image.png">



<link href="./assets/css" rel="stylesheet">
<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">

<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-39013173-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>



<link href="./assets/css(1)" rel="stylesheet">
</head>
<body id="o-wrapper" class="o-wrapper ln-account-body" data-gr-c-s-loaded="true" style="background-image: url(img/bg22.jpg) !important;">
 

<nav class="navbar navbar-fixed-top ln-navbar">

  <div class="container-fluid page-banner collapse">
    ZenithNEX
    <a href="ZenithNEX.com/blog/en/">Read more</a>
    <a href="ZenithNEX.com" class="close">×</a>
  </div>

  <div class="container-fluid">
    <div class="navbar-header">
      <a id="sidenav-button--slide-left" class="ln-menu sidenav-button--slide-left" href="javascript:void(0)">
        
        <svg height="24" class="visible-xs" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
        </svg>
      </a>
      <a class="ln-logo" href="#">
        
        <img class="logo-dark hi" src="img/logo.png" />
      </a>
    </div>
    <div class="hidden-xs">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="market.php">MARKET</a></li>
        <li><a href="#">SUPPORT</a></li>
        <li><a href="loginnew.php" class="btn btn-primary ln-btn-sm">SIGN IN</a></li>
        <li><a href="signupnew.php" class="btn btn-primary ln-btn-sm">SIGN UP</a></li>
      </ul>
 
    </div>
  </div>
</nav>


    
<nav id="sidenav-menu--slide-left" class="sidenav-menu sidenav-menu--slide-left " >
  <div class="ln-sidenav-top">
    <a href="javascript:void(0)" class="sidenav-menu__close ln-close">
      
      
    </a>
    <a class="btn btn-primary ln-btn-primary" href="signupnew.php">Get Started</a>
  </div>
  
    <ul class="nav">
      <li class="nav-item">
        <a href="market.php">MARKET</a>
      </li>
      <li class="nav-item">
        <a href="#">SUPPORT</a>
      </li>
      <li class="nav-item">
        <a href="loginnew.php">SIGN IN</a>
      </li>
      <li class="nav-item">
        <a href="signupnew.php">SIGN UP</a>
      </li>
      
    </ul>
  </div>

  
 
  
  
</nav>
<div id="sidenav-mask" class="sidenav-mask"></div>


<div class="ln-account-wrapper">


  <noscript>
    &lt;p class="alert alert-warning"&gt;
    This page requires Javascript to be enabled.
    &lt;/p&gt;
  </noscript>

  <div ng-app="authApp" class="ng-scope">
    <div class="section ln-signup">
      <h1 class="ng-binding">Sign up</h1>

     
      <p style="color:red;"> <?php if(isset($error)) {echo $error; }?> </p>
      <p style="color:red;"> <?php if(isset($errorpassword)) {echo $errorpassword; }?> </p>

      <form method="post" autocomplete="off" class="ng-pristine ng-valid-email ng-invalid ng-invalid-required ng-valid-maxlength ng-valid-pattern ng-invalid-recaptcha">

        <div class="form-group">
          <input type="email" ng-model="vm.email"  name="txtEmailID" placeholder="Enter email address" class="form-control ng-pristine ng-untouched ng-empty ng-valid-email ng-invalid ng-invalid-required ng-valid-maxlength" ng-readonly="vm.emailReadonly()" maxlength="254" required="">
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password" name="signuppassword" placeholder="Password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"  required="">
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password" name="confirmpassword" placeholder="Confirm password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"  required="">
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password"  name="spendingpassword" placeholder="Spending password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"  required="">
        </div>

        <div class="form-group password ng-scope" ng-if="!vm.socialSignup">
          <input type="password" id="input-password" ng-model="vm.password" name="confirmspendingpassword" placeholder="Confirm Spending Password" class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern" required="">
        </div>


    <!-- <div class="ln-captcha">
      <div class="g-recaptcha ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" vc-recaptcha="" ng-model="vm.recaptcha" key="vm.recaptchaPublicKey"><div style="width: 304px; height: 78px;"><div><iframe src="./assets/anchor.html" title="recaptcha widget" width="304" height="78" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
    </div> -->

    <p class="ln-hint-paragraph ng-binding" ng-bind-html="vm.messages.msgAgreeToTerms | trustedHtml">By signing up you agree to our<br><a href="" target="_blank">Terms of Use</a> and <a href="" target="_blank">Privacy Policy</a>.</p>

    <button type="submit"  name="btnsignup" class="btn btn-primary ln-btn-sm ng-binding">Sign up</button>

    <div class="ln-account-secondary-actions">
      <a class="ng-binding" href="loginnew.php">Sign in</a>
    </div>
  </form>
</div>

</div>

</div>





<script src="./assets/deps.min.js.download"></script>
<script src="./assets/website.js.download"></script>
<script>
  initPageBanner();
  initNavScroll();
  initSideNav();
  initForms();
  initFooter();
  LunoAuth.auth();
</script>

<script src="./assets/saved_resource" type="text/javascript"></script><script src="https://px.ads.linkedin.com/collect/?time=1509625937241&amp;pid=72903&amp;url=https%3A%2F%2Fwww.luno.com%2Fen%2Fsignup&amp;pageUrl=https%3A%2F%2Fwww.luno.com%2Fen%2Fsignup&amp;ref=https%3A%2F%2Fwww.luno.com%2F&amp;bzid=5c81349b-b7dc-494c-a3fb-ccb233460dee&amp;cksm=56EFF8485AB41F0C&amp;fmt=js&amp;s=1" type="text/javascript"></script><img src="https://secure.adnxs.com/seg?t=2&amp;add=7326042,7326073,7326113,7326428,6991857,6991938,7324346,7324354,7324358,6992021,7326877,7323986,7324058,7326543,7323981,7326047&amp;redir=https%3A%2F%2Fsecure.adnxs.com%2Fseg%3Fadd%3D%26add_code%3Dwww_luno_com%2Cluno_com%26member%3D232%26redir%3Dhttps%253A%252F%252Fimp2.ads.linkedin.com%252Fl" width="1" height="1" border="0" alt="" style="display: none !important;"><script async="" defer="" src="./assets/api.js.download"></script><div style="background-color: #fff; border: 1px solid #ccc; box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2); position: absolute; left: 0px; top: -10000px; transition: visibility 0s linear 0.3s, opacity 0.3s linear; opacity: 0; visibility: hidden; z-index: 2000000000;"><div style="width: 100%; height: 100%; position: fixed; top: 0px; left: 0px; z-index: 2000000000; background-color: #fff; opacity: 0.05;  filter: alpha(opacity=5)"></div><div class="g-recaptcha-bubble-arrow" style="border: 11px solid transparent; width: 0; height: 0; position: absolute; pointer-events: none; margin-top: -11px; z-index: 2000000000;"></div><div class="g-recaptcha-bubble-arrow" style="border: 10px solid transparent; width: 0; height: 0; position: absolute; pointer-events: none; margin-top: -10px; z-index: 2000000000;"></div><div style="z-index: 2000000000; position: relative;"><iframe title="recaptcha challenge" src="./assets/bframe.html" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox" name="eixrxj5kvs6j" style="width: 100%; height: 100%;"></iframe></div></div></body><span class="gr__tooltip"><span class="gr__tooltip-content"></span><i class="gr__tooltip-logo"></i><span class="gr__triangle"></span></span></html>
