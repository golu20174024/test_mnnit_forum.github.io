<?php
session_start();
$uid=$_GET['uid'];
if(!isset($_SESSION['username'])){
	echo "<a href='index.php'>please log in first</a>";
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>view topic</title>
    <style>
    *{
        margin:0;
        padding:0;
    }
    ul{
    float:right;
    list-style-type:none;
    
}
ul li{
    display:inline-block;
}
ul li a{
    text-decoration:none;
    color:black;
    padding: 5px 20px;
    border:1px solid #fff;
    transition: 0.6s ease;

}
ul li a:hover{
    background-color:white;
    color:blue;
}
#style{
text-align:center;
color:#db4144;
font-size: 90px;
font-weight: bold;
}
body{
        background:url(main.jpg);
        background-size:cover; font-family: sans-serif;
    }
</style>
</head>
<body>
    <header>
  <div class="main">
    
      <h2 id="style">MNNIT_FORUM</h2>
    
    <ul>
      <li><a href="logout.php">Log out</a></li>
    </ul>
  </div>
</header>
<br><br>
<hr>
<h2>TOPICS ANSWERED BY YOU</h2>
<hr>
<?php
include("dbh.php");

$sql="SELECT * FROM posts WHERE post_creator='$uid' ";
$res=mysqli_query($conn,$sql);

if(mysqli_num_rows($res)>0){
	$topics="";
	while($row=mysqli_fetch_assoc($res)){
		$tid=$row['topic_id'];
		$cid=$row['category_id'];
		$sql2="SELECT * FROM topics WHERE id='".$tid."' LIMIT 1";
		$res2=mysqli_query($conn,$sql2);
		if(mysqli_num_rows($res2)){
			while($row2=mysqli_fetch_assoc($res2)){
              $topic_title=$row2['topic_title'];
              $topics.="<a href='view_topic.php?cid=".$cid."&tid=".$tid."'>".$topic_title."</a><br>";
               
			}
		}

	}
	echo $topics;
}

?>