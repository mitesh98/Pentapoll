<?php
session_start();

//--------------Database Connection-----------------------------------------------------//

include 'database.php';

//---------------------Changing Password----------------------------------------------------//

echo $_POST['username'];
$username = $_POST['username'];
echo $username;
      $password = sha1($_POST['password']);
echo 'enteredpassword-'$password;
      $newpassword = $_POST['newpassword'];
echo $newpassword;
      $confirmnewpassword = $_POST['confirmnewpassword'];
echo $confirmnewpassword;
$query="SELECT password FROM signup WHERE 
emobile='$username'";
$result = mysqli_query($con,$query);
$record=mysqli_fetch_array($result);
echo 'password-'.$record['password'];
//print_r($result);
	if(!$result)
    {
     echo "The username you entered does not exist";
    }
  else if($password!= $record['password'])
    {
    echo "You entered an incorrect password";
    }
   else if($result)
    {
      if($newpassword==$confirmnewpassword)
      {
		  $newpassword=sha1($newpassword);
        $update="UPDATE signup SET password='$newpassword' where emobile='$username'";
        $sql=mysqli_query($con,$update);
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
      }
      else
      {
      echo "Entered-password and Re-enterd password do not match";
    }
      }

?>













