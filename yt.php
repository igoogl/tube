<?
include 'config.php';
include 'function.php';

$vid = $_GET['git'];
$gideyimbari=decode($vid, $key);

header("Location: proxy.php?v=$gideyimbari");
//header("Location: http://hxcmusic.com/testing/youtube.php?url=http://www.youtube.com/watch?v=$gideyimbari&=.mp4");
//header("Location: http://www.musicela.com/facebook/playsong.php?id=$gideyimbari");
?>