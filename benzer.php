<?
$sayfada=$_REQUEST['sayfada'];
if (empty($sayfada)){$sayfada='10';}else{$sayfada=$sayfada;}
$syf=$_REQUEST['syf'];
if (empty($syf)){$syf=1;}else{$syf=$_REQUEST['syf'];}
if ($syf=="1"){
$limit1=1;
}else{
$limit1=($syf*$sayfada);
}

$listele=$_REQUEST['listele'];
if (empty($listele)){$listele='published';}else{$listele=$listele;}


$html=curlspider('http://gdata.youtube.com/feeds/mobile/videos/'.$vid.'/related?orderby='.$listele.'&max-results='.$sayfada.'&start-index='.$limit1.'');
preg_match_all('#<entry>(.+?)</entry>#smi',$html,$bul);
$bul=$bul[1];
preg_match_all('#<openSearch:totalResults>(.+?)</openSearch:totalResults>#smi',$html,$toplamkayit);
$toplamkayit=$toplamkayit[1][0];
if ($toplamkayit<=0){echo 'Bulunamadı';} 
$bulsay=count($bul)-1;
for ($i=0;$i<=$bulsay;$i++){

preg_match_all('#<title type=\'text\'>(.+?)</title>#smi',$bul[$i],$btitle);
$btitle=$btitle[1][0];
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
preg_match_all('#videos/(.+?)</id>#smi',$bul[$i],$bid);
$bid=$bid[1][0];
$kalan=$sure % 60;
if ($kalan=="0"){
$ab=$sure/60;
$sure=''.$ab.':00';
}else{
$ab=(($sure-$kalan)/60);
$sure=''.$ab.':'.$kalan.'';
}
?>
			<div class="singleright">
				<div class="singlerightimage">

					<a href="<?=seolinkvideo($bid,$btitle)?>" title="<?=$btitle?>"><img src="<?=seolinkres($bid,$btitle)?>" width="90" height="54" alt="<?=$btitle?>" /></a>
				</div>
				<div class="singlerighti">
					<div class="singlerightinfo">
						<a href="<?=seolinkvideo($bid,$btitle)?>" title="<?=$btitle?>"><?=kisalt($btitle,50,'...');?></a>
					</div>
					<div class="postviews">
						<?=$viewsay?> views  
					</div>
					<div class="postviews">
					<a href="<?=seolinkara($name)?>"><?=$name?></a> 
					</div>
				</div>
			</div>
<?}?>
