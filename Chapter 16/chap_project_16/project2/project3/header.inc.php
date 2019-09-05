<?php
//start session to make $_SESSION available if session has not been started already
if(isset($_SESSION)) {
	//Do nothing
} else {
	session_start();
}

function getNumOfFavs() {
	if(isset($_SESSION['numOfFavs']) && $_SESSION['numOfFavs'] > 0) {
		echo '<span class="ui red mini label">';
		echo $_SESSION['numOfFavs'];
		echo '</span>';
	} else {
		//Output nothing
	}
}
?>
<header>
    <div class="ui attached stackable grey inverted  menu">
        <div class="ui container">
            <nav class="right menu">
                <div class="ui simple  dropdown item">
                  <i class="user icon"></i>
                  Account
                    <i class="dropdown icon"></i>
                  <div class="menu">
                    <a class="item"><i class="sign in icon"></i> Login</a>
                    <a class="item"><i class="edit icon"></i> Edit Profile</a>
                    <a class="item"><i class="globe icon"></i> Choose Language</a>
                    <a class="item"><i class="settings icon"></i> Account Settings</a>
                  </div>
                </div>
                <a href="/view-favorites.php" class=" item">
                  <i class="heartbeat icon"></i> Favorites
		  <?php getNumOfFavs(); ?>
                </a>
                <a class=" item">
                  <i class="shop icon"></i> Cart
                </a>
            </nav>
        </div>
    </div>

    <div class="ui attached stackable borderless huge menu">
        <div class="ui container">
            <h2 class="header item">
              <img src="images/logo5.png" class="ui small image" >
            </h2>
            <a class="item">
              <i class="home icon"></i> Home
            </a>
            <a class="item">
              <i class="mail icon"></i> About Us
            </a>
            <a class="item">
              <i class="home icon"></i> Blog
            </a>
            <div class="ui simple dropdown item">
              <i class="grid layout icon"></i>
              Browse
                <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item"><i class="users icon"></i> Artists</a>
                <a class="item"><i class="theme icon"></i> Genres</a>
                <a class="item"><i class="paint brush icon"></i> Paintings</a>
                <a class="item"><i class="cube icon"></i> Subjects</a>
              </div>
            </div>
            <div class="right item">
                <div class="ui mini icon input">
                  <input type="text" placeholder="Search ...">
                  <i class="search icon"></i>
                </div>
            </div>

        </div>
    </div>
</header>

