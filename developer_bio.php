<?php
  session_start();

  if(!isset($_SESSION['user_session']))
  {

    header('Location:login.php');
  }
?>
<?php



if(isset($_POST["submit"]))
{
		


	if (isset($_FILES["fileToUpload"])) 
	{
				$f_name=$_POST['f_name'];
				$l_name=$_POST['l_name'];
                $fee=$_REQUEST['fee'];
                $skill=$_POST['skill'];
				$exp=$_POST['exp'];
				$dec=$_POST['dec'];
				$mail=$_POST['mail'];
                $phone=$_POST['phone'];
                $field=$_POST['field'];
				$questionCover = $_FILES["fileToUpload"];
				$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
				$bulk = new MongoDB\Driver\BulkWrite;
				$data =[
					"f_name" => $f_name,
					"l_name"=>$l_name,
                    "fee"=>$fee,
                    "skill"=>$skill,
					"v_image" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
                    "exp"=>$exp,
                    "field"=>$field,
					"mail"=>$mail,
                    "phone"=>$phone,
                    "dec"=>$dec
					];
				$bulk->insert($data);
				if( $mng->executeBulkWrite('WebCrate.developer', $bulk))
				{
					header("Location:admin_home.php");
				}
				else
				{
				echo "Unsuccessful";
				}
		}


	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin upload</title>
	<link rel="stylesheet" type="text/css" href="css/venues.css">

<link rel="icon" type="image/png" href="images/logo1.png"/>

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="icon" type="image/png" href="images/logo1.png"/>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/venues.css">

<link rel="stylesheet" type="text/css" href="css/venues.css">

<link rel="icon" type="image/png" href="images/logo1.png"/>

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" href="boostrap/mdb.min.css">
 <link rel="stylesheet" href="boostrap/style1.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

 <link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style2.css" rel="stylesheet">
 
<style>
	#main_box{
		/*box-shadow:3px 3px 7px 1px;*/
		margin-bottom:100px;
	}
</style>
</head>
<body style="background-image:url('img/pexels-edward-eyer-1045541.jpg');background-repeat:no-repeat;position:relative;">





	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
	<div class="col-first mb-5">
                    <h1><strong>DEVELOPER DETAILS</strong></h1>
                    
				</div>
		<div class="container" style="margin-bottom:50px">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				
			</div>
		</div>
	<form  method="POST" action="" enctype="multipart/form-data">
						
	
		<div class="container" id="main_box">
			<div class="row" >
                
				<div class="col-lg-6" >
					
						<div class="login_form_inner" style="margin-top:30px" >
							<div class="hover" >
							<h4>PROFILE IMAGE </h4>
							            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm" style="margin-top:80px">
											<input id="upload" type="file" name="fileToUpload" onchange="readURL(this);" class="form-control border-0" style="background-color:white;box-shadow: 1px 3px 9px 0px;border-radius:33px">
												
          								</div>
										  <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                  
							</div>
						</div>
                </div>
                

				<div class="col-lg-6 mt-5" >
					<div class="login_form_inner" style="padding:50px;background-color:white;box-shadow: 1px 3px 9px 0px;border-radius:23px" >
						
							<div class="row-md-12 form-group" >
								<input type="text" class="form-control" name="f_name" placeholder="First Name" style="width:100%" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" pattern="[a-zA-Z\s]+" minlength="3" required autocomplete="off">
								<h1 id="msg1"></h1>
							</div>
							<div class="row-md-12 form-group">
								<input type="text" class="form-control" name="l_name"   placeholder="Last Name" style="width:100%" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" pattern="[a-zA-Z\s]+" minlength="3" required autocomplete="off">
							</div>
							<div class="row-md-12 form-group">
								<input type="text" class="form-control" name="fee" style="width:100%"   placeholder="Fee" onfocus="this.placeholder = ''" onblur="this.placeholder = 'fee'" pattern="[a-zA-Z0-9]+" minlength="3" required autocomplete="off">
							</div>
							<div class="row-md-12 form-group">
								<input type="text" class="form-control" name="exp"  style="width:100%" placeholder="Experience " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Experience '"  minlength="3" required autocomplete="off">
                            </div>
                            <div class="row-md-12 form-group">
								<input type="text" class="form-control" name="skill"  style="width:100%" placeholder="skills" onfocus="this.placeholder = ''" onblur="this.placeholder = 'skills '" pattern="[a-zA-Z\s,]+" minlength="3" required autocomplete="off">
                            </div>
							<div class="row-md-12 form-group">
								<input type="text" class="form-control" name="field"  style="width:100%" placeholder="Specialization" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Specialization'" pattern="[a-zA-Z\s]+" minlength="3" required autocomplete="off">
							</div>
							<div class="row-md-12 form-group">
								<input type="text" class="form-control" name="mail"  style="width:100%" placeholder="Email" value="<?php echo $_SESSION['user_session'];?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required="required" required="required" autocomplete="off">
							</div>
							<div class="row-md-12 form-group">
								<input type="text" class="form-control" name="phone" style="width:100%" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'"   pattern="^\d{10}$" required autocomplete="off">
                            </div>
                            <div class="form-group">
                                    <textarea class="form-control" name="dec" rows="4" placeholder="Description to display" style="color: #5846f9;"></textarea>
                            </div> 
							<div class="row-md-12 ">
								<button type="submit" name="submit" value="submit"  class=" btn btn-warning" style="width:100%">submit</button>
							</div>
						
					</div>
				</div>
			</div>
		</div>
</form>
	
</section>
	


	<!-- start footer Area -->
    <footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Right place for your businesses to grow.. 
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest updates</p>
						<div class="" id="mc_embed_signup">

						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<p>Follow us in instagram to get the latest updates of your favorite brands.</p>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="https://www.facebook.com/pages/category/Amateur-Sports-Team/CLUB-10-Sports-1021053097973122/"><i class="fa fa-facebook"></i></a>
							<a href="https://www.facebook.com/pages/category/Amateur-Sports-Team/CLUB-10-Sports-1021053097973122/"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> This website is created <i class="fa fa-heart-o" style="color:coral" aria-hidden="true"></i> by <a href="#" target="_blank" style="color:coral">Atul Ashish Xalxo </a>

</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	
        
 <script>

		


 		function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#imageResult')
	                .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$(function () {
	    $('#image_up').on('change', function () {
	        readURL(input);
	    });
	});

	/*  show img name */
	var input = document.getElementById( 'image_up' );
	var infoArea = document.getElementById( 'upload-label' );

	input.addEventListener( 'change', showFileName );
	function showFileName( event ) {
	  var input = event.srcElement;
	  var fileName = input.files[0].name;
	  infoArea.textContent = 'File name: ' + fileName;
	}


	$(document).ready(function(){
		var p_nm=('#pro_name').value;
		$('#pro_name').click(function(){
		$('#msg1').html('this is msg1');
		})
	})
</script>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</html>