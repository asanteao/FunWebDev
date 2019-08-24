<?php
include 'travel-data.inc.php';
ini_set('error_log', 'my_errors.log');



//asort($idontexist);
//$html .= "adding to undefined string array";
$sql = "select field1, field2, from sometable where field3='";
//$values = mysql_query($sql);

$id = 77;
$requested = $images[$id];     
    
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chapter 15</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="row">
            <?php include 'left.inc.php'; ?>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-8">

                        <img class="img-responsive" src="images/medium/<?php echo $requested['path']; ?>" alt="<?php echo $requested['title']; ?>">

                        <p class="description"><?php echo $requested['description']; ?></p>
                    </div>

                    <div class="col-md-4">
                        <h2><?php echo $requested['title']; ?></h2>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <ul class="details-list">
                                    <li>By: <a href="#"><?php echo $requested['user']; ?></a></li>
                                    <li>Country: <a href="#"><?php echo $requested['country']; ?></a></li>
                                    <li>City: <a href="#"><?php echo $requested['city']; ?></a></li>
                                    <li>Taken on: <?php echo $requested['unknown']; ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-save" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span></button>
                            </div>
                        </div>

                        <h4>Tags</h4>
                        <?php doesnotexist(); ?>
                        <div class="panel panel-default">
                            <div class="panel-body" id="tags">
                                <?php foreach ($requested['tags'] as $tag) { ?>
                                    <span class="label label-default"><?php echo $tag; ?></span>
                                <?php } ?>

                            </div>
                        </div>

                    </div>  <!-- end right-info column -->
                </div>  <!-- end row -->
                
                
                
            <!-- Related Projects Row -->

            <!-- /.row -->
                            

            </div>  <!-- end main content area -->
        </div>
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
