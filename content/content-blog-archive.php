<div id="archive">

<h2>Archive</h2>

 <?php 
$rss = new SimpleXMLElement('rss.xml', null, true);

$totalposts = 0;
$countid = 0;

$params = $_SERVER['QUERY_STRING'];

$year = date('Y');
parse_str($params);

$lastyear = 0;
foreach($rss->xpath('channel/item') as $item5) {
if(((int)($item5->year) != (int)($lastyear))){
Echo "<div id='blog-archive-year'><a href='blog-archive.php?year={$item5->year}'>{$item->year}</a></div>";
$lastyear = $item->year;
}
}

$lastmonth = 0;
foreach($rss->xpath('channel/item') as $item) {
if(((int)($item->month) != (int)($lastmonth)) && ((int)($year) == (int)($item->year)) ){
echo <<< EOF
<div id="blog-month">
<div id="blog-category-title">	
<h3><a href='blog.php?month={$item->month}&year={$item->year}'>
EOF;
if($item->month=="01")
{Echo "January";
$year = $item->year;
$month = "01";}
if($item->month=="02")
{Echo "February";
$year = $item->year;
$month = "02"; }
if($item->month=="03")
{Echo "March";
$year = $item->year;
$month = "03"; }
if($item->month=="04")
{Echo "April";
$year = $item->year;
$month = "04"; }
if($item->month=="05")
{Echo "May";
$year = $item->year;
$month = "05"; }
if($item->month=="06")
{Echo "June";
$year = $item->year;
$month = "06"; }
if($item->month=="07")
{Echo "July";
$year = $item->year;
$month = "07"; }
if($item->month=="08")
{Echo "August";
$year = $item->year;
$month = "08"; }
if($item->month=="09")
{Echo "September";
$year = $item->year;
$month = "09"; }
if($item->month=="10")
{Echo "October";
$year = $item->year;
$month = "10"; }
if($item->month=="11")
{Echo "November";
$year = $item->year;
$month = "11"; }
if($item->month=="12")
{Echo "December";
$year = $item->year;
$month = "12"; }
Echo " {$item->year}</a></h3></div>";

Echo "<div id='blog-category-posts'>";

$counting = 0;
foreach($rss->xpath('channel/item') as $item2) {
if(((int)($item2->month)==(int)($item->month)) && ((int)($item2->year)==(int)($item->year))) {
$counting++;
echo <<<EOF
<a href='{$item2->link}'>{$item2->title}</a><br/> 
EOF;
}
}

Echo "</div><div id='blog-category-number'>Total number of posts: ".$counting."</div>";
Echo "</div>";

}

$lastmonth = $item->month;

}


?>
	





