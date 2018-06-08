<?php
include "database.php";
include 'time.php';
session_start();
$other_poll_id=$_POST['poll_id'];
echo $other_poll_id;
//-----------Fetching Data------------------------------
	$que="SELECT * FROM `polldetail`  WHERE poll_id=$other_poll_id";
	$res = mysqli_query($con,$que);
	$rec=mysqli_fetch_array($res);
	$q3="SELECT * FROM `signup` WHERE emobile='{$rec['emobile'] }'";
	$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
	$rowc=mysqli_fetch_assoc($c);
	

	//---------------CHECKING POLLED OR NOT---------------------------------
		
	$que="SELECT * FROM `poller` WHERE emobile='{$_SESSION['emobile']}'  AND poll_id=$other_poll_id";
		$res1=mysqli_query($con,$que) OR die(mysqli_error($con));
		$polled=mysqli_num_rows($res1);
		if($polled==0)
		{
		
echo '
		<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="images/head.png" class="media-object img-circle custom-border-1" style="width: 4rem">
                </div>
                <div class="media-body">
                    <h4 class="media-heading">John Doe</h4>
                    <p style="font-size: smaller;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span>'. poll_time($rec['time'])'.</p>
                </div>
                <div class="media-right">
                    <a href="#"><span class="pentapoll-icon icon-penta-loc" style="font-size: x-large"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <p class="question">'.$rec['question'] .'</p>
                <div class="question-image">
                    <img class="img-responsive" src="images/og.jpg"/>
                </div>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
                        <label for="q1op1">&nbsp;'.$rec['option1'] .'</label>
                    </div>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <label for="q1op2">&nbsp;'.$rec['option2'] .'</label>
                    </div>
				'.	
			if($rec['option3']!='')
			{
			.'
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <label for="q1op3">&nbsp;'.$rec['option3'] .'</label>
                    </div>
			'.		
			}
			.'
                </div>
                <div class="row text-center">
			'.		
					if($rec['option4']!='')
			{
			.'
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <label for="q1op4">&nbsp;'.$rec['option4'] .'</label>
                    </div>
					'.
					}
					if($rec['option5']!='')
					{
					.'
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <label for="q1op5">&nbsp;'.$rec['option5'] .'</label>
                    </div>
			'.			
			}
			'.
                    <div class="col-lg-4 col-md-4 col-xs-4">

                    </div>
                </div>
            </div>
        </div>
     </div>

 ';



	
		}
		?>