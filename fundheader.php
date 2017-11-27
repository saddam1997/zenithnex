<?php 
include_once('common.php');
page_protect();
if(!isset($_SESSION['user_id']))
{
  header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
$postData = array(
  "userMailId"=> $user_session

  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


$response1 = file_get_contents($url_api.'/usertransaction/getBalBTC', FALSE, $context);
$response2 = file_get_contents($url_api.'/usertransaction/getBalBCH', FALSE, $context);
$response3 = file_get_contents($url_api.'/usertransaction/getBalGDS', FALSE, $context);
$response4 = file_get_contents($url_api.'/usertransaction/getBalEBT', FALSE, $context);

if($response1 === FALSE){
  die('Error');
}
if($response2 === FALSE){
  die('Error');
}
if($response3 === FALSE){
  die('Error');
}
if($response4 === FALSE){
  die('Error');
}




$responseData1 = json_decode($response1, TRUE);
$responseData2 = json_decode($response2, TRUE);
$responseData3 = json_decode($response3, TRUE);
$responseData4 = json_decode($response4, TRUE);




if(isset($responseData1['user']))
{

  $btc_balance = $responseData1['user']['BTCbalance'];
  
  
}
if(isset($responseData2['user']))
{

  
  $bcc_balance = $responseData2['user']['BCHbalance'];
  
  

  
}
if(isset($responseData3['user']))
{

  
  $gds_balance = $responseData3['user']['GDSbalance'];
  
  

  
}
if(isset($responseData4['user']))
{

  
  $ebt_balance = $responseData4['user']['EBTbalance'];
 
}


?>
<?php
include 'header.php';
?>
<div class="col-md-3">
  <div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <div class=" text-center h4" >BTC</div>
          <div class=" ">
            <p class="text-center">Balance: <?php echo $btc_balance; ?> BTC</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposit" ><a href="addressbtc.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="sendgetbtc.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="History" ><a href="fundstransactionbtc.php" id="btnreceived">-></a></button> 
          </div>
        </div>
        </li>
        
        <li class="nav-item">
          <hr>
          <div class="text-center h4">BCH</div>
          <div class="">
            <p class="text-center">Balance: <?php echo $bcc_balance ; ?> BCH</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposit" ><a href="addressbcc.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="sendgetbcc.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="History" ><a  href="fundstransactionbcc.php" id="btnreceived">-></a></button> 
          </div>
        </div>
        </li>
        
        <li class="nav-item">
          <hr>
          <div class="h4 text-center" >EBT</div>
          <div class=" ">
            <p class="text-center">Balance: <?php echo $ebt_balance; ?> EBT</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposite" ><a  class="" href="addressebt.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a  class="" href="sendgetebt.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="History" ><a  class="" href="fundstransactionebt.php" id="btnreceived">-></a></button> 
          </div>
        </div>
        </li>

        <li class="nav-item">
          <hr>
          <div class="h4 text-center">GDS</div>
          <div class=" ">
            <p class="text-center">Balance: <?php echo $gds_balance; ?> GDS</p>
            <div class="text-center">
            <button data-toggle="tooltip" title="Deposit" ><a href="addressgds.php" id="btnreceived">+</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="sendgetgds.php" id="btnsend">-</a></button>
            <button data-toggle="tooltip" title="Withdraw" ><a href="fundstransactiongds.php" id="btnreceived">-></a></button> 
          </div>
        </div>
          
        </ul>

      </nav>
    </div>
          
            
</div>

