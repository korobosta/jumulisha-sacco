<?php
include '../conn.php';
$memberID=$_REQUEST['memberID'];
$result=$conn->query("DELETE FROM members WHERE memberID='$memberID'");
if($result){
	echo "<script>
          alert('Record deleted Successfully');
          window.location.href='members.php';
          </script>"; 
}
?>