 
<?php
session_start();
$isTouch = isset($_SESSION['emobile']);
if(!$isTouch)
{
	header('Location: signup.php');
}
else 
{
include "database.php";



//--------------------------------SEARCH SUGGESTION---------------------------------------------------->
if(isset($_POST["entered_char"]))
{
	$output='';
	$query="SELECT * FROM `polldetail` WHERE tag LIKE '%".$_POST["entered_char"]."%'";
//echo $q;
	$result=mysqli_query($con,$query) OR die(mysqli_error($con));
	if(mysqli_num_rows($result)>0)
	{
		$output .='<datalist id="search-list">';
		
		while($row=mysqli_fetch_array($result)) 
		{
		$output .='<option value="'.$row["tag"].'">';
		}
	}
	else
	{
	$output .='<option value="Poll of this tag not found">';
	}
  $output .='</datalist>';

echo $output;
}
?>

<!--<option value="Cusat">
	
    









	
	
	
	
	
	
	
	
	
}	
	
	
	
	
?>