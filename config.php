<?
//Site adress
$asiteadresi = 'http://kolnews.pe.hu/';

//Site name
$asiteadi = 'tuby';

//
$asitebaslik = '<h1>tuby kolnews</h1>';
//$asitebaslik = '<img src="http://tuby.host.sklogo.gif">'; 

//Title
$atitle= 'tuby';

//Meta description and keywords
$adescription= 'waledsat v.';
$akeywords= 'video,youtube,fan,Insurance,Gas/Electricity,Mortgage,Attorney,Claim,Loans,Conference Call,Donate,Lawyer,Recovery,Degree,Treatment ,Credit,Software,Classes ,Rehab,Trading,Hosting,Transfer,arkansas mesothelioma attorney,illinois lawyer mesothelioma,chicago mesothelioma lawyer,oklahoma mesothelioma lawyers,car donations boston,car donation madison wi,mesothelioma lawyer florida,asbestos solicitor,mesothelioma lawyer asbestos cancer lawsuit,free advertising las vegas,gerber gentle flex pacifier,donate your car los angeles,black horizon,business cards christmas,accident denver lawyer,personal trainer insurance quotes,Autos,Vehicles,Movies,Comedy,Education,Film,Animation,Gaming,Style,Music,News,Politic,Nonprofits,Blogs,Pets,Animals,Science,Technology';

//Video page title
$vtitle= 'watch and download video';

//Contact mail
$to= 'waled.mylove60@gmail.com';

//Footer
$afooter= 'Copyright -kolnews';

//amung.us
$amung= 'anb5qcgg7hru';

//YT Video PassWord for youtube video id encryt
$key = 'r3c';

//Categories
$kategori = array(
		'Autos & Vehicles',
		'Comedy',
		'Education',
		'Entertainment',
		'Film & Animation',
		'Gaming',
		'Howto & Style',
		'Music',
		'News & Politics',
		'Nonprofits & Activism',
		'People & Blogs',
		'Pets & Animals',
		'Science & Technology',
		'Sports',
		'Travel & Events',
);

//Home page search keywords
$anaara = array(
		'rock',
		'music',
		'news',
		'avril lavigne',
		'kerli',
		'elvis presley',
		'eurovision',
		'dj shantel',
		'50 cent',
		'cranberries',
		'evanescence',
		'high school musical',
		'acdc',
		'top 10',
		'timbaland',
		'cassie',
		'britney spears',
		'user',
		'craig david',
		'bob sinclair',
		'jordin sparksft',
		'cris brown',
		'lil wayne',
		'katty perry',
);

//CURL function *DONT MIX
function curlspider($feed){
$ch = curl_init();
$timeout = 0;
curl_setopt ($ch, CURLOPT_URL, $feed);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt ($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
//curl_setopt ($ch, CURLOPT_USERAGENT, "Google-Bot");
curl_setopt ($ch, CURLOPT_REFERER, "http://www.google.com/bot.html");
$xml = curl_exec($ch);
curl_close($ch);
	return $xml;
}

?>