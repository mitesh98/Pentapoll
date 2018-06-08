<?php
?>

<?php
	$que="SELECT * FROM `poller` WHERE emobile='{$_SESSION['emobile']}'  AND poll_id='$poll_id'";
		$res=mysqli_query($con,$que) OR die(mysqli_error($con));
		$polled=mysqli_num_rows($res);
		if($polled!=0)
		{
			?>
			<script>

				$("<?='#poll_button'.$poll_id?>").hide();
				$("#poll_pic").hide();

</script>
<?php
		}
																			   
																			   
	//--------------------																		   
		if($polled!=0)
		{
			
			$query="SELECT * FROM `count` WHERE poll_id='{$row['poll_id']}'";
	$result = mysqli_query($con,$query);
	$record=mysqli_fetch_array($result);
			
			$que="SELECT * FROM `polldetail`  WHERE poll_id='{$row['poll_id']}'";
	$res = mysqli_query($con,$que);
	$rec=mysqli_fetch_array($res);
			
		$q3="SELECT * FROM `signup` WHERE `user_id`={$row['user_id'] }";//change $poll_id to $ user_id after new data feed
		$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
		$rowc=mysqli_fetch_assoc($c);
			?>
			
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?= $rowc['pic']?>" onerror="this.src='images/head.png'"  class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem">
                   </div> 
                    <div class="media-body">
                        <h4 class="media-heading"><?= $rowc['username']?></h4>
                        <p style="font-size: small;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($rec['time']);?></p>
                    </div>
                
                <div class="media-right">
                    <span class="pentapoll-icon icon-penta-loc" style="font-size: x-large;"></span>
                </div>
            </div>
            <div class="panel-body">
                <p class="question"><?= $rec['question'] ?></p>
                <div class="question-image" style="max-height:430px;">
                   
					<!----------------------------------------------->
					<?php if($record['totalcount']==0)
					echo "NO rexn on this poll";
					else
					{
					
					
					?>
					<html>
  <head>
	  
    <!--Load the AJAX API-->
	 

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <div id="chart_div<?= $row['poll_id']?>"></div>
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

        // Set chart options
	var chartwidth = $('.question-image').width();
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div<?= $row['poll_id'] ?>'));

        var options = {
  width: chartwidth,
  height: 400,
  title: 'Result',
  colors: ['#008083', '#006766', '#004B4E', '#86B6B6', '#66B1B4']
};

chart.draw(data, options);


      }
    </script>
  </head>

					
					
					
					
				<?php } ?>	
					
					<!----------------------------------------------------->
					
                </div>
			</div>
			
			
			<!--------comment and share buttons--->
			<div class="panel-footer text-center" style="width:100%;margin:auto;border:none;padding:0px">

			<button class="custom-button-1 col-xs-6 col-sm-3 col-sm-offset-3" onclick="var opt=<?= $row['poll_id']?>;$.post('comment.php',{opt:opt},function(data){
$('<?='#comment'.$row['poll_id']?>').html(data);
});">Comment</button>

			<div class="dropup" style="display:inline">
			<button class="custom-button-1 col-xs-6 col-sm-3" data-toggle="dropdown"  onclick="var opt=<?= $row['poll_id']?>;$.post('share.php',{opt:opt},function(data){
$('#share'+Math.floor(option/10)).html(data);
 });" >Share !t</button>
				<?php
				$poll_id=$row['poll_id'];
				?>
 <ul class="dropdown-menu" style="left:-17rem;">
	 
     <li><a target="_blank" href="http://m.facebook.com/sharer.php?u=pentapoll.com/share.php?poll_id=<?=$poll_id ?>""=" id="facebook">Facebook</a></li>
		
    <li><a target="_blank" href="http://twitter.com/share?url=https://www.pentapoll.com/share.php?poll_id=<?=$poll_id ?>" &text=""  added&via="http://dvdrockers.co&amp;related=http://dvdrockers.co&quot;">Twitter</a></li>
		
		
		
    <li><a href="whatsapp://send?text= Are you ready to poll now?cast your vote on *Pentapoll* and find your mind partners.
                                                                                            *Question:* *<?=$rec['question']?>*

                                                                                            *Options:*

                                                                                            *.*<?=$rec['option1']?>
                                                                                            *.*<?=$rec['option2']?>
                                                                                            *.*<?=$rec['option3']?>
                                                                                            *.*<?=$rec['option4']?>
                                                                                            *.*<?=$rec['option5']?>

                                                                                            *Click here to poll:*https://pentapoll.com/share.php?poll_id=<?=$poll_id ?>" "=" id="whatsapp">Whatsapp</a></li>
                                                                                                 
  </ul>
</div>
 

 
 </div>

<div id="<?= 'comment'.$row['poll_id'] ?>"></div>
<div id="<?= 'share'.$row['poll_id'] ?>"></div>

</div>
        </div>
    
<!---------------------------------------------->		

<script>

$("#poll_pic").hide();

</script>
			
<!------------------------------------------------->		
		<?php
			
		}	
																			   
			else if($polled==0) 
			{
		
		$poll_id=$row['poll_id'];
		$poll_creator_id=$row['user_id'];
		$question=$row['question'];
	//if($question!="")
	//{
		$q2="SELECT * FROM `polldetail` WHERE poll_id='{$row['poll_id']}' ";
		$b=mysqli_query($con,$q2) OR die(mysqli_error($con));
		$rowb=mysqli_fetch_assoc($b);
		//echo $rowb['poll_pic'];
	//echo $row['question'];
	
		$q3="SELECT * FROM `signup` WHERE `user_id`={$row['user_id'] }";//change $poll_id to $ user_id after new data feed
		$c=mysqli_query($con,$q3) OR die(mysqli_error($con));
		$rowc=mysqli_fetch_assoc($c);
		?>
	<!--====================================================================================
    =========================================================================================================-->

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="media-left">
                    <img src="<?= $rowc['pic'];?>" onerror="this.src='images/head.png'" class="media-object img-circle custom-border-1" style="width: 4rem;height:4rem;">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?= $rowc['username'] ?></h4>
                    <p style="font-size: small;font-weight: lighter;"> <span style="font-weight: bolder;">&#183;</span><?= poll_time($row['time']);?></p>
                </div>
                <div class="media-right" id="<?='spotlist'.$row['poll_id'] ?>">
                    <span class="pentapoll-icon icon-penta-loc" style="font-size: x-large"></span>
                </div>
            </div>
			<!------------------------------>
			
            <div class="panel-body">
				<input type="hidden" id="poll_id" name="poll_id" value="<?php echo $row['poll_id']?>" /> 
                <p class="question"><?= $row['question']; ?></p>
				<!---------------------------->
				
				<div id="<?='image_option_hide'.$row['poll_id'] ?>">
                <div class="question-image text-center" >
                    <img style="max-height:430px;" class="img-responsive" src = "<?= $row['poll_pic']?>" onerror=""/>
                </div>
					
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4 ">
                        <input type="radio" id="poll_option1" name="option" value="1" onclick="option=<?= $row['poll_id']?>;option=(option*10)+1;"><label for="q1op1">&nbsp;<?= $row["option1"]?></label>
                    </div>
					<div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option2" name="option" value="2" onclick="option=<?= $row['poll_id']?>;option=(option*10)+2;"><label for="q1op2">&nbsp;<?= $row['option2']?></label>
                    </div>
					<?php
					if($row['option3']!='')
					{
					?>
					<div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option3" name="option" value="3" onclick="option=<?= $row['poll_id']?>;option=(option*10)+3;"><label for="q1op3">&nbsp;<?= $row['option3']?></label>
                    </div>
					<?php
					}
					?>
		</div>
				
				<?php
					if($row['option4']!='')
					{
					?>
                <div class="row text-center">
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option4" name="option" value="4" onclick="option=<?= $row['poll_id']?>;option=(option*10)+4;"><label for="q1op4">&nbsp;<?= $row['option4']?></label>
                    </div>
					
					<?php
					}
					?>
					
					
					<?php
					if($row['option5']!='')
					{
					?>
                    <div class="col-lg-4 col-md-4 col-xs-4">
                        <input type="radio" id="poll_option5" name="option" value="5" onclick="option=<?= $row['poll_id']?>;option=(option*10)+5;"><label for="q1op5">&nbsp;<?= $row['option5']?></label>
                    </div>
					
					<?php
					}
					?>
					<br>

                   <div class="panel-footer text-center" style="width:50%;margin:auto;border:none;padding:0px" >
						 <input type="submit" name="poll<?=$poll_id?>" class="custom-button-1" id="<?='poll'.$poll_id?>" class="poll" value="Poll it" onclick="$.get('count3.php',{opt:option},function(data){
							$('#result'+Math.floor(option/10)).html(data);
							 });"/>
                    
					</div>
				</div>
				</div>
									<div id="<?php echo 'result'.$row['poll_id'] ?>"></div>

					<div class="panel-footer text-center" style="width:50%;margin:auto;border:none;padding:0px" id="<?='comment_share'.$row['poll_id'] ?>">

				<button class="custom-button-1" onclick="var opt=<?= $row['poll_id']?>;$.post('comment.php',{opt:opt},function(data){
					$('#comment'+Math.floor(option/10)).html(data);
					 });">Comment</button>

				<button class="custom-button-1 dropdown-toggle"  onclick="var opt=<?= $row['poll_id']?>;$.post('share.php',{opt:opt},function(data){
					$('#share'+Math.floor(option/10)).html(data);
					 });" >Share !t</button>

							<div id="<?= 'comment'.$row['poll_id'] ?>"></div>
							<div id="<?= 'share'.$row['poll_id'] ?>"></div>
							</div>

							



			</div>
				
				<!---alert(Math.floor(option/10));--->
			
        </div>










<!-------------------HIDING IMAGES------------------------->

<script>
	$("<?='#comment_share'.$row['poll_id'] ?>").hide();
	$("<?='#poll'.$poll_id?>").click(function(){
		
			$("<?='#image_option_hide'.$row['poll_id'] ?>").hide();
				$("<?='#comment_share'.$row['poll_id'] ?>").show();
	}); 
	$("<?='#share'.$poll_id?>").mouseenter(function(){
		
	 });
		
	//---------------------SPOTLISTING-----------------	
	$("<?='#spotlist'.$row['poll_id'] ?>").click(function(){
		//alert("hii");
		var poll_id="<?=$row['poll_id'] ?>";
		$.post("spot.php",{poll_id:poll_id},function(data){
		//$("#text_error").html(data);
		//alert("hii");	
			$("<?='#spotlist'.$row['poll_id'] ?>").hide();
	 });
		
		
	});
	
</script>



<!--===================================================================================-->
	<?php
		}
																   
	}
	?>