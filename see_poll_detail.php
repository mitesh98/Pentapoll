<?php
include "database.php";
include 'time.php';
session_start();
$other_poll_id=$_POST['poll_id'];
//-----------Fetching Data------------------------------
	
	$q3="SELECT * FROM `signup` WHERE emobile={$rec['emobile'] }";
	$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
	$rowc=mysqli_fetch_assoc($c);
	$que="SELECT * FROM `polldetail`  WHERE poll_id=$other_poll_id";
	$res = mysqli_query($con,$que);
	$rec=mysqli_fetch_array($res);

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

 .';



	
		}
		else
		{
	//-------------------
	$query="SELECT * FROM `count` WHERE poll_id=$other_poll_id";
	$result = mysqli_query($con,$query);
	$record=mysqli_fetch_array($result);
	
	

//----------------------POLL DETAIL------------------------------------------->
?>
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 custom-padding-1" id="main-content">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?=$rowc['pic'] ?>" class="media-object img-circle custom-border-1" style="width: 4rem">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $rowc['username']?></h4>
                    <p style="font-size: smaller;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($rec['time']);?></p>
                </div>
                <div class="media-right">
                    <a href="#"><span class="pentapoll-icon icon-penta-loc" style="font-size: x-large"></span></a>
                </div>
            </div>
            <div class="panel-body">
                <p class="question"><?=$rec['question'] ?></p>
                <div class="question-image">

					<!----------------------------------GRAPH----------------------------------------------->
					<div class="graph">
					<html>
  <head>
	  
    <!--Load the AJAX API-->
	 

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <div id="chart_div<?= $other_poll_id?>"></div>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['<?= $rec['option1'] ?>', <?= $record['opt1count'] ?>],
          ['<?= $rec['option2'] ?>', <?= $record['opt2count'] ?>],
          ['<?= $rec['option3'] ?>', <?= $record['opt3count'] ?>],
          ['<?= $rec['option4'] ?>', <?= $record['opt4count'] ?>],
          ['<?= $rec['option5'] ?>', <?= $record['opt5count'] ?>]
        ]);

 
	//var chartwidth = $('.question-image').width();
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $other_poll_id ?>'));
        chart.draw(data, options);
        var options = {
  width: 400,
  height: 400,
  title: 'Result',
  colors: ['#008083', '#006766', '#004B4E', '#86B6B6', '#66B1B4']
};

chart.draw(data, options);


      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    
  </body>
</html>
						</div>
                    <img class="img-responsive" src="<?=$rec['poll_pic'] ?>"/>
                </div>
               
               
            </div>
           <a id="share_see_more">see more..</a>
			<a href="index.php">See more polls...</a>
        </div>
		
     </div>

	<script>
	graph =1;
	$(".img-responsive").hide();
	$("#share_see_more").click(function(){
	if(graph==1)
	{
	graph=0;
	$(".graph").hide();
	$(".img-responsive").show();
	}
	else if(graph==0)
	{
	graph=1;
	$(".img-responsive").hide();
	$(".graph").show();
	}
	});
	
	</script>

