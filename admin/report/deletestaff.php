<?php
include "../conn.php";
                        $delete_id=  mysqli_real_escape_string($_REQUEST['id']);
                        
                            $sql_delete="DELETE FROM `users` WHERE `email` = '$delete_id'";
                            
                            mysqli_query($sql_delete) or die(mysqli_error($conn));
                            
                               echo "<script>
          alert('You have edited the user');
          window.location.href='staff.php';
          </script>"; 
                        
                        ?>