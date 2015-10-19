<?php 
$cat = new SimpleXMLElement('categories.xml', null, true);
$rss = new SimpleXMLElement('rss.xml', null, true);
echo "<table style=' font-size: 12px; width:300px;'>";
echo "<tr><td colspan='2'><h3>Explore</h3></td></tr>";
echo "<h5>See more <a href='blog-category.php'>here</a></h5>";
foreach($cat->xpath('channel/item') as $item) {
echo <<<EOF
<tr>
<td style="text-align: center;">
<img src="img/icons/blog/{$item->shortname}.png" height="25px" />
</td>
<td>
<a href='blog.php?category={$item->shortname}'>{$item->longname}</a>
</td>
<td>
EOF;
$shortname = $item->shortname;
$counting = 0;
foreach($rss->xpath('channel/item') as $item2) {
$str1=strlen($item2->categorylink);
$str2=strlen($shortname);
$str3=strlen($item2->category);
$str4=strlen($item->longname);
$str5=substr($item2->category, 1, 1);
$str6=substr($item->longname, 1, 1);
if(($str1 == $str2) && ($str3 == $str4) && ($str5 == $str6))
$counting++;
}

Echo "(".$counting.")";
Echo "</td></tr>";
}
Echo "</table>";
?>