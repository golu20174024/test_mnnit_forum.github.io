<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<a href='index.php'>please log in</a>";
  exit();
}
?>
<?php
$cid=$_GET['cid'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create topic</title>
    
    <style>
    *{
        margin:0;
        padding:0;
    }
    
    
    body{
	background:url(main.jpg);
	background-size:cover; font-family: sans-serif;
    }
     ul{
    float:right;
    list-style-type:none;
    
}
    
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
<br>
<hr>
<br>
<div >
	<form action="create_topic_parse.php" method="POST">
		<h4 style="text-align:center"> create topic here</h4>
		<hr>
		<p>Topic title</p>
		<br>
		<input type="text" name="topic_title" size="100 maxlength="150 >
		<br>
		<p>Topic Content</p>
		<br>
		<textarea name="topic_content" rows="5" cols="75"></textarea>
		<br><br>
		<input type="hidden" name="cid" value="<?php echo $cid; ?>">
		<input type="submit" name="topic_submit" value="create your topic" >
	</form>
</div>
</body>
</html>