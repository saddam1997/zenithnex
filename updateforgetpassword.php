<?php 
error_reporting(1);
$email =$_GET['e'];

include_once('common.php');
	//...... Update Current Password......//

if(isset($_POST['btnlogin']))
{

	
	$password = $_POST['signuppassword'];
	$confirmpassword = $_POST['confirmpassword'];

	$postData = array(
		
		"userMailId"=>$email,
		"newPassword"=>$password,
		"confirmNewPassword"=>$confirmpassword
		);

// Create the context for the request
	$context = stream_context_create(array(
		'http' => array(
			'method' => 'POST',
			'header' => "Content-Type: application/json\r\n",
			'content' => json_encode($postData)
			)
		));


	$response = file_get_contents($url_api.'/user/updateForgotPassordAfterVerify', TRUE, $context);

	if($response === FALSE){
		die('Error');
	}


	$responseData = json_decode($response, TRUE);

	if($responseData['statusCode']==200){
		$message = $responseData['message'];
		header("location:loginnew.php");

	}
	else
	{
		$fail = $responseData['message'];

	}
}




?>
<?php 
include 'homeheader.php';
?>
<form action="" method="post">
	<div class="container-fluid">
		<div class="animated fadeIn">
			
		<div class="row justify-content-center" >
			<div class="col-sm-6 col-md-4">
				<div class="card">
					<div class="card-header bg-success" style="padding: 1.5rem;"">
						<strong>Update Fprget Password</strong>
						<div style="float:right;">
						<p style="color:green;"> <?php if(isset($message)) {echo $message; }?> </p>
						<p style="color:red;"> <?php if(isset($fail)) {echo $fail; }?> </p>
						</div>
					</div>
					
					<div class="card-body">
						<div class="form-group">
							<label class="form-form-control-label" for="inputSuccess1">Enter Email</label>
							<input id="email" name="email" autocomplete="off" class="form-control" type="email" value="<?php 
							echo $email ;?>">

						</div>
						<div class="form-group">
							<label class="form-form-control-label" for="inputError1">New Password</label>
							<input  id="signuppassword" name="signuppassword" autocomplete="off" class="form-control" type="password" value="">

						</div>
						<div class="form-group">
							<label class="form-form-control-label" for="inputSuccess1">Confirm New Password</label>
							<input id="confirmpassword" name="confirmpassword" class="form-control" autocomplete="off" type="password" value="">

						</div>

					</div>
					<input type="submit" class="btn btn-info btn-lg text-center" id="btnlogin" name="btnlogin" value="Update"/>
				</div>
			</div>
			<!--/.col-->
			
			<!--/.col-->
		</div>

	</div>
</div>
</form>
<?php 
include 'footer.php';
?>



