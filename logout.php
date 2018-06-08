<?php
session_start();
if($_POST['logout_btn'])
{
echo "YOU HAVE BEEN SUCCESSFULLY LOGGEDOUT";
session_destroy();
}
?>