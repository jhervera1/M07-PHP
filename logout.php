
<?php 
session_start();
if(session_status()==2){
    session_destroy();
    header("Location:login.html");
}






?>