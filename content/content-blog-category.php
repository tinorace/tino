<h2>Blog Categories</h2>

 <?php 
$cat = new SimpleXMLElement('categories.xml', null, true);
$rss = new SimpleXMLElement('rss.xml', null, true);

foreach($cat->xpath('channel/item') as $item) {
echo <<< EOF
<div id="blog-category">
<div id="blog-category-title">	
<h3><img src="img/icons/blog/{$item->shortname}.png" height="25px" />
<a href='blog.php?category={$item->shortname}'>{$item->longname}</a></h3></div>
<div id="blog-category-posts">
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
if(($str1 == $str2) && ($str3 == $str4) && ($str5 == $str6) && ($counting < '7'))
echo <<<EOF
<a href='{$item2->link}'>{$item2->title}</a><br/> 
EOF;
}

Echo "</div><div id='blog-category-number'>Total number of posts: ".$counting."</div>";
Echo "</div>";

}

?>