<?php
include("../config/config.php");
include("../config/autoloadapi.php");
$db = new Db();
$db = Db::connect();

header('Content-Type: text/xml; charset=utf-8', true); //set document header content type to be XML

$rss = new SimpleXMLElement('<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:atom="http://www.w3.org/2005/Atom"></rss>');
$rss->addAttribute('version', '2.0');

$channel = $rss->addChild('channel'); //add channel node

$atom = $rss->addChild('atom:atom:link'); //add atom node
$atom->addAttribute('href', 'http://localhost/aid77146774_checkpoint2/'); //add atom node attribute
$atom->addAttribute('rel', 'self');
$atom->addAttribute('type', 'application/rss+xml');

$title = $rss->addChild('title','Novel Books recommend by Aspiring Innovation'); //title of the feed
$description = $rss->addChild('description','Some good fiction and non-fiction books recommened by Aspiring Innovation.'); //feed description
$link = $rss->addChild('link','http://localhost/aid77146774_checkpoint2/'); //feed site
$language = $rss->addChild('language','en-us'); //language

//Create RFC822 Date format to comply with RFC822
$date_f = date("D, d M Y H:i:s T", time());
$build_date = gmdate(DATE_RFC2822, strtotime($date_f));
$lastBuildDate = $rss->addChild('lastBuildDate',$date_f); //feed last build date

$generator = $rss->addChild('generator','PHP XML RSS FEED GENERATOR'); //add generator node

$query = "SELECT * FROM book";
$results = $db->query($query);

// $generateRSSfile = fopen("rssfeed.xml", "w") or die("Unable to open file!");

if($results){ //we have records
	while($row = $results->fetch_object()) //loop through each row
	{
		$item = $rss->addChild('item'); //add item node
		$title = $item->addChild('title', $row->name); //add title node under item
    $author = $item->addChild('author', $row->author); //add title node under item
		$link = $item->addChild('link', 'http://localhost/aid77146774_checkpoint2/'); //add link node under item
		$guid = $item->addChild('guid', 'http://localhost/aid77146774_checkpoint2/'); //add guid node under item
		$guid->addAttribute('isPermaLink', 'false'); //add guid node attribute

		$description = $item->addChild('description', '<![CDATA['. htmlentities($row->description) . ']]>'); //add description

		$date_rfc = gmdate(DATE_RFC2822, strtotime($row->published));
		$pubdate = $item->addChild('pubDate', $date_rfc); //add pubDate node

    // $txt = "$item; $title; $author; $link; $guid; $description; $pubdate;\n";
    // fwrite($generateRSSfile, $txt);
	}
}

echo $rss->asXML(); //output XML

// $generateRSSfile = fopen("rssfeed.xml", "w") or die("Unable to open file!");

// $XMLData = $rss->asXML(); //output XML

// $xml=simplexml_load_string($XMLData) or die("Error: Cannot create object");
//
// fwrite($generateRSSfile, $xml);
//
// fclose($generateRSSfile);

// $xmlobj=new SimpleXMLElement($XMLData);
// $xmlobj->asXML("text.xml");
