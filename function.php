 <?php
/*********************/
/*                   */
/*                   */
/*     D.t6wer       */
/*                   */
/*                   */
/*********************/

class kgPager
{

    public $total_records = NULL;
    public $start = NULL;
    public $scroll_page = NULL;
    public $per_page = NULL;
    public $total_pages = NULL;
    public $current_page = NULL;
    public $page_links = NULL;

    public function total_pages( $pager_url, $total_records, $scroll_page, $per_page, $current_page )
    {
        $this->url = $pager_url;
        $this->total_records = $total_records;
        $this->scroll_page = $scroll_page;
        $this->per_page = $per_page;
        if ( !is_numeric( $current_page ) )
        {
            $this->current_page = 1;
        }
        else
        {
            $this->current_page = $current_page;
        }
        if ( $this->current_page == 1 )
        {
            $this->start = 0;
        }
        else
        {
            $this->start = ( $this->current_page - 1 ) * $this->per_page;
        }
        $this->total_pages = ceil( $this->total_records / $this->per_page );
    }

    public function page_links( $inactive_page_tag, $pager_url_last )
    {
        if ( $this->total_pages <= $this->scroll_page )
        {
            if ( $this->total_records <= $this->per_page )
            {
                $loop_start = 1;
                $loop_finish = $this->total_pages;
            }
            else
            {
                $loop_start = 1;
                $loop_finish = $this->total_pages;
            }
        }
        else if ( $this->current_page < intval( $this->scroll_page / 2 ) + 1 )
        {
            $loop_start = 1;
            $loop_finish = $this->scroll_page;
        }
        else
        {
            $loop_start = $this->current_page - intval( $this->scroll_page / 2 );
            $loop_finish = $this->current_page + intval( $this->scroll_page / 2 );
            if ( $this->total_pages < $loop_finish )
            {
                $loop_finish = $this->total_pages;
            }
        }
        $i = $loop_start;
        while ( $i <= $loop_finish )
        {
            if ( $i == $this->current_page )
            {
                $this->page_links .= "<a href=\"\" class=\"onPage\" ".$inactive_page_tag."> ".$i." </a>";
            }
            else
            {
                $this->page_links .= "<a href=\"".$this->url.$i.$pager_url_last."\">".$i."</a>";
            }
            ++$i;
        }
    }

    public function previous_page( $previous_page_text, $pager_url_last )
    {
        if ( 1 < $this->current_page )
        {
            $this->previous_page = ( "<a href=\"".$this->url.( $this->current_page - 1 ) ).$pager_url_last."\">".$previous_page_text."</a>";
        }
    }

    public function next_page( $next_page_text, $pager_url_last )
    {
        if ( $this->current_page < $this->total_pages )
        {
            $this->next_page = ( "<a href=\"".$this->url.( $this->current_page + 1 ) ).$pager_url_last."\">".$next_page_text."</a>";
        }
    }

    public function first_page( $first_page_text, $pager_url_last )
    {
        if ( 1 < $this->current_page )
        {
            $this->first_page = "<a href=\"".$this->url."1".$pager_url_last."\">".$first_page_text."</a>";
        }
    }

    public function last_page( $last_page_text, $pager_url_last )
    {
        if ( $this->current_page < $this->total_pages )
        {
            $this->last_page = "<a href=\"".$this->url.$this->total_pages.$pager_url_last."\">".$last_page_text."</a>";
        }
    }

    public function pager_set( $pager_url, $total_records, $scroll_page, $per_page, $current_page, $inactive_page_tag, $previous_page_text, $next_page_text, $first_page_text, $last_page_text, $pager_url_last )
    {
        $this->total_pages( $pager_url, $total_records, $scroll_page, $per_page, $current_page );
        $this->page_links( $inactive_page_tag, $pager_url_last );
        $this->previous_page( $previous_page_text, $pager_url_last );
        $this->next_page( $next_page_text, $pager_url_last );
        $this->first_page( $first_page_text, $pager_url_last );
        $this->last_page( $last_page_text, $pager_url_last );
    }

}

function tr_duzelt( $tr1 )
{
    $turkce = array( "?", "?", "?", "(", ")", "'", "ü", "U", "?", "?", "ç", "C", " ", "/", "*", "?", "?", "?", "?", "?", "?", "?", "?", "?", "C", "ç", "ü", "U" );
    $duzgun = array( "s", "S", "i", "", "", "", "u", "U", "o", "O", "c", "C", "-", "-", "-", "", "s", "S", "i", "g", "G", "I", "o", "O", "C", "c", "u", "U" );
    $tr1 = str_replace( $turkce, $duzgun, $tr1 );
    $tr1 = preg_replace( "@[^A-Za-z0-9-_]+@i", "", $tr1 );
    $i = 0;
    while ( $i <= 5 )
    {
        $tr1 = str_replace( "--", "-", $tr1 );
        ++$i;
    }
    return $tr1;
}

function puan( $rating )
{
    if ( 0 < $rating && $rating < 0.5 )
    {
        $rating = "<img src=\"stars/0.0.gif\" alt=\"\"/>";
    }
    else if ( $rating == "0.5" || 0.5 < $rating && $rating < 1 )
    {
        $rating = "<img src=\"stars/0.5.gif\" alt=\"\"/>";
    }
    else if ( $rating == "1.0" || 1 < $rating && $rating < 1.5 )
    {
        $rating = "<img src=\"stars/1.0.gif\" alt=\"\"/>";
    }
    else if ( $rating == "1.5" || 1.5 < $rating && $rating < 2 )
    {
        $rating = "<img src=\"stars/1.5.gif\" alt=\"\"/>";
    }
    else if ( $rating == "2.0" || 2 < $rating && $rating < 2.5 )
    {
        $rating = "<img src=\"stars/2.0.gif\" alt=\"\"/>";
    }
    else if ( $rating == "2.5" || 2.5 < $rating && $rating < 3 )
    {
        $rating = "<img src=\"stars/2.5.gif\" alt=\"\"/>";
    }
    else if ( $rating == "3.0" || 3 < $rating && $rating < 3.5 )
    {
        $rating = "<img src=\"stars/3.0.gif\" alt=\"\"/>";
    }
    else if ( $rating == "3.5" || 3.5 < $rating && $rating < 4 )
    {
        $rating = "<img src=\"stars/3.5.gif\" alt=\"\"/>";
    }
    else if ( $rating == "4.0" || 4 < $rating && $rating < 4.5 )
    {
        $rating = "<img src=\"stars/4.0.gif\" alt=\"\"/>";
    }
    else if ( $rating == "4.5" || 4.5 < $rating && $rating < 5 )
    {
        $rating = "<img src=\"stars/4.5.gif\" alt=\"\"/>";
    }
    else if ( $rating == "5.0" || 5 < $rating )
    {
        $rating = "<img src=\"stars/5.0.gif\" alt=\"\"/>";
    }
    return $rating;
}

function kisalt( $text = "if3lc", $max = "300", $sperator = "..." )
{
    if ( $durum == "kisa" || empty( $durum ) )
    {
        $ksay = strlen( $text );
        if ( $max <= $ksay )
        {
            $kisa = "".substr( $text, 0, $max )."".$sperator."";
            return $kisa;
        }
        return $text;
    }
    if ( $durum == "uzun" )
    {
        $text = "".$text."";
        $text = "".$text."<a href=\"".$_SERVER['REQUEST_URI']."&durum=kisa\"><</a>";
        return $text;
    }
}

function etiket( $etiket )
{
    $tag = explode( ",", $etiket );
    $say = count( $tag ) - 1;
    $i = 0;
    while ( $i <= $say )
    {
        if ( $i != $say )
        {
            $virgul = ",";
        }
        else
        {
            $virgul = "";
        }
        $tags = "".$tags."<a href=\"./ara.php?q=".trim( $tag[$i] )."\">".$tag[$i]."</a>".$virgul." ";
        ++$i;
    }
    return $tags;
}

function encrypt( $string )
{
    global $key;
    $result = "";
    $i = 0;
    while ( $i < strlen( $string ) )
    {
        $char = substr( $string, $i, 1 );
        $keychar = substr( $key, $i % strlen( $key ) - 1, 1 );
        $char = chr( ord( $char ) + ord( $keychar ) );
        $result .= $char;
        ++$i;
    }
    $encoded = base64_encode( $result );
    $encoded = str_replace( "=", "", $encoded );
    $encoded = str_replace( "/", "!", $encoded );
    return $encoded;
}

function decrypt( $string )
{
    global $key;
    $result = "";
    $string = str_replace( "!", "/", $string );
    $string = base64_decode( $string );
    $i = 0;
    while ( $i < strlen( $string ) )
    {
        $char = substr( $string, $i, 1 );
        $keychar = substr( $key, $i % strlen( $key ) - 1, 1 );
        $char = chr( ord( $char ) - ord( $keychar ) );
        $result .= $char;
        ++$i;
    }
    return $result;
}

function firewall( $string )
{
    $string = htmlspecialchars( $string );
    $string = strip_tags( $string );
    $string = trim( $string );
    return $string;
}

function seolink( $deger )
{
    $deger = iconv( "utf-8", "ISO-8859-9", $deger );
    $turkce = array( "?", "?", "?", "(", ")", "'", "ü", "U", "?", "?", "ç", "C", " ", "/", "*", "?", "?", "?", "?", "?", "?", "?", "?", "?", "C", "ç", "ü", "U", "--" );
    $duzgun = array( "s", "S", "i", "", "", "", "u", "U", "o", "O", "c", "C", "-", "-", "-", "", "s", "S", "i", "g", "G", "I", "o", "O", "C", "c", "u", "U", "-" );
    $deger = str_replace( $turkce, $duzgun, $deger );
    $deger = preg_replace( "@[^A-Za-z0-9\\-_]+@i", "", $deger );
    $i = 0;
    while ( $i <= 5 )
    {
        $deger = str_replace( "--", "-", $deger );
        ++$i;
    }
    return $deger;
}

function seolinkvideo( $vid, $text )
{
    $text = tr_duzelt( $text );
    $link = strtolower( $text )."-".encrypt( $vid ).".html";
    return $link;
}

function seolinkres( $vid, $text )
{
    $text = tr_duzelt( $text );
    $link = strtolower( $text )."-".encrypt( $vid ).".jpg";
    return $link;
}

function seolinkara( $text )
{
    $link = "ara.php?q=".$text."";
    return $link;
}

function encode( $string, $key )
{
    $key = sha1( $key );
    $strLen = strlen( $string );
    $keyLen = strlen( $key );
    $i = 0;
    while ( $i < $strLen )
    {
        $ordStr = ord( substr( $string, $i, 1 ) );
        if ( $j == $keyLen )
        {
            $j = 0;
        }
        $ordKey = ord( substr( $key, $j, 1 ) );
        ++$j;
        $hash .= strrev( base_convert( dechex( $ordStr + $ordKey ), 16, 36 ) );
        ++$i;
    }
    return $hash;
}

function decode( $string, $key )
{
    $key = sha1( $key );
    $strLen = strlen( $string );
    $keyLen = strlen( $key );
    $i = 0;
    while ( $i < $strLen )
    {
        $ordStr = hexdec( base_convert( strrev( substr( $string, $i, 2 ) ), 36, 16 ) );
        if ( $j == $keyLen )
        {
            $j = 0;
        }
        $ordKey = ord( substr( $key, $j, 1 ) );
        ++$j;
        $hash .= chr( $ordStr - $ordKey );
        $i += 2;
    }
    return $hash;
}

$copy = @file_get_contents( "header.php" );
if ( !eregi( "<a href=\"http://www.yasaktube.net/\" title=\"yasaktube, video izle\">YasakTube</a>", $copy ) )
{
    exit( "Linki kald?rmay?n?z!<br> \r\n".htmlspecialchars( "<a href=\"http://www.yasaktube.net/\" title=\"yasaktube, video izle\">YasakTube</a>" ) );
    exit( );
}
?> 