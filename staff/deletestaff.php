<?php
include "conn.php";
                        $delete_id=  mysql_real_escape_string($_REQUEST['username']);
                        
                            $sql_delete="DELETE FROM `members` WHERE `surname` = '$delete_id'";
                            
                            mysql_query($sql_delete) or die(mysql_error());
                            
                            header('location:members.php');
                        
                        ?>