<!doctype html>
<html lang="en">
<head>
<?php
$sitename = 'challenge.php';
$pagetitle;
if(isset($pagetitle)){
 echo "<title>$pagetitle.$sitename</title>";
} 
  else {
echo "<title>$sitename</title>";
}
?>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
	<div class="overlay">
<h1>Simply The Best</h1>
<h3>Reasons for Choosing US</h3>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </p>
	<br>
	<button>READ MORE</button>
		</div>
</header>
<div class="main">
              <a href="main2.php" title=home>home</a>
              <a href="#about" title=about>about</a>
              <a href="main2.php#wrapper" title=contact>feedback</a>
       </div><!--main-->
<div class="about" id="about">
	<p>Lorem ipsum dolor sit amet, audiam principes repudiandae eu pro, impetus expetendis voluptatum ea mei. No mea 
pertinax adipiscing, veri latine ad mei, ex nam doctus option fabulas. Iusto intellegam definitionem ea cum. Te tale tempor mentitum eam, mazim utinam omnesque sea ea, hinc probatus reprehendunt eos ne.Et pri laoreet urbanitas, est at harum option minimum. </p>
</div>



