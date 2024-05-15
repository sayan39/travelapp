<?php
session_start();
if(isset($_POST['signin']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
} else{
	
	echo "<script>alert('Invalid Details');</script>";

}

}

?>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:5%">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
						</div>
						<div class="modal-body modal-spa" >
							<div class="login-grids">
								<div class="login">
										
									<div class="login-right" style="float:left;margin-left:150px">
										<form method="post" >
											<h3>Signin with your account </h3>
												<input type="text" name="email" id="email" placeholder="Enter your Email"  required="">	
												<input type="password" name="password" id="password" placeholder="Password" value="" required="">	
											<!-- <h4><a href="forgot-password.php">Forgot password</a></h4> -->
											
											<input type="submit" name="signin" value="SIGNIN">
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
								<!-- <h4 style="text-align: center;margin-top:20px">New User Registration <a href="#" data-toggle="modal" data-target="#myModal" class="btn-primary btn" >Click Here</a></h4> -->
							</div>
						</div>
					</div>
				</div>
			</div>