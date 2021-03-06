<?php
include_once('common.php');

/*page_protect();
if(!isset($_SESSION['user_id']))
{
    header("location:logout.php");
}*/

@$user_email = $_SESSION['user_session'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BTG wallet">
    <meta name="author" content="Bitcoin cash Foundation">
    <meta name="keyword" content="BTG Wallet, bitcoin cash, bitcoin, wallet, bcc, bch, btc bch">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>ZenithNEX </title>

    <!-- Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

    <link href="css/simple-line-icons.css" rel="stylesheet">
    <!-- MDL LIB -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
     <script type="text/javascript" src="js/sails.io.js"></script>
     <script type="text/javascript">
        io.sails.url = 'http://199.188.206.184:1337';
        url_api='http://199.188.206.184:1337';
    </script>
    <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.highcharts.com/stock/highstock.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
    <!-- Main styles for this application -->

    <link href="css/style.css" rel="stylesheet">
    <link href="./assets/css" rel="stylesheet">

<link rel="stylesheet" href="./assets/bootstrap.min.css">
<link rel="stylesheet" href="./assets/website.css">

</head>


<body >
   <header class="app-header navbar hidden-xs hidden-sm">
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav ml-auto">
             <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="fundstransactionbtc.php"> FUNDS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="trade.php"> TRADE </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" role="button" data-toggle="collapse" href="#allMarkets" aria-expanded="false" aria-controls="collapseExample">
                                  MARKET&nbsp;<span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="settingnew.php">SETTING</a>
                            </li>

                            <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="contactnew.php">CONTACT US</a>
                            </li>
                          <?php
                            if (@$_SESSION['user_admin'] == 1) {
                                ?>
                                <li  class="nav-item" id="ms6">
                                    <a class="nav-link" href="admin_user.php" class="collapsible-header">
                                        <img src="img/user.png"> User list</a></li>
                                        <?php
                            }
                                    ?>
            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle" style="font-size: 20px;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_email;?></a>
                <a class="dropdown-item" href="setting.php"><i class="fa fa-lock" aria-hidden="true"></i> Setting</a>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <!-- admin access -->
                    <?php
                    if ($_SESSION['user_admin'] == 1) {
                        ?>
                        <a  class="dropdown-item" href="admin_user.php"><i class="fa fa-lock"></i>User list</a>
                        <?php
                    }
                    ?>
                </div>
            </li>
        </ul>
 </header>

  <div class="app-header navbar navbar visible-xs visible-sm">
 <div class="navbar-header"><a class="navbar-brand" href="#"></a>
    
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
    </div>
    <div class="navbar-collapse collapse">
       <ul class="nav navbar-nav ml-auto">
             <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="fundstransactionbtc.php"> FUNDS</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="trade.php"> TRADE </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" role="button" data-toggle="collapse" href="#allMarkets" aria-expanded="false" aria-controls="collapseExample">
                                  MARKET&nbsp;<span class="caret"></span>
                                </a>
                            </li>
                            <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="setting.php">SETTING</a>
                            </li>

                            <li class="nav-item nav-dropdown">
                                <a class="nav-link" href="contactus.php">CONTACT US</a>
                            </li>
                          <?php
                            if (@$_SESSION['user_admin'] == 1) {
                                ?>
                                <li  class="nav-item" id="ms6">
                                    <a class="nav-link" href="admin_user.php" class="collapsible-header">
                                        <img src="img/user.png"> User list</a></li>
                                        <?php
                            }
                                    ?>
            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle" style="font-size: 20px;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href=""><i class="fa fa-user" aria-hidden="true"></i> <?php echo $user_email;?></a>
                <a class="dropdown-item" href="setting.php"><i class="fa fa-lock" aria-hidden="true"></i> Setting</a>
                <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    <!-- admin access -->
                    <?php
                    if ($_SESSION['user_admin'] == 1) {
                        ?>
                        <a  class="dropdown-item" href="admin_user.php"><i class="fa fa-lock"></i>User list</a>
                        <?php
                    }
                    ?>
                </div>
            </li>
        </ul>
</div>
</div>
 <div class="collapse" id="allMarkets">
    <div class="bg-default">
      <div class="row  "  >
          <!-- <div class="col-2 text-center no-padding border-right">
            
            <a href="#" title="Bitcoin">
               <div class="col-sm-1 name">
                    BTC 
                 </div>
          </div> -->
           <div class="col-2 no-padding border-right">
             <img src="img/bch.png" alt="">
              <a href="markettrade.php" title="Bitcoin Cash">
                 <div class="col-sm-1 name">
                    BCH
                 </div>
                 <div class="col-sm-6 price text-right"><span id="ask_current_BCH"></span></div>
                 <!-- <div class="col-sm-4 delta">1.8%</div> -->
             </a>
          </div>
          <div class="col-2 no-padding border-right">
           <img src="img/gdscoin.png" alt="">
            <a href="gds.php" title="Goods Coin"> 
                <div class="col-sm-1 name">
                     GDS
                </div>
                <div class="col-sm-6 price text-right"><span id="ask_current_GDS"></span></div>
                <!-- <div class="col-sm-4 delta">1.8%</div> -->
            </a>
          </div>
          <div class="col-2 no-padding">
           <img src="img/EBTcoin1.png" alt="">
            <a href="ebt.php" title="EBT Coin">
                <div class="col-sm-1 name">
                    EBT
                </div>
                <div class="col-sm-6 price text-right"><span id="ask_current_EBT"></span></div>
                <!-- <div class="col-sm-4 delta">1.8%</div> -->
            </a>
          </div>

      </div>
    </div>
  </div>
  <!--Main content-->
<main class="main">
 