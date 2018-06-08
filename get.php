<?php
include "database.php";
//echo "Hello";
if(isset($_GET['offset']) && isset($_GET['limit']))
{
	$limit=$_GET['limit'];
	$offset=$_GET['offset'];
	$q="SELECT * FROM `polldetail` ORDER BY `serial_number`  LIMIT {$limit} OFFSET {$offset}";
	$a=mysqli_query($con,$q) OR die(mysqli_error($con));
	while($row=mysqli_fetch_assoc($a)) 
	{
		$poll_id=$row['poll_id'];
		$poll_creator_id=$row['user_id'];
		$question=$row['question'];
	//if($question!="")
	//{
		$q2="SELECT * FROM `polldetail` WHERE poll_id=$poll_id ";
		$b=mysqli_query($con,$q2) OR die(mysqli_error($con));
		$rowb=mysqli_fetch_assoc($b);
		echo $rowb['poll_pic'];
	//echo $row['question'];
	
		$q3="SELECT * FROM `signup` WHERE `user_id`=$poll_creator_id ";//change $poll_id to $ user_id after new data feed
		$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
		$rowc=mysqli_fetch_assoc($c);
		?>
		
       
    <!--get_poll_id(<?php //echo $row['poll_id'];?>) </form>-->
	
  
	<div id="<?php echo "result".$row['poll_id'] ?>"></div> 
	</div>	


	
</div>
<!-------------------------------------------TESTING----------------------->
<div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?php echo $rowc['pic'];?>" class="media-object img-circle custom-border-1" style="width: 4rem">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $rowc["username"] ?></h4>
                    <p style="font-size: small;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span>2 hours 42 minutes</p>
                </div>
                <div class="media-right">
                    <span class="glyphicon glyphicon-tag" style="font-size: x-large"></span>
                </div>
            </div>
            <div class="panel-body">
                <p class="question"><?php echo $question; ?></p>
                <div class="question-image">
                    <img class="img-responsive" src="<?php echo $rowb['poll_pic'];?>"/>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
						<input type="hidden" id="poll_id" name="poll_id" value="<?php echo $row['poll_id']?>" /> 
						
                        <input type="radio" id="poll_option" name="option" value="1" onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;" ><label for="q1op1">&nbsp;<?php echo $rowb["option1"] ?></label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option" name="option" value="2" onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;"><label for="q1op2">&nbsp;<?php echo $rowb["option2"] ?></label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option" name="option" value="3" onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;"><label for="q1op3">&nbsp;<?php echo $rowb["option3"] ?></label>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option" name="option" value="4"  onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;"><label for="q1op4">&nbsp;<?php echo $rowb["option4"] ?></label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option" name="option" value="5"  onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;"><label for="q1op5">&nbsp;<?php echo $rowb["option5"] ?></label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">

                    </div>
                </div>
            </div>
            <div class="panel-footer text-center" style="border:none;"><button class="custom-button-1">Poll it !</button></div>
        </div>



</body>

 </html>

	<?php
}
	

?>		
<?php
} 
?>




