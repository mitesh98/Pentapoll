<?php
include 'database.php';
?>
<script type="text/javascript" src="jquery.js"></script>
<?php
$query="SELECT * FROM signup WHERE emobile='{$_POST['email']}'"; 
$result = mysqli_query($con,$query);
$rowcount=mysqli_num_rows($result);
//$record=mysqli_fetch_array($result);
if($rowcount<1)
{
echo "You have not been registered";
}
else
{
	$row=mysqli_fetch_assoc($result);
	//---------------function for generating random text-----------
	
	
	function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


$password= generateRandomString();

	
	
	
	//$password=base64_encode($row['password']);
	//--------------------------EMAIL RANDOM TEXT--------------------------
	
	error_reporting(E_ALL);
	require("PHPMailer_5.2.4/class.phpmailer.php");

	$mail=new PHPMailer();

	$mail->IsSMTP();
	$mail->SMTPDebug=0;
	$mail->From="support@pentapoll.com";
	$mail->FromName="Pentapoll";
	$mail->Host="smtp.zoho.com";
	$mail->SMTPSecure="ssl";
	$mail->Port=465;
	$mail->SMTPAuth=true;
	$mail->Username="support@pentapoll.com";
	$mail->Password="nmk2nizam1996";
	$mail->AddAddress($_POST['email'],$_POST['email']);
	$mail->AddReplyTo("support@pentapoll.com","Pentapoll");
	$mail->WordWrap=50;
	//$mail->AddAttachment(""
	//$mail->
	$mail->IsHTML(true);
	$mail->Subject='Pentapoll';
	$mail->Body="Here is your text  <br>".$password."  <br>Enter it to set password";
	$mail->Send();
	
//----------------------------------------------------------------
	
	
	
	
	//--------------------------------------------------------------
	echo "Go to mail and click on link to reset password";
	echo '<div id="text_varify_div">
			<input type="text" name="varify_text" id="varify_text" placeholder="Enter recieved text" required>
			<input type="submit" id="varify_btn" name="varify_btn" value="varify">
			</div><div id="text_error"></div>';

	?>

<script>
	var email='<?= $_POST['email']?>';
	var password='<?= $password ?>';
	$("#varify_btn").click(function(){
		var text=$("#varify_text").val();
	
	$.post("varify_text.php",{text:text,password:password,email:email},function(data){
		$("#text_error").html(data);
	 });
	});

</script>

<?php
	}
?>



