<?php
$isTouch = isset($_SESSION['emobile']);
function poll_time($time){
include "database.php";

?>

<?php
date_default_timezone_set('Asia/Kolkata');
$t=time()-$time;
//echo $t-1516235409;
$min=floor($t/60);
$hour=floor($min/60);
$day=floor($hour/24);
$month=floor($day/30);
$year=floor($month/24);
	//echo strtotime($t);
	//echo date("dM Y",1516235409);
if($month>1)
{
	$display_time=date("dM Y",$t);
}
else if($day>0)
{
	$display_time=$day.'day ago';
}
else if($hour>0)
{
	$display_time=$hour.'hour ago';
}
else if($min>0)
{
	$display_time=$min.'min ago';
}
else if($min==0)
{
	$display_time='Just now';
}

return($display_time);


}



?>