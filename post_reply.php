<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<a href='index.php'>please log in</a>";
  exit();
}
?>
<?php
$cid=$_GET['cid'];
$tid=$_GET['tid'];
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
<?php
echo "you are succesfully logged in as ".$_SESSION['username']." <br> ";
?>
<hr>
<div id="content">
	<form action="post_reply_parse.php" method="post">
		<p>Reply content</p>
		<textarea name="reply_content" rows="15" cols="100"></textarea>
		<br /><br />
		<input type="hidden" name="cid" value="<?php echo $cid; ?>" />
		<input type="hidden" name="tid" value="<?php echo $tid; ?>" />
		<input type="submit" name="reply_submit" value="post your reply" />
	</form>
</div>
