<?php
session_start();
$_SESSION['pageId'] = 1;
require_once('Navigation.php');
include_once ("CMS/CMSPageContentFunctions.php");
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
					<a href="<?php echo getPageUrlFromPageName('Home');?>">
						HOME
					</a>
				</li>
				<li>
                    <a href="<?php echo getPageUrlFromPageName('AboutMe');?>">
						ABOUT ME
					</a>
				</li>
				<li>
                    <a href="<?php echo getPageUrlFromPageName('Portfolio');?>">
						PORTFOLIO
					</a>
				</li>
				<li>
					<<a href="<?php echo getPageUrlFromPageName('ContactMe');?>">
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
                        <?php echo getContentWithTextLabel('Blurb Header')['textContent']?>
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
                    <img src="<?php echo getContentWithTextLabel('Info Item 1')['imageLocation']?>"/>
					<p>
						<?php echo getContentWithTextLabel('Info Item 1')['textContent']?>
					</p>
				</div>
				<div class="infoItem">
                    <img src="<?php echo getContentWithTextLabel('Info Item 2')['imageLocation']?>"/>
                    <p>
                        <?php echo getContentWithTextLabel('Info Item 2')['textContent']?>
                    </p>
				</div>
				<div class="infoItem">
                    <img src="<?php echo getContentWithTextLabel('Info Item 3')['imageLocation']?>"/>
                    <p>
                        <?php echo getContentWithTextLabel('Info Item 3')['textContent']?>
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