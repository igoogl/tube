<?
include 'config.php';
include 'function.php';

$q=$_REQUEST['q'];
$syf=$_REQUEST['syf'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?if (empty($q)){echo "Videos - $atitle";}else{echo "$q watch, ".strtoupper($q)." download, listen to".ucwords($q).", $q videos";} ?></title>
<meta name="description" content="<?=$q?> videos, <?=strtoupper($q)?> watch, listen to <?=ucwords($q)?> , <?=$q?> search" />
<meta name="keywords" content="listen to <?=$q?>, <?=strtoupper($q)?> watch, <?=ucwords($q)?> download, <?=strtoupper($q)?> search youtube. " />

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

			<div class="randomposts">
			
	  	
	  
		<h2 class="pagetitle"><?if (empty($q)){echo 'Videos';}else{echo "listen to $q, ".strtoupper($q)." watch video, ".ucwords($q)." download, $q clips";} ?></h2>
<?
include 'ads/728.php';

//Rastgele veri alınıyor
shuffle($anaara);

if (empty($sayfada)){$sayfada='20';}else{$sayfada=$sayfada;}
if (empty($syf)){$syf=1;}else{$syf=$_REQUEST['syf'];}
if ($syf=="1"){
$limit1=1;
}else{
$limit1=($syf*$sayfada);
}
if (empty($q)){$q=$anaara[0];}else{$q=$_REQUEST['q'];}

/* Yasaklı kelimleri burdan düzenleyebilirsiniz.
$q=str_replace("pkk","klip",$q);
$q=str_replace("terör","klip",$q);
$q=str_replace("teror","klip",$q);
$q=str_replace("terorizm","klip",$q);
$q=str_replace("terörizm","klip",$q);
$q=str_replace("porno","erotik",$q);
$q=str_replace("adult","klip",$q);
$q=str_replace("terorist","klip",$q);
$q=str_replace("porn","klip",$q);
$q=str_replace("porno","klip",$q);
$q=str_replace("seks","klip",$q);
$q=str_replace("sex","klip",$q);
$q=str_replace("sexi","klip",$q);
$q=str_replace("sexy","klip",$q);
$q=str_replace("sikiş","klip",$q);
$q=str_replace("sikis","klip",$q);
$q=str_replace("lezbiyen","klip",$q);
$q=str_replace("ass","klip",$q);
$q=str_replace("teen","klip",$q);
$q=str_replace("tanga","klip",$q);
$q=str_replace("pusy","klip",$q);
$q=str_replace("pusy","klip",$q);
$q=str_replace("webcam","klip",$q);
$q=str_replace("hot webcam","klip",$q);
$q=str_replace("hot girl","klip",$q);
$q=str_replace("erotik","klip",$q);
$q=str_replace("fetish","klip",$q);
$q=str_replace("tecavuz","klip",$q);
$q=str_replace("tecavüz","klip",$q);
$q=str_replace("erotic","klip",$q);
$q=str_replace("etek altı","klip",$q);
$q=str_replace("pantyhose","klip",$q);
$q=str_replace("lesbian kiss","klip",$q);
$q=str_replace("frikik","klip",$q);
$q=str_replace("tecavüz","klip",$q);
$q=str_replace("kızlık bozma","klip",$q);
$q=str_replace("redtube","klip",$q);
$q=str_replace("göt","klip",$q);
$q=str_replace("meme","klip",$q);
$q=str_replace("adult","klip",$q);
$q=str_replace("upskirt","klip",$q);
$q=str_replace("up skirt","klip",$q);
$q=str_replace("gay","klip",$q);
$q=str_replace("gays","klip",$q);
$q=str_replace("sevişme","klip",$q);
$q=str_replace("sevisme","klip",$q);
$q=str_replace("kissing","klip",$q);
$q=str_replace("fucking","klip",$q);
$q=str_replace("fuck","klip",$q);
$q=str_replace("masturbating","klip",$q);
$q=str_replace("pussy","klip",$q);
$q=str_replace("amcık","klip",$q);
$q=str_replace("amcik","klip",$q);
$q=str_replace("foot","klip",$q);
$q=str_replace("mastürbasyon","klip",$q);
$q=str_replace("seducing","klip",$q);
$q=str_replace("domalma","klip",$q);
$q=str_replace("heels","klip",$q);
$q=str_replace("xxx","klip",$q);
$q=str_replace("seduced","klip",$q);
$q=str_replace("miniskirts","klip",$q);
$q=str_replace("nude","klip",$q);
$q=str_replace("öpüşme","klip",$q);
$q=str_replace("öpüşenler","klip",$q);
$q=str_replace("sevişme","klip",$q);
$q=str_replace("sevişenler","klip",$q);
$q=str_replace("school girl","klip",$q);
$q=str_replace("fetish","klip",$q);
$q=str_replace("footjob","klip",$q);
$q=str_replace("hot teen","klip",$q);
$q=str_replace("booty","klip",$q);
$q=str_replace("mini skirt","klip",$q);
$q=str_replace("tits","klip",$q);
$q=str_replace("micro mini skirt","klip",$q);
$q=str_replace("boobs","klip",$q);
$q=str_replace("milfs","klip",$q);
$q=str_replace("milf","klip",$q);
$q=str_replace("tit","klip",$q);
$q=str_replace("shorts","klip",$q);
$q=str_replace("tight shorts","klip",$q);
$q=str_replace("candid","klip",$q);
$q=str_replace("kissing","klip",$q);
$q=str_replace("asian school girls","klip",$q);
$q=str_replace("asian school girl","klip",$q);
$q=str_replace("türbanlı","klip",$q);
*/

$listele=$_REQUEST['listele'];
if (empty($listele)){$listele='relevance';}else{$listele=$listele;}

$html=curlspider('http://gdata.youtube.com/feeds/mobile/videos?vq='.urlencode($q).'&orderby='.$listele.'&max-results='.$sayfada.'&start-index='.$limit1.'&format=1');
preg_match_all('#<entry>(.+?)</entry>#smi',$html,$bul);
$bul=$bul[1];
preg_match_all('#<openSearch:totalResults>(.+?)</openSearch:totalResults>#smi',$html,$toplamkayit);
$toplamkayit=$toplamkayit[1][0];
if ($toplamkayit<=0){
echo "Video Bulunamadı";
}
$bulsay=count($bul)-1;
for ($i=0;$i<=$bulsay;$i++){
preg_match_all('#<title type=\'text\'>(.+?)</title>#smi',$bul[$i],$title);
$title=$title[1][0];
preg_match_all('#<gd:rating average=\'(.+?)\' max=#smi',$bul[$i],$rating);
$rating=$rating[1][0];
preg_match_all('#<published>(.+?)T(.+?)</published>#smi',$bul[$i],$eklenme);
$eklenme=$eklenme[1][0];

preg_match_all('#<media:keywords>(.+?)</media:keywords>#smi',$bul[$i],$etiket);
$etiket=etiket(kisalt($etiket[1][0],150,'...'));
preg_match_all('#<media:description type=\'plain\'>(.+?)</media:description>#smi',$bul[$i],$aciklama);
$aciklama=strip_tags($aciklama[1][0]);
preg_match_all('#<media:thumbnail url=\'(.+?)\' height=\'90\'#smi',$bul[$i],$th);
$th=$th[1][1];
preg_match_all('#<media:category(.+?)>(.+?)</media:category>#smi',$bul[$i],$kategori);
$kategori=$kategori[2][0];
preg_match_all('#<name>(.+?)</name>#smi',$bul[$i],$name);
$name=$name[1][0];
preg_match_all('#countHint=\'(.+?)\'/></gd:comments>#smi',$bul[$i],$yorumsay);
$yorumsay=$yorumsay[1][0];
preg_match_all('#viewCount=\'(.+?)\'/>#smi',$bul[$i],$viewsay);
$viewsay=$viewsay[1][0];
preg_match_all('#<yt:duration seconds=\'(.+?)\'/>#smi',$bul[$i],$sure);
$sure=$sure[1][0];
preg_match_all('#videos/(.+?)</id>#smi',$bul[$i],$vid);
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

					<div class="posts2">
						<div class="postimage">
							<a href="<?=seolinkvideo($vid,$title)?>" title="<?=$title?>"><img src="<?=seolinkres($vid,$title)?>" width="120" height="72" alt="<?=$title?>" /></a>
						</div>

						<div class="postinfo">
							<a href="<?=seolinkvideo($vid,$title)?>" title="<?=$title?>"><?=kisalt($title,30,'...');?></a>
						</div>
						<div class="postviews">
							<?=$eklenme?>  
						</div>
						<div class="postviews">
							<?=$viewsay?> views  
						</div>

					</div>
<?
if ($i=="9" ){//|| $i=="5" || $i=="8"
include("ads/728.php");
}
?>
<?}?>
			
			</div>

		<div id="pagination">
<?
$total_records = $toplamkayit; // toplam veri sayısı
$scroll_page = 15; // kaydırılacak sayfa sayısı
$per_page = $sayfada; // her sayafa gösterilecek sayfa sayısı
$current_page = $_GET['syf']; // bulunulan sayfa
$pager_url = 'ara.php?&q='.$q.'&syf='; // sayfalamanın yapıldığı adres
$inactive_page_tag = 'syf='; // aktif olmayan sayfa linki için biçim
$previous_page_text = '<'; // önceki sayfa metni (resim de olabilir <img src="... gibi)
$next_page_text = '>'; // sonraki sayfa metni (resim de olabilir <img src="... gibi)
$first_page_text = '<<'; // ilk sayfa metni (resim de olabilir <img src="... gibi)
$last_page_text = '>>'; // son sayfa metni (resim de olabilir <img src="... gibi)

$kgPagerOBJ = new kgPager();
$kgPagerOBJ -> pager_set($pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text,$pager_url_last);

echo '<p align="center" id="pager_links">';
echo $kgPagerOBJ -> first_page;
echo $kgPagerOBJ -> previous_page;
echo $kgPagerOBJ -> page_links;
echo $kgPagerOBJ -> next_page;
echo $kgPagerOBJ -> last_page;
echo '</p>';
?>
		</div>
		
		</div>

	</div>
	
<? include 'footer.php'; ?>

</div>
</body>
</html>