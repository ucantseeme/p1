<?php
include("../config/config.php");
include("../config/autoloadapi.php");
$db = new Db();
$db = Db::connect();

// "Create" the document.
$xml = new DOMDocument( "1.0", "ISO-8859-15" );

//to have indented output, not just a line
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;

// ------------- Interresting part here ------------

//creating an xslt adding processing line
$xslt = $xml->createProcessingInstruction('xml-stylesheet', 'type="text/xsl" href="rssfeed.xsl"');

//adding it to the xml
$xml->appendChild($xslt);

// ----------- / Interresting part here -------------

//adding some elements

$query = "SELECT * FROM book";
$result = $db->query($query);

$books = $xml->createElement("books");

if ($result->num_rows > 0) {
  while($row = $result->fetch_object()) {
    $book = $xml->createElement("book");
    $id = $xml->createElement("id", $row->id);
    $book-> appendChild($id);
    $name = $xml->createElement("name", $row->name);
    $book-> appendChild($name);
    $author = $xml->createElement("author", $row->author);
    $book-> appendChild($author);
    $description = $xml->createElement("description", $row->description);
    $book-> appendChild($description);
    $published = $xml->createElement("published", $row->published);
    $book-> appendChild($published);
    $books-> appendChild($book);
  }
}

$xml-> appendChild($books);

//creating the file
$xml-> save("rssfeed.xml");
header('Location:'.$config["base_url"].'files/rssfeed.xml');

?>
