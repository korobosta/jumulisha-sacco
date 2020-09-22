<?php
include "../conn.php";
                        $delete_id=  $_REQUEST['email'];
                        
                            $sql_delete="DELETE FROM `users` WHERE `email` = '$delete_id'";
                            
                            mysqli_query($conn,$sql_delete) or die(mysqli_error($conn));
                                               echo "<script>
          alert('You have deleted the user');
          window.location.href='staff.php';
          </script>"; 
                        
                        ?>