<?php
   
   $conn = mysqli_connect('localhost','root') or die ('not connected');
   if(!mysqli_select_db($conn,"sunny"))
   {
      echo "database not found";
   }
$sql="insert into registrations(fullname,email,password) values ('".$_POST["fullname"]."','".$_POST["email"]."','".$_POST["password"]."')";
if(mysqli_query($conn,$sql))
{
   header("refresh:1,url=index.html");
  
}


?>

