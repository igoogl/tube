<?
include 'config.php';
include 'function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title><?=$atitle?></title>
<meta name="description" content="<?=$adescription?>" />
<meta name="keywords" content="<?=$akeywords?>" />

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

		<div class="homebody">

			<div class="randomposts">

			
				<h2><?=$atitle?></h2>

<?

//Sırlama
if (empty($sayfada)){$sayfada='20';}else{$sayfada=$sayfada;}
if (empty($syf)){$syf=1;}else{$syf=$_REQUEST['syf'];}
if ($syf=="1"){
$limit1=1;
}else{
$limit1=($syf*$sayfada);
}



//Rastgele veri alınıyor
shuffle($anaara);

$q=$_REQUEST['q'];
if (empty($q)){$q=$anaara[0];}


$listele=$_REQUEST['listele'];
if (empty($listele)){$listele='relevance';}else{$listele=$listele;}

$html=curlspider('http://gdata.youtube.com/feeds/mobile/videos?vq='.urlencode($q).'&orderby='.$listele.'&max-results='.$sayfada.'&start-index='.$limit1.'&format=1');
preg_match_all('#<entry>(.+?)</entry>#smi',$html,$bul);
$bul=$bul[1];
preg_match_all('#<openSearch:totalResults>(.+?)</openSearch:totalResults>#smi',$html,$toplamkayit);
$toplamkayit=$toplamkayit[1][0];
if ($toplamkayit<=0){
echo "Malesef :(<br>Aradığınızı bulamadık!";
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
						
							<a href="<?=seolinkvideo($vid,$title)?>"	 title="<?=$title?>"><img src="<?=seolinkres($vid,$title)?>" width="120" height="72" alt="<?=$title?>" /></a>
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
if ($i=="7" ){//|| $i=="5" || $i=="8"
include("ads/468.php");
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

			<div class="sidebar_right">

	<div class="ads300">
<? include 'ads/300.php'; ?>
	</div>

	<div class="rightvideo">
	<embed type="application/x-shockwave-flash" src="player.swf" quality="high" allowfullscreen="true" flashvars="file=http://www.youtube.com/watch?v=<?=$vid?>&type=youtube&image=http://i2.ytimg.com/vi/<?=$vid?>/hqdefault.jpg" width="300" height="250"></embed>
	</div>

<? /*
	<div class="whatsnew">
		<h2>What's New</h2>
		
		<div class="allblogs">
			<a href="http://www.youvido.com/c/whats-new" title="Read All Blog Posts">Read more in our Blog</a>
		</div>
	</div>
*/ ?>
	
</div>
	</div>

<? include 'footer.php'; ?>

</div>
</body>
</html>