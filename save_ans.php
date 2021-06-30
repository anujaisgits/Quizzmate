<?php
require "common.php"; 
$user_id=$_SESSION['id'];
$quiz_id=$_GET['quiz_id'];
$choosen_option=array($_POST['choosen_option']);
$select_query="select * from quiz_and_ques where quiz_id=$quiz_id";
$select_query_result=mysqli_query($con,$select_query);
$i=1;
while($row=mysqli_fetch_array($select_query_result)){

	
	
	if(!$choosen_option[0][$i]){
       $i++;
	   continue;
}
     $chosen_option=$choosen_option[0][$i];
	$corr_option=$row['corr_ans'];
		$question_id=$row['id'];
$insert_query="insert into response_table (quiz_id,question_id,person_id,choosen_option,corr_option) values($quiz_id,$question_id,$user_id,'$chosen_option','$corr_option')";
mysqli_query($con,$insert_query);
$i++;
}
/*echo $choosen_option[0][1];
if(!$choosen_option[0][1]){
echo hoye;
}
echo $choosen_option[0][3];

/*  
$password=$_GET['password'];
$_SESSION['password1']=$password;
$quiz_id=$_GET['quiz_id'];
$_SESSION['quiz_id']=$quiz_id;
$question_id=$_GET['question_id'];
$select_query="select corr_ans from quiz_and_ques where id=$question_id";
$select_query_result=mysqli_query($con,$select_query);
$row=mysqli_fetch_array($select_query_result);
$corr_option=$row['corr_ans'];
$insert_query="insert into response_table (quiz_id,question_id,person_id,choosen_option,corr_option) values($quiz_id,$question_id,$user_id,'$choosen_option','$corr_option')";
mysqli_query($con,$insert_query);
 */
 $update_query="UPDATE person_and_response SET status='submitted' WHERE person_id=$user_id and quiz_id=$quiz_id";
   mysqli_query($con,$update_query);
  echo "<script>alert('Thank you your response has been submitted');
	                         location.href='index_new.php';
			                   </script>";



?>