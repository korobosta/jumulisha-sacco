<?php
                $member_id=$_SESSION['username'];
                include 'conn.php';
                $sql="SELECT * FROM members WHERE username='$member_id'";
                $result=  mysql_query($sql) or die(mysql_error());
                $rws=  mysql_fetch_array($result);
                
                
                $surname= $rws[1];
                $othernames= $rws[2];
				$dob= $rws[3];
				$idno= $rws[4];
                $mobilenumber=$rws[5];
                $email= $rws[6];
                $address= $rws[7];
                
               
                
                $_SESSION['login_id']=$idno;
                $_SESSION['surname']=$surname;
                ?>


<div class="memberinfo">
 <h1>Welcome <?php echo $_SESSION['surname']?></h1>
 
    <p><span class="heading">Surname: </span><?php echo $surname;?></p>
	
            <p><span class="heading">Other Names: </span><?php echo $othernames;?></p>
            <p><span class="heading">Date Of Birth: </span><?php echo $dob;?></p>
            
            
            <p><span class="heading">ID Number: </span><?php echo $idno;?></p>
            <p><span class="heading">Mobile Number:  </span><?php echo $mobilenumber;?></p>
            <p><span class="heading">Email: </span><?php echo $email;?></p>
            <p><span class="heading">Address: </span><?php echo $address;?></p>
	</div>