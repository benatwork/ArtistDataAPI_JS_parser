<?php
  $url = $_GET['url']; //"http://artistdata.sonicbids.com/45-shootout/shows/xml/"; //
  $xml = simplexml_load_file($url,null, LIBXML_NOCDATA);
  echo $xml->asXML();
?> 