<?php
include_once('Painting.class.php');
include_once('Query.inc.php');

$id = 37;
if(isset($_GET['id']))
	$id = $_GET['id'];

$painting = new Painting($id);
//die(print_r($painting));

function getFrames() {
	$sql = 'SELECT * FROM TypesFrames WHERE Title != "[None]"';
	$result = DBQuery($sql);
	try {
		$array = [];
		if($result) {
			while($row = $result->fetch()) {
				$str = $row['Title'];
				array_push($array, $str);
			}
		}
		return $array;
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

function getGlasses() {
	$sql = 'SELECT * FROM TypesGlass WHERE Title != "[None]"';
	$result = DBQuery($sql);
	try {
		$array = [];
		if($result) {
			while($row = $result->fetch()) {
				$str = $row['Title'];
				array_push($array, $str);
			}
		}
		return $array;
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

function getMatts() {
	$sql = 'SELECT * FROM TypesMatt WHERE Title != "[None]"';
	$result = DBQuery($sql);
	try {
		$array = [];
		if($result) {
			while($row = $result->fetch()) {
				$str = $row['Title'];
				array_push($array, $str);
			}
		}
		return $array;
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

function outputReviews($id) {
	$sql = 'SELECT * FROM Reviews WHERE PaintingID = '. $id;
	$result = DBQuery($sql);
	try {
		$separatorReq = 0;
		while($row = $result->fetch()) {
			if($separatorReq)
				echo '<div class="ui divider"></div>';
			$separatorReq = 1;
			echo '<div class="event">';
			echo '<div class="content">';
			echo '<div class="date">'. $row['ReviewDate']. '</div>';
			echo '<div class="meta">';
			echo '<a class="like">';
			echo '<i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>';
			echo '</a>';
			echo '</div>';
			echo '<div class="summary">';
			echo $row['Comment'];
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	} catch(PDOException $e) {
		die($e->getMessage());
	}
}

?>
<!DOCTYPE html>
<html lang=en>
<head>
<meta charset=utf-8>
    <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="css/semantic.js"></script>
	<script src="js/misc.js"></script>
    
    <link href="css/semantic.css" rel="stylesheet" >
    <link href="css/icon.css" rel="stylesheet" >
    <link href="css/styles.css" rel="stylesheet">   
</head>
<body >

<!-- Include the common header markup (shared with browse-painting.php) -->
<?php include_once('header.inc.php');?>
    
<main >
    <!-- Main section about painting -->
    <section class="ui segment grey100">
        <div class="ui doubling stackable grid container">
		
            <div class="nine wide column">
		<?php
		echo '<img src="images/art/works/medium/'. $painting->fileName .'" alt="'. $painting->title
			.'" class="ui big image" id="artwork">';
		?>
                <div class="ui fullscreen modal">
                  <div class="image content">
			<?php
				echo '<img src="images/art/works/medium/'. $painting->fileName .'" alt="'. $painting->title
				.'" class="image">';
				echo '<div class="description">';
				echo '<p>'. $painting->description .'</p>';
				echo '</div>';
			?>
                  </div>
                </div>                
                
            </div>	<!-- END LEFT Picture Column --> 
			
            <div class="seven wide column">
                
                <!-- Main Info -->
                <div class="item">
					<?php
					echo '<h2 class="header">'. $painting->title .'</h2>';
					echo '<h3>'. $painting->artist .'</h3>';
					?>
					<div class="meta">
						<p>
						<i class="orange star icon"></i>
						<i class="orange star icon"></i>
						<i class="orange star icon"></i>
						<i class="orange star icon"></i>
						<i class="empty star icon"></i>
						</p>
						<?php
						echo '<p>'. $painting->excerpt .'</p>';
						?>
					</div>  
                </div>                          
                  
                <!-- Tabs For Details, Museum, Genre, Subjects -->
                <div class="ui top attached tabular menu ">
                    <a class="active item" data-tab="details"><i class="image icon"></i>Details</a>
                    <a class="item" data-tab="museum"><i class="university icon"></i>Museum</a>
                    <a class="item" data-tab="genres"><i class="theme icon"></i>Genres</a>
                    <a class="item" data-tab="subjects"><i class="cube icon"></i>Subjects</a>    
                </div>
                
                <div class="ui bottom attached active tab segment" data-tab="details">
                    <table class="ui definition very basic collapsing celled table">
					  <tbody>
						  <tr>
						 <td>
							  Artist
						  </td>
						  <td>
							<?php
							echo '<a href="#">'. $painting->artist .'</a>';
							?>
						  </td>                       
						  </tr>
						<tr>                       
						  <td>
							  Year
						  </td>
						  <td>
							<?php echo $painting->year; ?>
						  </td>
						</tr>       
						<tr>
						  <td>
							  Medium
						  </td>
						  <td>
							<?php echo $painting->medium; ?>
						  </td>
						</tr>  
						<tr>
						  <td>
							  Dimensions
						  </td>
						  <td>
							<?php
							echo $painting->width .'cm x '. $painting->height .'cm';
							?>
						  </td>
						</tr>        
					  </tbody>
					</table>
                </div>
				
                <div class="ui bottom attached tab segment" data-tab="museum">
                    <table class="ui definition very basic collapsing celled table">
                      <tbody>
                        <tr>
                          <td>
                              Museum
                          </td>
                          <td>
				<?php echo $painting->gallery; ?>
                          </td>
                        </tr>       
                        <tr>
                          <td>
                              Assession #
                          </td>
                          <td>
				<?php echo $painting->accessionNumber; ?>
                          </td>
                        </tr>  
                        <tr>
                          <td>
                              Copyright
                          </td>
                          <td>
				<?php echo $painting->copyright; ?>
                          </td>
                        </tr>       
                        <tr>
                          <td>
                              URL
                          </td>
                          <td>
				<?php echo '<a href="'. $painting->museumLink .'">View painting at museum site</a>'; ?>
                          </td>
                        </tr>        
                      </tbody>
                    </table>    
                </div>     
                <div class="ui bottom attached tab segment" data-tab="genres">
 
                        <ul class="ui list">
			<?php
			foreach($painting->genres as $genre){
				echo '<li class="item"><a href="#">'. $genre.'</a></li>';
			}
			?>
                        </ul>

                </div>  
                <div class="ui bottom attached tab segment" data-tab="subjects">
                    <ul class="ui list">
			<?php
			foreach($painting->subjects as $subject){
				echo '<li class="item"><a href="#">'. $subject.'</a></li>';
			}
			?>
                        </ul>
                </div>  
                
                <!-- Cart and Price -->
                <div class="ui segment">
                    <div class="ui form">
                        <div class="ui tiny statistic">
                          <div class="value">
				<?php setLocale(LC_MONETARY, 'en_US'); echo money_format('%i', $painting->msrp); ?>
                          </div>
                        </div>
                        <div class="four fields">
                            <div class="three wide field">
                                <label>Quantity</label>
                                <input type="number">
                            </div>                               
                            <div class="four wide field">
                                <label>Frame</label>
                                <select id="frame" class="ui search dropdown">
					<?php
					$frames = getFrames();
					echo '<option>None</option>';
					foreach($frames as $frame) {
						echo '<option>'. $frame .'</option>';
					}
					?>
                                </select>
                            </div>  
                            <div class="four wide field">
                                <label>Glass</label>
                                <select id="glass" class="ui search dropdown">
					<?php
					$glasses = getGlasses();
					echo '<option>None</option>';
					foreach($glasses as $glass) {
						echo '<option>'. $glass .'</option>';
					}
					?>
                                </select>
                            </div>  
                            <div class="four wide field">
                                <label>Matt</label>
                                <select id="matt" class="ui search dropdown">
					<?php
					$matts = getMatts();
					echo '<option>None</option>';
					foreach($matts as $matt) {
						echo '<option>'. $matt .'</option>';
					}
					?>
                                </select>
                            </div>           
                        </div>                     
                    </div>

                    <div class="ui divider"></div>

                    <button class="ui labeled icon orange button">
                      <i class="add to cart icon"></i>
                      Add to Cart
                    </button>
                    <button class="ui right labeled icon button">
                      <i class="heart icon"></i>
                      Add to Favorites
                    </button>        
                </div>     <!-- END Cart -->                      
                          
            </div>	<!-- END RIGHT data Column --> 
        </div>		<!-- END Grid --> 
    </section>		<!-- END Main Section --> 
    
    <!-- Tabs for Description, On the Web, Reviews -->
    <section class="ui doubling stackable grid container">
        <div class="sixteen wide column">
        
            <div class="ui top attached tabular menu ">
              <a class="active item" data-tab="first">Description</a>
              <a class="item" data-tab="second">On the Web</a>
              <a class="item" data-tab="third">Reviews</a>
            </div>
			
            <div class="ui bottom attached active tab segment" data-tab="first">
		<?php echo $painting->description; ?>
            </div>	<!-- END DescriptionTab --> 
			
            <div class="ui bottom attached tab segment" data-tab="second">
				<table class="ui definition very basic collapsing celled table">
                  <tbody>
                      <tr>
                     <td>
                          Wikipedia Link
                      </td>
                      <td>
			<?php
			$link = $painting->wikiLink? $painting->wikiLink : '#';
			echo '<a href="'. $link. '">View painting on Wikipedia</a>';
			?>
                      </td>                       
                      </tr>                       
                      
                      <tr>
                     <td>
                          Google Link
                      </td>
                      <td>
			<?php
			$link = $painting->googleLink? $painting->googleLink : '#';
			echo '<a href="'. $link. '">View painting on Google Art Project</a>';
			?>
                        <!--<a href="#">View painting on Google Art Project</a>-->
                      </td>                       
                      </tr>
                      
                      <tr>
                     <td>
                          Google Text
                      </td>
                      <td>
			<?php echo $painting->googleDesc ?> 
                      </td>                       
                      </tr>                      
                      
   
       
                  </tbody>
                </table>
            </div>   <!-- END On the Web Tab --> 
			
            <div class="ui bottom attached tab segment" data-tab="third">                
				<div class="ui feed">
				<?php outputReviews($painting->paintingID); ?>
				<!--	
				  <div class="event">
					<div class="content">
						<div class="date">12/14/2016</div>
						<div class="meta">
							<a class="like">
							  <i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
							</a>
						</div>                    
						<div class="summary">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ac vestibulum ligula. Nam ac erat sit amet odio semper vulputate. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse consequat pellentesque tellus, nec molestie tortor mattis eu. Aliquam cursus euismod nisl, vel vulputate metus interdum sit amet. Nam dictum eget ex non posuere. Praesent vel sodales velit. Ut id metus aliquam, egestas leo et, auctor ante.        
						</div>       
					</div>
				  </div>
					
				<div class="ui divider"></div>    
					
				  <div class="event">
					<div class="content">
						<div class="date">8/16/2016</div>
						<div class="meta">
							<a class="like">
							  <i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i><i class="star icon"></i>
							</a>
						</div>         
						<div class="summary">
							Donec vel tincidunt quam. Donec sed dictum quam, nec rutrum risus. Praesent ac tortor ut leo luctus cursus nec pharetra odio. Sed id orci id quam commodo congue eget eget erat. Quisque luctus posuere pharetra.        
						</div> 
						
					</div>
				  </div>-->    
								
				</div>                                
            </div>   <!-- END Reviews Tab -->          
        
        </div>        
    </section> <!-- END Description, On the Web, Reviews Tabs --> 
    
    <!-- Related Images ... will implement this in assignment 2 -->    
    <section class="ui container">
    <h3 class="ui dividing header">Related Works</h3>        
	</section>  
	
</main>    
    

    
  <footer class="ui black inverted segment">
      <div class="ui container">footer</div>
  </footer>
</body>
</html>
