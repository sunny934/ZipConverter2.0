<?php
   $conn = mysqli_connect('localhost','root') or die ('not connected');
   if(!mysqli_select_db($conn,"sunny")){
      echo "database not found";
   }
$username = $_POST["username"];
$password = $_POST["password"];
if(!$username && !$password)
die('');
function getQueryResultAsArray($connection,$sqlQuery){
	$result = $connection->query($sqlQuery);
	$results = array();
	if($result->num_rows > 0)
	while($row = $result->fetch_assoc())
		array_push($results,$row);
	else die("<script>alert('Wrong credentials!');window.location='signup.html'</script>");
	return $results;
}
$check = "select password from registrations where email ='".$_POST["username"]."'";
$check = getQueryResultAsArray($conn, $check)[0]["password"];
if($_POST["password"] == $check){
	$lastSessionID = getQueryResultAsArray($conn, "select session_id from login ORDER BY time")[0]["session_id"]+1;
	$q = "insert into login(username,session_id) values ('".$_POST["username"]."', '".$lastSessionID."')";
	$conn->query($q);
	if(mysqli_query($conn,$q)){
		header("refresh:0,url=index.html");
	}
}
?>
