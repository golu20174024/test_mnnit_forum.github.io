<?php
session_start();
if(isset($_POST['topic_submit'])){
	if(($_POST['topic_title']=="" )&& ($_POST['topic_content']=="")){
		echo "you did not fill in both fields,Please return to previous page.";
		exit();
	}
	else{
		include("dbh.php");
		$cid=$_POST['cid'];
		$title=$_POST['topic_title'];
		$content=$_POST['topic_content'];
		$creator=$_SESSION['username'];
		$sql="INSERT INTO topics (category_id,topic_title,topic_creator,topic_date,topic_reply_date) VALUES ('$cid','$title','$creator',now(),now())";
		$res=$conn->query($sql); 
		$new_topic_id=mysqli_insert_id($conn);
		$sql2="INSERT INTO posts (category_id,topic_id,post_creator,post_content,post_date) VALUES ('$cid','$new_topic_id','$creator','$content',now())";
		$res2=$conn->query($sql2);
		$sql3="UPDATE categories SET last_post_date=now(),last_user_posted='$creator' WHERE id='$cid' LIMIT 1";
		$res3=$conn->query($sql3);
		if(($res) && ($res2) && ($res3)){
			header("Location:view_topic.php?cid=".$cid."&tid=".$new_topic_id."");
		}
		else{
			echo "there was a problem creating a topic.please try again";
		}
		}

	}

?>