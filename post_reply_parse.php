<?php
session_start();
if($_SESSION['username'])
{
	if(isset($_POST['reply_submit']))
	{
		include("dbh.php");
		$creator=$_SESSION['username'];
		$cid=$_POST['cid'];
		$tid=$_POST['tid'];
		$reply_content=$_POST['reply_content'];
		$sql="INSERT INTO posts (category_id, topic_id, post_creator,post_content, post_date) VALUES('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		$res=mysqli_query($conn,$sql);
		$sql2="UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";

		$res2=mysqli_query($conn,$sql2);
		$sql3="UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id=".$tid." LIMIT 1";
		$res3=mysqli_query($conn,$sql3);
		
		if(($res) && ($res2) && ($res3) )
		{
			echo "<p>Your reply has been successfully posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return </a></p>";
		}
		else
		{
			echo "<p>There was a problem posting your reply.try again later.</p>";
		}
	}
	else
	{
		exit();
	}
}
else
{
	exit();
}
?>