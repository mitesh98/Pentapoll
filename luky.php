<?php
session_start();
$isTouch = isset($_SESSION['emobile']);
if(!$isTouch)
{
	header('Location: signup.php');
}
else 
{
include 'database.php';
?>
<!--------------------------------------------------------------->

<?php
if($_SESSION['insert1']==1)		//SAVING FROM MULTIPLE RUN
{
	//------------------MAKING UNIQUE USERID-------------------------
	$user_id_unique=0;
	$_SESSION["user_id"]=rand(100000,999999);
	while($user_id_unique==0)
	{
		$query="SELECT `user_id` FROM `signup` WHERE user_id={$_SESSION["user_id"]}";
		$result = mysqli_query($con,$query);
		$rowcount=mysqli_num_rows($result);
		$record=mysqli_fetch_array($result);
		if($rowcount>=1)
		{
		$_SESSION["user_id"]=rand(100000,999999);
		$user_id_unique=0;
		}
		else
			$user_id_unique=1;
	}
	//===================INSERTING DATA==========================
	$q1="insert into signup (user_id,username,emobile,password)values({$_SESSION["user_id"]},'{$_SESSION["username"]}','{$_SESSION["emobile"]}','{$_SESSION["password"]}')";
	mysqli_query($con,$q1)  or die(mysqli_error($con));
	//===================UNSETTING SESSION VARIABLES=============
	$_SESSION['insert1']=0;
	$share_signup = isset($_SESSION['share_poll_id']);
	if($share_signup)
{
	header('Location: share_see_graph.php');
}
}
?>

<!-------------------------------------------------------------->


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pentapoll</title>
    <link rel="icon" href="images/pp.png" type="image/x-icon">
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Are you confused about anything?.Sign up for Pentapoll now and make your first poll.Let the world answer for you and go for the right one.">

  <meta name="keywords" content="poll,confused,question,answer,quest,query,inquiry,decision,vote,signin,login,SignUp,Pentapoll">
  <meta name="author" content="Nizam Nmk">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="signup.css" />
	<script type="text/javascript" src="jquery.js"></script>
	
</head>
<style>
	@media(min-width: 993px){ 
	body{
	background-image: url("images/3.jpg");
    	background-size: cover;
	}
        }
        @media(max-width: 992px){
                body{
              	background-image: url("images/m3.jpg");
    	        background-size: cover;
                }    
        }
</style>
<body>
<nav class="navbar navbar-fixed-top">
    <div class="" style="width: 19rem;margin: 0 auto;">
        <a class="" href="#"><img id="logo" src="images/a.png"/> </a>
    </div>
</nav>
<div class="container">
    <div class="signUpform col-md-4 col-md-offset-8">
        <h2 class="custom-head" style="margin-bottom: .5rem;">Let us know you</h2>
		
        <form action="slup.php" method="post"enctype="multipart/form-data" id="second_form">
			
            <p class=""><img class="img-circle custom-border-2" src = "#" onerror="this.src='images/head.png'" style="width: 10rem;height: 10rem;border:solid teal"/ id="blah" ><br>
				
				<input type='file' id="image" accept="image/jpeg" name="p_pic">
				<a id="p_pic_upload">+Add a profile picture</a></p>
			
            <p class="custom-p" style="margin-bottom: 1rem;"><span>Birthday<br><input class="custom-input" type="date" placeholder="Birthday" value="Birthday" name="bday" id="bday"></p>
            
			<!-----------COUNTRY----------------->	
			<div>
				<div class="col-xs-6">
					<span class="state">Country:</span>
					<br/>
					<select id="countrydd" onChange="change_country()" name="country" style="width:10rem">
					<option>Select Country</option>
					
					<?php
					$res=mysqli_query($con,"SELECT * FROM countries");
					while($row=mysqli_fetch_array($res))
					{
					?>
					<option value="<?php echo $row["id"];?>"><?php echo $row["name"];?></option>
					<?php
					}
					?>
					</select>
				</div>
				<!-------------------------STATE--------------------->
					<div class="col-xs-6">
						<span>State:</span>
						<br/>
						<select id="state" name="state" style="width:10rem"><option>Select</option></select>
						<br/>
					</div>
					<div style="margin-bottom: .5rem;visibility:hidden;">Margin</div>
				
					<div class="col-xs-4 text-center">
						<input type="radio" id="male" name="gender" value="1" checked> <label for="male">Male</label><br>
					</div>
					<div class="col-xs-4 text-center">
						<input type="radio" id="female" name="gender" value="2"> <label for="female">Female</label><br>
					</div>	
					<div class="col-xs-4 text-center">
						<input type="radio" id="other" name="gender" value="3"> <label for="other">Other</label>  
					</div>

				<!-------------->	
				<p><input class="custom-button-1" type="submit" value="Finish" name="next" id="finish_btn"></p>
				<p><a href="slup.php">(Skip)</a> </p>
			</div>
		</form>
    </div>
</div>
</body>
</html>
<!----------------------------------------JAVASCRIPT CODES------------------------------------------->

<script>
	//------------------DISABLE FINISH BUTTON-------------------------
	
 
	
//---------------------CHOOSING PROFILE  PIC-------->
	$("#p_pic_upload").click(function(){
		$("#image").click();	
	});
	
//--------------------------------IMAGE PREVIEW----------
	
	function readURL(input){
	if(input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
   }
   }

   $("#image").change(function() {
   readURL(this);
   });
//--------------------------------------STATE------------------//
	
	function change_country()
{
	var xmlhttp= new XMLHttpRequest();
	xmlhttp.open("GET","statefetching.php?country="+document.getElementById("countrydd").value,false);
	 xmlhttp.send(null);
	document.getElementById("state").innerHTML=xmlhttp.responseText;
}
	//---------------------
</script>

<?php
}
	?>

