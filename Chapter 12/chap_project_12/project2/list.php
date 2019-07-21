<?php
include 'travel-data.inc.php';




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 12</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    
    <link rel="stylesheet" href="css/bootstrap-theme.css" />
    <link rel="stylesheet" href="css/captions.css" />

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
     
        
        <div class="btn-group countryButtons" role="group" aria-label="...">
              <a role="button" class="btn btn-default" href="list.php">All</a>
           
              <?php   /* you will need to replace this hard-coded list with appropriate PHP */ ?>
             
              <a href="list.php?country=Canada" role="button" class="btn btn-default"> Canada</a>
           
              <a href="list.php?country=Germany" role="button" class="btn btn-default"> Germany</a>
           
              <a href="list.php?country=Greece" role="button" class="btn btn-default"> Greece</a>
           
              <a href="list.php?country=Italy" role="button" class="btn btn-default"> Italy</a>
           
              <a href="list.php?country=United Kingdom" role="button" class="btn btn-default"> United Kingdom</a>
           
              <a href="list.php?country=United States" role="button" class="btn btn-default"> United States</a>
               
        </div>               
           
        

		<ul class="caption-style-2">
         
          <?php   /* you will need to replace this hard-coded list with appropriate PHP */ ?>
         
         			<li>
                <a href="detail.php?id=22" class="img-responsive">
				<img src="images/square/6114850721.jpg" alt="View of Cologne">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>View of Cologne</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=54" class="img-responsive">
				<img src="images/square/9495574327.jpg" alt="Arch of Septimus Severus">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Arch of Septimus Severus</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=7" class="img-responsive">
				<img src="images/square/5856697109.jpg" alt="Lunenburg Port">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Lunenburg Port</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=19" class="img-responsive">
				<img src="images/square/5855729828.jpg" alt="British Museum">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>British Museum</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=46" class="img-responsive">
				<img src="images/square/8711645510.jpg" alt="Temple of Hephaistos">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Temple of Hephaistos</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=6" class="img-responsive">
				<img src="images/square/6114907897.jpg" alt="At the top of Sulpher Mountain">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>At the top of Sulpher Mountain</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=60" class="img-responsive">
				<img src="images/square/9504609042.jpg" alt="Pazzi Chapel at Santa Croce">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Pazzi Chapel at Santa Croce</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=58" class="img-responsive">
				<img src="images/square/9498358806.jpg" alt="Florence Duomo">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Florence Duomo</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=75" class="img-responsive">
				<img src="images/square/8710513053.jpg" alt="Ancient Theatre of Dionysos">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Ancient Theatre of Dionysos</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=77" class="img-responsive">
				<img src="images/square/8710247776.jpg" alt="Dusk on Santorini">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Dusk on Santorini</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=27" class="img-responsive">
				<img src="images/square/6114867983.jpg" alt="New National Gallery">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>New National Gallery</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=2" class="img-responsive">
				<img src="images/square/6592914823.jpg" alt="Calgary Downtown">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Calgary Downtown</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=24" class="img-responsive">
				<img src="images/square/6114960821.jpg" alt="Downtown Frankfurt">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Downtown Frankfurt</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=13" class="img-responsive">
				<img src="images/square/6596048341.jpg" alt="Central Park">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Central Park</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=101" class="img-responsive">
				<img src="images/square/21587937686.jpg" alt="Seattle Scene">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Seattle Scene</h1>
					</div>
				</div>
                    </a>
			</li>        
          			<li>
                <a href="detail.php?id=102" class="img-responsive">
				<img src="images/square/22182041615.jpg" alt="Millennium Park Chicago">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h1>Millennium Park Chicago</h1>
					</div>
				</div>
                    </a>
			</li>        

      
       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>