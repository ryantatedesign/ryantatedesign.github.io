<?php 
extract($_GET);
$page = isset($page) ? $page : 'home';

// CHANGE THIS:

// This menu list highlights which of the top link the site need to activate when opened.
// Everytime you add a new page, add the page in here.
// Pattern: "Page title" points to "filename in page folder"
// e.g. "design" => "home",
$products_page = array(
					"all"            => "products",
					"aura audio"     => "aura",
					"bicycle helmet" => "bicycle_helmet",
					"bicygnals"      => "bicygnals",
					"espresso"       => "espresso",
					"invite"         => "invite",
					//"art pack"       => "packaging",
					"pond life"      => "mathmos_gobo",
					"propper table"  => "table",
					"solar"          => "solar",
					"soltan"         => "soltan",
					"thinkers 50"    => "thinkers_50",
					"thinkers 50 2013"    => "thinkers_50_2013",
				);

$environment_page = array(
					"all"               => "environments",
					"exhibition"        => "exhibition",
				//	"ftc event"         => "ftc_event",
					"healthcare"        => "healthcare",
					"information"       => "information_point",
					
				);

$communication_page = array(
				//	"all"            => "communications",
				//	"CE identity"    => "CE_identity",
				     "strategy"      => "comms",
				//	"CE website"    => "CE_website",
					
				);

// Change this default email message

$mail_to            = "ryan@ryantatedesign.com";
$mail_from          = "ryan@ryantatedesign.com";
$mail_subject       = "Contact Us";
$mail_thank_you_msg = 'Thank you for your message.';

// END

session_start();

//require 'Mailer.php';
require 'class.phpmailer.php';
include 'mailme.php';

if(in_array($page, $products_page)) {
	$on = "products";
} elseif (in_array($page, $environment_page)) {
	$on = "environments";
} elseif (in_array($page, $communication_page)) {
	$on = "graphics";
} else {
	$on = $page;
}

?>
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Ryan Tate</title>
  
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/extra.css" />
  <link rel="stylesheet" href="css/iphone.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
  <script src="js/vendor/jquery.js"></script>

  <script src="js/vendor/custom.modernizr.js"></script>
  
  
</head>
<body>
	<div class="row">
		<div class="large-3 columns"><div id="logo"><a href="./"><img src="img/logohi.png" /></a></div></div>
		<div class="large-9 columns bottom-align" style="z-index:10">
			<ul class="menu">
				<!-- <li><a href="./" class="<?=(($on=='home') ? ' active' : '')?>">design</a></li> -->
				<li><a class="hasdrop <?=(($on=='products') ? ' active' : '')?>">product</a>
					<ul>
						<?php foreach($products_page as $title => $link) : ?>
						<li><a href="<?=$link?>"><?=$title?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li><a class="hasdrop <?=(($on=='environments') ? ' active' : '')?>">environment</a>
					<ul>
						<?php foreach($environment_page as $title => $link) : ?>
						<li><a href="<?=$link?>"><?=$title?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li><a class="hasdrop <?=(($on=='communications') ? ' active' : '')?>"><span id="commsscr">communication</span><span id="commsmob">comms</span></a>
					<ul>
						<?php foreach($communication_page as $title => $link) : ?>
						<li><a href="<?=$link?>"><?=$title?></a></li>
						<?php endforeach; ?>
					</ul>
				</li>
				<li><a href="contact" class="<?=(($on=='contact') ? ' active' : '')?>">contact</a></li>
			
			</ul>
  </div>
  </div>
  
<!-- End Header and Nav -->

<!-- First Band (Slider) -->
<?php
include('pages/'.$page.'.php');
?>
  
    

  <!-- Footer -->
  
  <footer class="row">
    <?=$browser?>
  </footer>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-41451601-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  <script src="js/foundation.min.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script>
    $(document).foundation();
	$(document).ready(function(){
		$('.product-box').on("mouseenter",function(){
			$('.mask').css({top:300,opacity:0});
			$('.mask',this).animate({
				top:0,
				opacity:1
			},200);
		}).on("mouseleave",function(){
			$('.mask').css({top:300,opacity:0});
		});
		
		$('.menu > li').click(function(e){
			//$('.hasdrop ul').css('display','block');
		});

		$("ul.orbit-slides-container").each(function() 
		{
			if($(this).children("li").length <= 3)  //If there is only one "slide"
			{
				$(this).siblings("a.orbit-prev, a.orbit-next").hide(); //Hides controls on load
				$(this).siblings('.orbit-timer').click(); //Clicks pause
			}
		});
		
	});

  </script>
  </body>
</html>
