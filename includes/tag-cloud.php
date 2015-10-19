<h4>Tag Cloud of my <a href='blog.php'>blog</a></h4>
<h5>See more <a href='blog-tag.php'>here</a></h5>

<?php

//Loads the XML data
$rss = new SimpleXMLElement('rss.xml', null, true);

$tagcloud='';
foreach($rss->xpath('channel/item') as $item) {



//This part scans each of the three three tags on the blog post and concatenates the tags into one string. I had to use a string replace on the spaces to allow for tags consisting of more than one word.

$tagcloud0=$tagcloud;
$tagcloud1=str_replace(", ", "YYYYYY", $item->tags);
$tagcloud2 = str_replace(" ", "ZZZZZZ", $tagcloud1);
$tagcloud3 = str_replace("YYYYYY", " ", $tagcloud2);
$tagcloud=$tagcloud0.' '.$tagcloud3;
}


//Word counting the string, then creating an array with this word count. Numbers and special characters need to be included in the word count.

$words = array_count_values(str_word_count($tagcloud, 1 , '1234567890.-!'));


//Sorting by frequency, then slicing only the 25 most frequent tags, then alphabetising them.
arsort($words);
$first = array_slice($words, 0, 40);
ksort($first);

//This part counts the total number of tags and unique tags
$total = 0;
$count = 0;
foreach($first as $key => $val) {
$count++;
$total+=$val;
}


//Now to work out the average frequency and calculate a normalising factor for font size
$mean=$total/$count;
$fontfactor = 22/$mean;

foreach($first as $key => $val) {


//Putting the spaces back...
$key = str_replace("ZZZZZZ", " ", $key);


//Finally, printing the tags, and adjusting font size based on frequency. The if statement is to ensure the font is neither too big nor too small.

if($val*$fontfactor<12){
echo "<a href='blog.php?tag=$key' style='font-size: 12 px'>$key</a> ";
}
else if($val*$fontfactor>36){
echo "<a href='blog.php?tag=$key' style='font-size: 36 px'>$key</a> ";
}
else {
$fontsize = $val*$fontfactor;
echo "<a href='blog.php?tag=$key' style='font-size: $fontsize px'>$key</a> ";
}
}

?> 