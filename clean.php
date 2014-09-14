<?php 
include("header.php");
include("config.php"); 
?>

<div class="holder">

 <?php 
// not logged in -> form
//submitted form -> check info

// Delete data in mysql from row that has this id 
$sql="DELETE FROM rota WHERE user_id='0'";
$results=mysql_query($sql);

// if successfully deleted
if($results){
?>
<h3>Lovely</h3>
<p>The database has been cleaned!</p>
<?php
}

else {
echo "ERROR";
}
?> 

</div>