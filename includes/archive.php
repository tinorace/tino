<div id="archive">
<h3>Archive</h3>

<h5>See more <a href='blog-archive.php'>here</a></h5>


<?php
$rss = new SimpleXMLElement('rss.xml', null, true);
$countlist = 0;
$lastmonth = 0;
Echo "<ul style='list-style:none; line-height:2em;'>";
foreach($rss->xpath('channel/item') as $item) {
if((int)($item->month) != (int)($lastmonth)){
$countlist++;
if($countlist==13){
Echo "<li style='height:2em;font-size:12px;text-decoration:none;font-weight:bold;color:#2CA0E8;width:125px;'><a href='blog-archive.php'>View older articles</a></li></ul>";
break;}
Echo "<li><table><tr><td style='height:2em;font-size:12px;text-decoration:none;font-weight:bold;color:#2CA0E8;width:125px;'><a href='blog.php?month={$item->month}&year={$item->year}'>";
if($item->month=="01")
{Echo "January";
$year1 = $item->year;
$month1 = "01";}
if($item->month=="02")
{Echo "February";
$year1 = $item->year;
$month1 = "02"; }
if($item->month=="03")
{Echo "March";
$year1 = $item->year;
$month1 = "03"; }
if($item->month=="04")
{Echo "April";
$year1 = $item->year;
$month1 = "04"; }
if($item->month=="05")
{Echo "May";
$year1 = $item->year;
$month1 = "05"; }
if($item->month=="06")
{Echo "June";
$year1 = $item->year;
$month1 = "06"; }
if($item->month=="07")
{Echo "July";
$year1 = $item->year;
$month1 = "07"; }
if($item->month=="08")
{Echo "August";
$year1 = $item->year;
$month1 = "08"; }
if($item->month=="09")
{Echo "September";
$year1 = $item->year;
$month1 = "09"; }
if($item->month=="10")
{Echo "October";
$year1 = $item->year;
$month1 = "10"; }
if($item->month=="11")
{Echo "November";
$year1 = $item->year;
$month1 = "11"; }
if($item->month=="12")
{Echo "December";
$year1 = $item->year;
$month1 = "12"; }
Echo " {$item->year}</td><td style='font-size:11px;color:#222222;font-weight:normal;text-align:left;'>";
$shortname = $item->shortname;
$counting = 0;
foreach($rss->xpath('channel/item') as $item2) {
if(((int)($item2->month)==(int)($month1)) && ((int)($item2->year) ==(int)($year1)))
$counting++;
}
Echo "(".$counting.")";
Echo "</td></tr></table></a></li>";
$lastmonth = $item->month;
}
}
Echo "</ul>";
?>
</div>