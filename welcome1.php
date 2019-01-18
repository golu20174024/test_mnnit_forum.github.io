<?php
session_start();
if(!isset($_SESSION['username'])){
  echo "<a href='index.php'>please log in</a>";
  exit();
}
$uid=$_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>welcome file</title>
	<link rel="stylesheet" href="wecome_style.css">
</head>
<body>
<header>
  <div class="main">
    
      <h2 style="text-align:center;
  color:#db4144;
  font-size: 90px;
  font-weight: bold;">MNNIT_FORUM</h2>
    
   
    
    <ul>
      <li><a href="logout.php">Log out</a></li>
      <li><a href="profile.php?uid=<?php echo $uid ?>">profile</a></li>
    </ul>
  </div>
</header>
<br>
<br>
<hr>

<?php
echo "<h3>you are succesfully logged in as ".$_SESSION['username']." </h3><br><hr> ";
?>
<br>
<h2 style="color:blue;text-align: center;">CATEGORIES</h2>
<br>
<hr>
<div id="content">
	<?php
	include("dbh.php");
	$query="SELECT * FROM categories ORDER BY category_title ASC";
    $data=mysqli_query($conn,$query);
    $categories="";
    if(mysqli_num_rows($data)>0){
           while($row=mysqli_fetch_assoc($data)){
           	$id=$row['id'];
           	$title=$row['category_title'];
           	$description=$row['category_description'];
           	$categories.="<a href='view_category.php?cid=".$id."' class='cat_links' >".$title." -<font size='-1'>".$description."</font></a>";
           }
           echo $categories; 
    }
    else
    {
    	echo "<p>there are no category to print</p>";
    }

	?>
</body>
</html>