<?
include 'config.php';
include 'function.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Contact</title>

<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

<!--[if IE 7]>
<link rel="stylesheet" href="style-ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 6]>
<link rel="stylesheet" href="style-ie6.css" type="text/css" media="screen" />
<![endif]-->

</head>

<body>
<div id="main">

<? include 'header.php'; ?>

	<div id="content">
		
		<div class="sidebar_left">

	<ul>
						
		<li class="categories"><h2>Categories</h2>
		<ul>	
<?
foreach ($kategori as $sirala){
echo '<li class="cat-item cat-item-55"><a href="./ara.php?q='.$sirala.'">'.$sirala.'</a></li>';
}
?>
		</ul>
		</li>	
<? /*
	<li id="linkcat-2" class="linkcat"><h2>Blogroll</h2>
	<ul class='xoxo blogroll'>
<li><a href="http://wordpress.org/development/">Development Blog</a></li>

<li><a href="http://codex.wordpress.org/">Documentation</a></li>
<li><a href="http://wordpress.org/extend/plugins/">Plugins</a></li>
<li><a href="http://wordpress.org/extend/ideas/">Suggest Ideas</a></li>
<li><a href="http://wordpress.org/support/">Support Forum</a></li>
<li><a href="http://wordpress.org/extend/themes/">Themes</a></li>
<li><a href="http://planet.wordpress.org/">WordPress Planet</a></li>

	</ul>
</li>
*/ ?>		
		</ul>

	
</div>
		<div class="homebody2">
<form method="POST" action="ilet.php">
	<p><strong>Name :</strong><br><input class="searchform_top_text" type="text" name="ad" size="20"></p><br>
	<p><strong>E-Mail :</strong><br><input class="searchform_top_text" type="text" name="email" size="20"></p><br>
	<p><strong>Subject :</strong><br><input class="searchform_top_text" type="text" name="konu" size="20"></p><br>
	<p><strong>Message :</strong><br><textarea rows="10" name="mesaj" cols="35"></textarea></p>
	<hr style="border: 1px solid rgb(204, 204, 204);">
	<p><input type="submit" value="Submit" name="B1"></p>
</form>
		</div>

	</div>
	
<? include 'footer.php'; ?>

</div>
</body>
</html>