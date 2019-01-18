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
    <title>welcome1 file</title>
    
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
    .return_links{
        display:block;
    padding:5px;
    padding-top:10px;
    padding-bottom:10 px;
    margin-bottom:5px;
    background-color:transparent;
    color:black;
    text-align:center;
    }
    .return_links:hover{
    background-color:white;
    color:black;
    transition: 0.6s ease;
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
<br>
<hr>

<?php
echo "<h3>you are succesfully logged in as ".$_SESSION['username']." </h3><br><hr> ";
?>
<br>

	<?php
	include("dbh.php");
	$cid=$_GET['cid'];
	$sql="SELECT id FROM categories WHERE id=".$cid." LIMIT 1";
	$res=mysqli_query($conn,$sql);
	$topics="";
	if(mysqli_num_rows($res)==1){
        $sql2="SELECT * FROM topics WHERE category_id=".$cid." ORDER BY topic_reply_date DESC";
        $res2=mysqli_query($conn,$sql2);
        if(mysqli_num_rows($res2)>0){
              $topics.="<table width=100% style='border-collapse:collapse;'>";
            $topics.="<tr><td colspan='3'><a href='welcome1.php' class='return_links'>Return To Forum main page</a><hr>   <a href='create_topic.php?cid=".$cid."' class='return_links'>  click here to create a topic</a><hr></td></tr>";
            $topics.="<tr style='background-color:#dddddd;'><td>Topic Title</td><td width='65' align='center'>Replies</td><td width='65' align='center'>Views</td></tr>";
            $topics.="<tr><td colspan='3'><hr></td><tr>";
            while($row=mysqli_fetch_assoc($res2)){
            	$tid=$row['id'];
            	$title=$row['topic_title'];
            	$views=$row['topic_views'];
            	$date=$row['topic_date'];
            	$creator=$row['topic_creator'];
            	$topics.="<tr><td><a href='view_topic.php?cid=".$cid."&tid=".$tid."' >".$title."</a><br /><span class='post_info'>Posted by: ".$creator." on ".$date."</span></td><td align='center'>0</td><td align='center'>".$views."</td></tr>";
            	$topics.="<trt><td colspan='3'><hr></td></tr>";
            }
            $topics.="</table>";
            echo $topics;
        }
        else
     {
       echo "<a href='welcome1.php'>return to main page</a><hr>";
       echo "<p>There are no topics in this category yet <a href='create_topic.php?cid='$cid''> Click here to create a topic.</a></p>";
     }
    }
           
    
        
	


	
	?>

</body>
</html>