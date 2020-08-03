<?php
$userid = $_GET['id'];
$gender="";
include('doctorServer.php');
session_start();
if(isset($_SESSION['mail'])){

    //get appointements and user informations informations with the current doc id
    $get_user_info = "SELECT * FROM users INNER JOIN patient_medical_record ON users.id=patient_medical_record.id_user
INNER JOIN social_details ON social_details.id_user=patient_medical_record.id_user INNER JOIN adress ON adress.id_addr=patient_medical_record.id_addr
WHERE users.id='$userid'";
    $result_info = mysqli_query($db, $get_user_info);
    $row = mysqli_fetch_assoc($result_info);
    if($row["gender"] == "1"){
        $gender="male";
    }else{
        $gender="female";
    }

}
$_SESSION['adresse'] = $row["number"];
$_SESSION['adresse'] .= '&nbsp;';
$_SESSION['adresse'] .= $row["street"];
$_SESSION['adresse'] .= '&nbsp;';
$_SESSION['adresse'] .= $row["zipcode"];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/png" href="Static/images/doctor.png"/>
    <title>User Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/cover/">

    <!-- Bootstrap core CSS -->
    <link href="Static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->

</head>

<body class="text-center">
<div href="#_" class="lightbox" id="map-container"><?php
include 'map.php';
?>
</br>
</br>
</br>
<a href="#_">Fermer</a>
</div>
<?php echo '

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                


				</div>
				
                
                
            </div>
			
            <div class="col-md-6">
	
                <div class="profile-head">
                    <h5>
                        '.$row["firstname"].' '.$row["lastname"].'
                    </h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Record</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <a href="doctorIndex.php"><input type="button" class="profile-edit-btn" value="Back to home"/></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
			</br>
				<a href="#map-container">
					<img class="geo-button" src="Static/images/placeholder.png" class="thumbnail">
				</a>
                <div class="profile-work">
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Firstname</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["firstname"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Lastname</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["lastname"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["email"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>+33'.$row["phonenum"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Social Security Number</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["socialsecuritynumber"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Adress</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["number"].' '.$row["street"].' '.$row["zipcode"].'</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Weight</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["weight"].' kg</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Height</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["height"].' cm</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$gender.'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Birth location</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["birthaddr"].'</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Birthdate</label>
                            </div>
                            <div class="col-md-6">
                                <p>'.$row["birthdate"].'</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>'?>
<footer class="mastfoot mt-auto text-center">
    <div class="inner">
        <p class="text-white">&copy; 2020 <a href="index.php">Aled</a>.  All rights reserved.</p>
    </div>
</footer>
<style>body{
        background: -webkit-linear-gradient(left, #333333, #333333);
		margin: 0; 
		padding: 0;
    }
	#mapcontainer { margin: auto; width: 100px; }
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
	.geo-button{
		width:70%;
		height:80%;
	}
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .profile-edit-btn{
        border: none;
        border-radius: 1.5rem;
        width: 70%;
        padding: 2%;
        font-weight: 600;
        color: #6c757d;
        cursor: pointer;
    }
    .proile-rating{
        font-size: 12px;
        color: #818182;
        margin-top: 5%;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }
    .profile-work{
        padding: 14%;
        margin-top: -15%;
    }
    .profile-work p{
        font-size: 12px;
        color: #818182;
        font-weight: 600;
        margin-top: 10%;
    }
    .profile-work a{
        text-decoration: none;
        color: #495057;
        font-weight: 600;
        font-size: 14px;
    }
    .profile-work ul{
        list-style: none;
    }
    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
	.lightbox {
	/** Default lightbox to hidden */
	display: none;

	/** Position and style */
	position: fixed;
	z-index: 999;
	width: 100%;
	height: 100%;
	text-align: center;
	top: 0;
	left: 0;
	background: rgba(0,0,0,0.8);
}

.lightbox img {
	/** Pad the lightbox image */
	max-width: 90%;
	max-height: 80%;
	margin-top: 2%;
}

.lightbox:target {
	/** Remove default browser outline */
	outline: none;

	/** Unhide lightbox **/
	display: block;
}</style>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="Static/js/jquery.min.js"</script>
<script>window.jQuery || document.write('<script src="Static/js/jquery.min.js"><\/script>')</script>
<script src="Static/js/popper.min.js"></script>
<script src="Static/js/bootstrap.min.js"></script>

</body>
</html>
