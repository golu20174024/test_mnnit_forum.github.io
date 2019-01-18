<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<a href='index.php'>please log in</a>";
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

<?php
echo "you are succesfully logged in as ".$_SESSION['username']." <br>" ;
?>
<hr>
<div>
	<?php
	include("dbh.php");
	$cid=$_GET['cid'];
    $tid=$_GET['tid'];
    $sql="SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
    $res=mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==1){
    	echo "<table width='100%'>";
    	if($_SESSION['username']){
    		echo "<a href='post_reply.php?cid=".$cid."&tid=".$tid."'>add your reply</a>";}
    		    		else {
    			echo "<tr><td colspan='2'><p>please log in to add your response</td></tr>";}
    		}

    		while($row=mysqli_fetch_assoc($res)){
    			$sql2="SELECT * FROM posts WHERE category_id=".$cid." AND topic_id=".$tid."";
    			$res2=mysqli_query($conn,$sql2);
    			while($row2=mysqli_fetch_assoc($res2)){
    				echo "<tr><td valign='top' style='border:1px solid #000000;'\><div style='min-height:125px;'>".$row['topic_title']."<br><br> ".$row2['post_creator']."-".$row2['post_date']."<hr />".$row2['post_content']."</div></td>";
    			}
    			$old_views=$row['topic_views'];
    			$new_views=$old_views+1;
    			$sql3="UPDATE topics SET topic_views=".$new_views." WHERE category_id=".$cid." AND id=".$tid." LIMIT 1";
    			$res3=mysqli_query($conn,$sql3);
    		
    	}
    

	?>
	</div>
</body>
</html>