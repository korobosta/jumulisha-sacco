<?php include 'header.php' ?>
<script language="javascript" type="text/javascript">
		var timerid = 0;
		var images = new Array(	"../images/image1.jpg",
					"../images/image2.jpg",
					"../images/image3.jpg");
		var countimages = 0;
		function startTime()
		{
			if(timerid)
			{
				timerid = 0;
			}
			var tDate = new Date();
			
			if(countimages == images.length)
			{
				countimages = 0;
			}
			if(tDate.getSeconds() % 5 == 0)
			{
				document.getElementById("img1").src = images[countimages];
			}
			countimages++;
			
			timerid = setTimeout("startTime()", 1000);
		}
		</script>
<div class="slide-images" >
	<img id="img1" src="../images/image3.jpg" />
	</div >
	<div class="content">
		<div class="introduction">
			<h1>Introduction</h1>
	       <p style="padding-left:5px;">JUMULISHA SACCO is deposit and saving SACCO. It came up as a result of a project done at Kenyatta University by a fourth year. It is a web SACCO where people save money and apply for loans online.</p>
		</div>
		<div class="services">
			<h2 style="font-size: 30px; font-style: bold; ">Services</h2>
			<p  style="padding-left:5px;">The key services we offer are giving out loans and saving money.</p>
		</div>
		<div class="membership">
				<h2 style="font-size: 30px; font-style: bold;">Membership</h2>
				<p style="padding-left:5px;">The membership registration fee is KES 500.
				To become a member, fill the membership form
				</p>
				<a style="text-align:center; font-size:20px; padding-left:10px;" href="register.php">Apply to be a member</a>
		</div>
	
	</div>
	<?php include 'footer.php' ?>