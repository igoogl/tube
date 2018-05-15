<?
include 'config.php';
include 'function.php';

$vid = firewall($_GET['vid']);
$vid  = str_replace(' ', '+',$vid );
$vid=decrypt($vid);

$html=curlspider('http://gdata.youtube.com/feeds/mobile/videos/'.$vid.'');

//Burdan başla
preg_match_all('#<title type=\'text\'>(.+?)</title>#smi',$html,$title);
$title=$title[1][0];
preg_match_all('#<media:keywords>(.+?)</media:keywords>#smi',$html,$etiket);
$etiket2=$etiket[1][0];
$etiket=etiket($etiket2);
preg_match_all('#<media:description type=\'plain\'>(.+?)</media:description>#smi',$html,$aciklama);
$aciklama=strip_tags($aciklama[1][0]);


preg_match_all('#average=\'(.+?)\'#smi',$html,$rating);
$rating=$rating[1][0];
preg_match_all('#<published>(.+?)T(.+?)</published>#smi',$html,$eklenme);
$eklenme=$eklenme[1][0];
preg_match_all('#numRaters=\'(.+?)\'#smi',$html,$oylama);
$oylama=$oylama[1][0];

preg_match_all('#<media:thumbnail url=\'(.+?)\' height=\'90\'#smi',$html,$th);
$th=$th[1][1];
preg_match_all('#<media:category(.+?)>(.+?)</media:category>#smi',$html,$kategori);
$kategori=$kategori[2][0];
preg_match_all('#<name>(.+?)</name>#smi',$html,$name);
$name=$name[1][0];
preg_match_all('#countHint=\'(.+?)\'/></gd:comments>#smi',$html,$yorumsay);
$yorumsay=$yorumsay[1][0];
preg_match_all('#viewCount=\'(.+?)\'/>#smi',$html,$viewsay);
$viewsay=$viewsay[1][0];
preg_match_all('#<yt:duration seconds=\'(.+?)\'/>#smi',$html,$sure);
$sure=$sure[1][0];
preg_match_all('#videos/(.+?)</id>#smi',$html,$vid);
$vid=$vid[1][0];
$kalan=$sure % 60;
if ($kalan=="0"){
$ab=$sure/60;
$sure=''.$ab.':00';
}else{
$ab=(($sure-$kalan)/60);
$sure=''.$ab.':'.$kalan.'';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?=$title?> <?=$vtitle?></title>
<? //Bu alanda meta keywords ve description da mutlaka değişiklik yapın, diğer sitelerden bi farkınız olsun :) ?>
<meta name="description" content="listen to <?=$title?>, <?=strtoupper($title)?> watch, <?=ucwords($title)?> youtube videos, <?=kisalt($aciklama,50,'...');?>" />
<meta name="keywords" content="listen to <?=$title?>, <?=strtoupper($title)?> watch, <?=ucwords($title)?> download, <?=strtoupper($title)?> videos, youtube, share. " />

<meta name="title" content="<?=$title?>" /> 
<link rel="thumbnail" type="image/jpeg" href="http://i2.ytimg.com/vi/<?=$vid?>/default.jpg" />
<link rel="image_src" href="http://i2.ytimg.com/vi/<?=$vid?>/hqdefault.jpg" />


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

		<div class="singlebody">
		
		
			<div class="singlepost">
			
				<h2><?=$title?></h2>

				<div class="videogame">
				
								
					<div class="videopart">
<embed type="application/x-shockwave-flash" src="player.swf" quality="high" allowfullscreen="true" flashvars="file=http://www.youtube.com/watch?v=<?=$vid?>&type=youtube&image=http://i2.ytimg.com/vi/<?=$vid?>/hqdefault.jpg" width="640" height="390"></embed>
					</div>
					<div align="center"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2752741932348751";
/* wwwwwwwww */
google_ad_slot = "2142773202";
google_ad_width = 468;
google_ad_height = 60;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
					<div class="postinformation">
					
						<div class="postviewpart">
						<?=$viewsay?> views						</div>
					
						<p><font style="font-weight:bold;">Tags:</font> <?=etiket($etiket2)?></p>						
						<p><font style="font-weight:bold;">Description:</font><br><?=$aciklama?> </p>
						
					</div>

					
								
				</div>
				
				<div class="share">
					<ul class="sharing-cl" id="text">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style">
						<li><a class="addthis_button_facebook">Facebook</a></li>
						<li><a class="addthis_button_email">E-Mail</a></li>
						<li><a class="addthis_button_favorites">Favorites</a></li>
						<li><a class="addthis_button_print">Print</a></li>
						<li><a href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c38f9bd14108aae" class="addthis_button_expanded">Other</a></li>
						</div>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=xa-4c38f9bd14108aae"></script>
						<!-- AddThis Button END -->

					</ul>
<script type="text/javascript" src="http://adhitzads.com/529398"></script>
				</div>
			
			</div>
			
	
		</div>

			<div class="sidebar_right">
	<div class="ads300">
	<? include 'ads/300.php' ?>
	</div>
	<div class="whatsnew">
		<h2>Regular videos</h2>
<? include 'benzer.php' ?>
		</div>
	
</div>
	</div>

<? include 'footer.php'; ?>

</div>
</body>
</html>