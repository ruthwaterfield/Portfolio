<?php
session_start();
$_SESSION['pageId'] = 1;
include("homeFunctions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title> Ruth V Waterfield - HOME </title>
	<link rel="stylesheet" type="text/css" href="Styles/normalize.css">
	<link rel="stylesheet" type="text/css" href="Styles/theme.css">
	<link rel="stylesheet" type="text/css" href="Styles/homeStyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<header>
		<h1> 
			Ruth V Waterfield
		</h1>
		<nav>
			<ul>
				<li>
					<a href="index.php">
						HOME
					</a>
				</li>
				<li>
					<a href="aboutMe.php">
						ABOUT ME
					</a>
				</li>
				<li>
					<a href="portfolio.php">
						PORTFOLIO
					</a>
				</li>
				<li>
					<a href="contactMe.php">
						CONTACT ME
					</a>
				</li>
			</ul>
		</nav>
	</header>
	
	<article>
		<div class= "central">
			
			<section class="upperSection">
				<div class="blurb">
					<h2>
<!--						Lorem ipsum dolor -->
                        <?php echo getPageText('blurb_header'); ?>
					</h2>
					<p>
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
					</p>
					<div class="link">
						<a href="aboutMe.html">
							ABOUT ME
						</a>
					</div>
				</div>
			</section>
	
			<section class="lowerSection">
				<div class="infoItem">
					<img src="Images/markus-spiske-357131.jpg" />
					<p>
						Software
					</p>
				</div>
				<div class="infoItem">
					<img src="Images/bath-1988875_1920.jpg">
					<p>
						Bath
					</p>
				</div>
				<div class="infoItem">
					<img src="Images/spaghetti-ingredients-2378728_1920.jpg">
					<p>
						Food
					</p>
				</div>
			</section>
		</div>
	</article>	
		 
	
	<footer>
		<nav>
			<a href="https://twitter.com/login?lang=en">
				<img src="Images/if_Twitter_logo_2258490.png">
			</a>
			<a href="https://en-gb.facebook.com/">
				<img src="Images/if_Facebook_logo_2258500.png">
			</a>
			<a href="https://www.google.co.uk/">
				<img src="Images/if_G_google._logo_2258499.png">
			</a>
			<a href="https://uk.linkedin.com/">
				<img src="Images/if_Linkedin_logo_2258497.png">
			</a>
			<a href="https://www.instagram.com/?hl=en">
				<img src="Images/if_Instagram_logo_2258498.png">
			</a>			
		</nav>
		<p>
			&#169; 2017 by Ruth V Waterfield. All rights reserved.
		</p>
	</footer>			
	
</body>

</html>