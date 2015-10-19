<div id="blog">
<div id="viewing-blog-message">
<?php
$params = $_SERVER['QUERY_STRING'];
parse_str($params);
$categories = new SimpleXMLElement('categories.xml', null, true);
foreach($categories->xpath('channel/item') as $item) {
if($category == $item->shortname) echo "<div id='blog-category-title'><img src='img/icons/blog/{$item->shortname}.png'/></div>";
}
Echo "You are viewing blogs about ";
if(empty($category) && empty($tag)) echo " all topics";
if(empty($category) && isset($tag)) echo " ".$tag;
foreach($categories->xpath('channel/item') as $item) {
if($category == $item->shortname) echo $item->nocapname;
}

if($month != '' || $year !='')
Echo " written in ";
if(empty($month)&&empty($year)){
Echo ".";
}else if(empty($month)){
if($year == 2012)Echo "2012";
}else{
if($month == 01)
Echo "January ";
if($month == 02)
Echo "February ";
if($month == 03)
Echo "March ";
if($month == 04)
Echo "April ";
if($month == 05)
Echo "May ";
if($month == 06)
Echo "June ";
if($month == 07)
Echo "July ";
if($month == 08)
Echo "August ";
if($month == 09)
Echo "September ";
if($month == 10)
Echo "October ";
if($month == 11)
Echo "November ";
if($month == 12)
Echo "December ";
if($year == 2012)
Echo "2012";
}

?>
</div>

<div id="blog-drop-down-menu">
<!-- LIMIT NUMBER OF POSTS PER PAGE -->
<form action="blog.php" method="post">
<select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
 <option value="none" selected="selected">Posts per page</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=1&tag=<?php Echo $tag ?>">1</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=2&tag=<?php Echo $tag ?>">2</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=5&tag=<?php Echo $tag ?>">5</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=10&tag=<?php Echo $tag ?>">10</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=15&tag=<?php Echo $tag ?>">15</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=20&tag=<?php Echo $tag ?>">20</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=25&tag=<?php Echo $tag ?>">25</option>
 <option value="blog.php?year=<?php Echo $year ?>&category=<?php Echo $category ?>&page=<?php Echo $page ?>&no=<?php Echo $no ?>&date=<?php Echo $date ?>&month=<?php Echo $month ?>&limit=30&tag=<?php Echo $tag ?>">30</option>
</select>
</form>
</div>


<!-- BLOG ENTRIES BELOW-->
<?php
$params = $_SERVER['QUERY_STRING'];

parse_str($params);
Echo "<div id='pagination-buttons'>";
Echo "<a href='blog.php?year={$year}&category={$category}&page=1&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'><<</a>"; 
Echo "  ";

Echo "<a href='blog.php?year={$year}&category={$category}&page={$previouspage}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'><</a></a>";

for ($pagecount = 1; $pagecount <= $pages; $pagecount++) {
    echo "<a href='blog.php?year={$year}&category={$category}&page={$pagecount}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'>$pagecount</a></a>";
} 

Echo "<a href='blog.php?year={$year}&category={$category}&page={$nextpage}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'>></a>";

Echo "<a href='blog.php?year={$year}&category={$category}&page={$pages}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'>>></a>";
Echo "</div></br>";
?>

<div id="blog">

<?php

$rss = new SimpleXMLElement('rss.xml', null, true);



$totalposts = 0;
$countid = 0;

$params = $_SERVER['QUERY_STRING'];

parse_str($params);

if($limit<1)
$limit = 10;


foreach($rss->xpath('channel/item') as $item) {

if((($item->categorylink == $category) || empty($category)) &&  (($item->date == $date) || empty($date)) && (($item->postid == $no) || empty($no)) &&  (($item->month == $month) || empty($month))  &&  (($item->date == $date) || empty($date))  &&  ((strpos($item->tags,$tag) !== false) || empty($tag)))
$totalposts++;

}

$pages = ceil($totalposts/$limit);
if($page>$pages)
$page=$pages;
if($page<1)
$page=1;

foreach($rss->xpath('channel/item') as $item) {
  $max = $item->postid;
break;
  }

$convert = $max+1;

$startid = (($page-1)*$limit)+1;
$endid = $startid + $limit;
$countid = 0;
$nextpage = $page + 1;
if($nextpage > $pages)
$nextpage = $pages;
$previouspage = $page - 1;
if($previouspage < 1)
$previouspage = 1;
if($nextpage < 1)
$nextpage = 1;	



foreach($rss->xpath('channel/item') as $item) {

if((($item->categorylink == $category) || empty($category)) &&  (($item->date == $date) || empty($date)) && (($item->postid == $no) || empty($no)) &&  (($item->month == $month) || empty($month))  &&  (($item->date == $date) || empty($date))  &&  ((strpos($item->tags,$tag) !== false) || empty($tag)))

$countid++;

if((($item->categorylink == $category) || empty($category)) &&  (($item->date == $date) || empty($date)) && (($item->postid == $no) || empty($no)) &&  (($item->month == $month) || empty($month))  &&  (($item->date == $date) || empty($date))  &&  ((strpos($item->tags,$tag) !== false) || empty($tag)) && ($countid >= $startid) && ($countid < $endid))

 {

 echo <<<EOF

<div id='blog-post'>
	<div id="blog-top">
<div id='blog-date-container'>
<div id='blog-date-container-top'>
EOF;

Echo "<div id='blog-date'>";

if(substr($item->pubDate, 8, 1) == '0') 
Echo substr($item->pubDate, 9, 1);
if(substr($item->pubDate, 8, 1) > '0') 
Echo substr($item->pubDate, 8, 2);

Echo "<sup>";
if(substr($item->pubDate, 9, 1) == '1') 
Echo "st";
if(substr($item->pubDate, 9, 1) == '2') 
Echo "nd";
if(substr($item->pubDate, 9, 1) == '3') 
Echo "rd";
if(substr($item->pubDate, 9, 1) > '3') 
Echo "th";

Echo "</sup>";
Echo "</div>";

Echo "<div id='blog-month1'>";
if(substr($item->pubDate, 5, 2) == '01')
Echo "January";
if(substr($item->pubDate, 5, 2) == '02')
Echo "February";
if(substr($item->pubDate, 5, 2) == '03')
Echo "March";
if(substr($item->pubDate, 5, 2) == '04')
Echo "April";
if(substr($item->pubDate, 5, 2) == '05')
Echo "May";
if(substr($item->pubDate, 5, 2) == '06')
Echo "June";
if(substr($item->pubDate, 5, 2) == '07')
Echo "July";
if(substr($item->pubDate, 5, 2) == '08')
Echo "August";
if(substr($item->pubDate, 5, 2) == '09')
Echo "September";
if(substr($item->pubDate, 5, 2) == '10')
Echo "October";
if(substr($item->pubDate, 5, 2) == '11')
Echo "November";
if(substr($item->pubDate, 5, 2) == '12')
Echo "December";
Echo "</div>";
Echo "</div>";

Echo "<div id='blog-year'>";
Echo substr($item->pubDate, 0, 4).", ";
Echo substr($item->pubDate, 11, 5);
Echo "</div>";

 echo <<<EOF

	
</div>

<div id="blog-header">
	<h3><a href='{$item->link}'>{$item->title}</a></h3>

<h4>{$item->description}</h4>
<h5>Posted by: Tino Race</a></h5>

</div>
</div>

<div id="blog-content">
<hr style="padding: 0px; border: solid #2CA0E8 0px; border-bottom: solid #2CA0E8 1px;">

	{$item->content}</div>

<hr style="padding: 0px; border: solid #2CA0E8 0px; border-bottom: solid #2CA0E8 1px;">
<div id="blog-category-footer">
	<img src='img/icons/blog/{$item->categorylink}.png'/>
</div>
<strong>This blog was posted in <a href='blog.php?category={$item->categorylink}'>{$item->category}</a></strong><br/><br/>
<small>Tagged as: 
EOF;

$tagsexplode = explode(", ", $item->tags);
$i = 0;
foreach($tagsexplode as $tagno => $tagnames) {
echo "<a href='blog.php?tag=".$tagnames."'>".$tagnames."</a>";
$i++;
if($i == count($tagsexplode)) {
Echo ".";
}
else {
Echo ", ";
}
}

Echo <<< EOF
</small><br/>
<hr style="padding: 0px; border: solid #2CA0E8 0px; border-bottom: solid #2CA0E8 1px;">

</div>
<div></div>

EOF;



}

}

$params = $_SERVER['QUERY_STRING'];

parse_str($params);
Echo "<div id='pagination-buttons'>";
Echo "<a href='blog.php?year={$year}&category={$category}&page=1&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'><<</a>"; 
Echo "  ";

Echo "<a href='blog.php?year={$year}&category={$category}&page={$previouspage}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'><</a></a>";

for ($pagecount = 1; $pagecount <= $pages; $pagecount++) {
    echo "<a href='blog.php?year={$year}&category={$category}&page={$pagecount}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'>$pagecount</a></a>";

} 

Echo "<a href='blog.php?year={$year}&category={$category}&page={$nextpage}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'>></a>";

Echo "<a href='blog.php?year={$year}&category={$category}&page={$pages}&no=&date={$date}&month={$month}&limit={$limit}&tag={$tag}'>>></a>";
Echo "</div>";




?>

<!-- END OF BLOG ENTRIES-->
</p>
</div>
</div>