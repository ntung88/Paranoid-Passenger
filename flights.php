<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <!-- Optional JavaScript -->
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/index.html">
        <img src="badlogo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      </a>
      <a class="navbar-brand" href="/index.html">ParanoidPassenger</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="/index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <!----- <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"> 
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </nav>

<main role="main" class="container">

<?php
$inputloc1 = $_GET["inputloc1"]; 
$inputloc2 = $_GET["inputloc2"]; 
?>

<div id="error_msg"> </div>
    <div id="content">
    <div class="starter-template">

      <img src='plane-loader-slower.gif' />

      <!-- <canvas id="mycanvas">Get a new browser</canvas>
		<script>
		var c = document.getElementById("mycanvas");
		c.width = 800;
		c.height = 500;
    c.width = window.innerWidth;
    c.height = window.innerHeight;
		var ctx = c.getContext("2d");
		var plane = new Image();
		plane.src = './bplane.png';

		plane.height = window.innerWidth / 10;
		plane.width = window.innerWidth / 10;

		var x = -100;
		var y = c.height / 6;
		var angle = -45;
		//y = 3 * (c.height / 10)


		//These would need to be adjusted on a different screen sixze
		var max_drift = c.height / 50;
		var period_adjust = 0.5;

		/*
		The height is a function of a a sinosoidal function
		The delta is a function of the sinosoidal function
		*/


		function draw(x, y, ang)
		{
			cx = x + (plane.width / 2)
			cy = y + (plane.height / 2)
			ctx.fillStyle = "white";
			ctx.fillRect(0,0,c.width,c.height);	  		
	  		ctx.save()
	  		ctx.translate(x + (plane.width / 2), y + (plane.height / 2));
			ctx.rotate(-ang*Math.PI/180);
			ctx.drawImage(plane, - (plane.width / 2), - (plane.height / 2), plane.width, plane.height);
			ctx.restore();
		}

		plane.onload = function() {
			draw(x, y, angle)
		};

		/*
			Init params:
			var x = 100;
			var y = 150;
			var angle = 56;

			Takeoff code:
			x = x + 8;
			angle = angle + 0.002 * x;
			y = y - x * 0.01
			draw(x, y, angle);
		*/

		function update()
		{
			
			if (x  > c.width - (plane.width + 30))
			{
				x = -200
				y = c.height / 6
			}
				
			x = x + 8;
			drift = Math.cos(period_adjust*x*Math.PI/180) * max_drift;
			y = y + drift
			draw(x-100, y, angle);
		}

		setInterval(update, 32)


		</script> -->

    </div>
    </div>
     <script type="text/javascript">
       $(document).ready(function(){
           var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log('success : ', this.responseText);
            // remove loading image and add content received from php 
        $('div#content').html(this.responseText);
       }
    };
    xhttp.open("GET", '/displayflights.php?inputloc1=<?php echo $inputloc1; ?>&inputloc2=<?php echo $inputloc2; ?>', true);
    xhttp.send(); 
});
</script>


</main><!-- /.container -->
</body>
</html>



