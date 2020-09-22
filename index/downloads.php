<!doctype html>
<html lang="en">
   
<head>
    <meta charset="UTF-8">
    <title>Loan Issuance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <header>
                <img class="header-image" src="../images/kensacco.png">
                </header>
<div id="wrap">
    <ul class="navbar">
   
       <li><a href="home.html">Home</a></li>
       <li><a href="#">Services <i class="fa fa-caret-down"></i></a>
          <ul>
             <li><a href="loan-issuance.html">Loan Issuance</a></li>
             <li><a href="deposit.html">Deposits and Savings</a></li>
            
          </ul>         
       </li>
       <li><a href="contact-us.php">Contact Us</a>
                   
       </li>

       <li><a href="#">Loans  <i class="fa fa-caret-down"></i></a>

          <ul>
		    <li><a href="apply-loan.php">Apply for a loan</a></li>
             <li><a href="#">BOSA Loans</a></li>
             <li><a href="#">FOSA Loans</a></li>
             <li><a href="loancalc.php">Loan Calculator</a></li>
            
             
             
          </ul>         
       </li>
       <li><a href="aboutUs.html">About Us</a>
          
          <li><a href="#">Support <i class="fa fa-caret-down"></i></a>
          <ul>
             <li><a href="downloads.php">Downloads</a></li>
             <li><a href="news.html">News</a></li>
             <li><a href="contact-us.php">Contact Information</a></li>
            
            
             
             
          </ul>         
       </li>
       <li><a href="login.php">Login</a></li>
       <li><a href="register.php">Register</a></li>
     
</div>
<div class="main">
    <div class="downloads">
<?php

$file = "ADVANCE.pdf"; 
echo "<a href='download1.php?nama=".$file."'>Download advance loan form</a><br> ";

$file = "MEMBERSHIP.pdf"; 
echo "<a href='download1.php?nama=".$file."'>Download Membership form</a><br> ";

$file = "LOANAPPLICATIONFORM.pdf"; 
echo "<a href='download1.php?nama=".$file."'>Download Loan Application form</a><br> ";

?> 
</div>
</div>
  <footer style="bottom:0px; ">

    <div style="float:left; margin-left:50px; ">
      <h2 style="color:blue; font-style:bold;">Services</h2>
      <a style="text-decoration: none;" href="loan-issuance.html">Loans</a><br>
    
      <a style="text-decoration: none;" href="loan-issuance.html">About Us</a><br>
    
      <a style="text-decoration: none;" href="bosa.html">BOSA Products</a><br>
    
      <a style="text-decoration: none;" href="fosa.html">FOSA Products</a><br>
    </div>
    
<div style="float:left; margin-left:100px;">
<h2 style="color:blue; font-style:bold;">Contact Details</h2>
E-Mail Us:<a href="mailto:kevinkorobosta@gmail.com">info@kenversitysacco.co.ke  </a><br><br>
Call Us: 0715 114454<br><br>
Address: P.O.BOX 10263-00100 NAIROBI,KENYA. <br><br>
  </div>
<div style="float:left; margin-left:100px;">
<h2 style="color:blue; font-style:bold;">We are also in social media</h2>
<a target="_blank" title="follow me on twitter" href="https://twitter.com/korokevin"><img  src="../images/twitter.png" border=0></a>
<a target="_blank" title="find us on Facebook" href="http://www.facebook.com/kevin.korobosta.11"><img src="../images/facebook.png" border=0></a>

</div>

  </footer>
</body>
</html>