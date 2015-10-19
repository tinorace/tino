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
Echo "</div>";
?>