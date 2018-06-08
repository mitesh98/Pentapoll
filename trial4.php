<div id="primary-left" class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 custom-padding-1 custom-left-sidebar">
            <div class="custom-profile-pic text-center"><img class="img-circle custom-border-2" src="<?php echo $record['pic'];?>" onerror="this.src='images/head.png'" style="width: 8rem;height: 8rem; margin-bottom: -4rem;"/></div>
            <div class="panel panel-default text-center" style="padding-top: 4rem; padding-bottom: .1rem;">
                <div class="panel-heading"><?php echo $record['username']; ?></div>
                <p style="font-size: small;font-weight: lighter;"><?php echo $record["emobile"]; ?></p>
                <div class="panel-footer" style="font-weight: bold;height:6rem;" >
                    <div class="col-xs-6 col-lg-6">Polls<br><?=$polls?></div>
                    <div class="col-xs-6 col-lg-6">Polled<br><?=$polled ?></div>
                </div>
            </div>
        </div>