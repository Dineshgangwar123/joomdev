<?php

session_start();

include 'config.php'; 
if (isset($_SESSION['uid'])) {
	$userId=$_SESSION['uid'];
}


if(isset($_POST['mszarea'])){
$resText='';
	$mszarea=mysqli_real_escape_string($con,$_POST['mszarea']);
		mysqli_query($con,"insert into textdata (`userid`,`textmsz`) values ('$userId','$mszarea')");
		if ($con->insert_id>0) {
			$status= 1;
			$txt=mysqli_query($con,"select * from textdata where userid='$userId' order by id desc");
			
			$count=0;
			while ($row=mysqli_fetch_assoc($txt)) {
				if ($count==0) {
					$resText .=nl2br($row['textmsz']);
				}else{
                    $resText .='<br>'.nl2br($row['textmsz']);
				}
				$count=$count+1;
			}
           
		}else{
			$status= 0;
		}

	$data=array();
	$data['status']=$status;
	$data['result']=$resText;
	echo json_encode($data);
}

?>