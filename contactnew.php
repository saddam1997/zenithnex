<?php
ob_start();
include 'header.php';
include_once('common.php');


page_protect();
if(!isset($_SESSION['user_id']))

{
    header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
$errorcontact = array();
$transactionList = array();

$user_current_balance = 0;
$text_subject = "";
$trans_desc ="";

$client = "";
if(_LIVE_)
{
   
}

if(isset($_POST['btncontact']))
{
    $text_subject = $_POST['text_subject'];
    $user_email = $_POST['user_email'];
    $trans_desc = $_POST['discription'];
    
    
    if (empty($user_email))
    {
        $errorcontact['user_emailError'] = "Please Provide valid Email";
    }   
    
    if (empty($text_subject))
    {
        $errorcontact['text_subjectError'] = "Please Provide valid Subject";
    }
    
    
    
    if (empty($trans_desc))
    {
        $errorcontact['discriptionError'] = "Please Provide valid Message";
    }
    
    if(empty($errorcontact))
    {
        
        sendMailToAdmin(ADMIN_EMAIL, $user_email, $text_subject, $trans_desc);
        
        $errorcontact2['user_emailError'] = "Thank you for contacting us. Your request has been submitted to concern person";
        $user_email= $user_session;
        $text_subject = "";
        $trans_desc ="";
    }   
}
ob_end_flush();
?>
   <style>
hr {
  border:none;
  height: 182px;
border-left: solid 1px #666666;
  
    }
    .form-control {
    display: block;
    width: 100%;
    height: 53px !important;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class=" panel panel-default"> 
                
                <div class="panel-body">
                    
               
            <div class="col-md-5 col-sm-5">
                        <form class="form-signin" method="post">
                            <h2 class="form-signin-heading">Get In Touch</h2>
                            <label for="inputEmail" class="sr-only">Email Address:</label>
                            <input type="email" id="inputEmail" class="form-control" name="user_email" value="<?php echo $user_session;?>" required autofocus><br>
                            <?php if(isset($errorcontact['user_emailError'])) { echo "<br/><span class=\"messageClass\">".$errorcontact['user_emailError']."</span>";  }?>  
                                    <?php if(isset($errorcontact2['user_emailError'])) { echo "<br/><span class=\"messageClass\">".$errorcontact2['user_emailError']."</span>";  }?>

                            <label for="inputEmail" class="sr-only">SUBJECT:</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="Subject" name="text_subject" value ="<?php echo $text_subject;?>"  autofocus><br> <br> 
                            <?php if(isset($errorcontact['text_subjectError'])) { echo "<br/><span class=\"messageClass\">".$errorcontact['text_subjectError']."</span>";  }?>                             
                            
                            <label for="inputPassword" class="sr-only">MESSAGE:</label>
                            <textarea cols="5" rows="10" class="form-control" name ="discription" placeholder="Message" ><?php echo $trans_desc;?></textarea><br>
                            <?php if(isset($errorcontact['discriptionError'])) { echo "<br/><span class=\"messageClass\">".$errorcontact['discriptionError']."</span>";  }?>
                            
                            <button class="btn btn-lg btn-primary btn-block" id="btncontact" name="btncontact" type="submit">Submit</button>
                        </form>
                    
                       
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <hr class=" hidden-xs">
                    or
                    <hr class=" hidden-xs">
                    </div>
                    
                     <div class="col-md-6 col-sm-5">
                         <h2 class="form-signin-heading">Contact us</h2>
                           <div class="col-md-2" style="text-align: center; margin-top: 60px;">
                               <img src="img/phon.png" alt=""> 123456789
                           </div>
                           <div class="col-md-1"></div>
                           <div class="col-md-2" style="text-align: center; margin-top: 60px;">
                               <img src="img/email.png" alt="">support@gmail.com
                           </div>
                     </div>
               </div>
            </div>
           
            
        </div>
         </div>
    </div>
    
</div>


            <?php
            include 'footerz.php';
            ?>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#dropdwan').click(function(){
        $("p").toggle();
      });
});
</script>

     
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
include 'footer.php';
?>

