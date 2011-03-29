



<?php 
	
  $url = "http://artistdata.sonicbids.com/45-shootout/shows/xml/"; //$_GET['url'];
  
  $otherArtistsArray = Array();

  $objDOM = new DOMDocument(); 
  $objDOM->load("http://artistdata.sonicbids.com/45-shootout/shows/xml/"); //make sure path is correct 


  $show = $objDOM->getElementsByTagName("show"); 
  // for each note tag, parse the document and get values for 
  // tasks and details tag. 

  foreach( $show as $value ) 
  { 
    $name = $value->getElementsByTagName("name")->item(0)->nodeValue; 
	$description = $value->getElementsByTagName("description")->item(0)->nodeValue;
	$posterImage = $value->getElementsByTagName("posterImage")->item(0)->nodeValue;
	$city = $value->getElementsByTagName("city")->item(0)->nodeValue;
	$stateAbbreviation = $value->getElementsByTagName("stateAbbreviation")->item(0)->nodeValue;
	$venueName = $value->getElementsByTagName("venueName")->item(0)->nodeValue;
	$venueAddress = $value->getElementsByTagName("venueAddress")->item(0)->nodeValue;
	$venueURI = $value->getElementsByTagName("venueURI")->item(0)->nodeValue;
	$otherArtists = $value->getElementsByTagName("otherArtists");
	foreach($otherArtists as $otherArtist){
		array_push($otherArtistsArray,$otherArtist->getElementsByTagName("name")->item(0)->nodeValue);
	}
	$time = $value->getElementsByTagName("timeDoors")->item(0)->nodeValue;
	$ticketPrice = $value->getElementsByTagName("ticketPrice")->item(0)->nodeValue;
	$ageLimit = $value->getElementsByTagName("ageLimit")->item(0)->nodeValue;
	

    $details = $value->getElementsByTagName("otherArtists"); 
    $detail  = $details->item(0)->nodeValue; 

	
	
	if($name && $venueURI) {
		echo "<div class='eventName'><a href=$venueURI parent='_blank'>$name</a></div>";
	} else {
		echo "<div class='eventName'>$name</div>";
	}
	
	if($otherArtistsArray >= 1){
		echo "<div class='otherArtists'> With:<br/><ul>";
		foreach($otherArtistsArray as $otherArtist){
			echo "<li>$otherArtist</li>";
		}
		echo "</ul></div>";
	}
	
	if($description) echo "<div class='eventDescription'>$description</div>";
	if($posterImage) echo "<div class='eventImage'><img src=$posterImage></div>";
	if($city) echo "<div class='eventCity'>$city,$stateAbbreviation</div>";   
	if($venueName && $venueAddress) {
		echo "<div class='eventVenueName'><a href='http://maps.google.com/maps?q=$venueAddress' target='_blank'>$venueName</a></div>";
	} else if ($venueName){
		echo "<div class='eventVenueName'>$venueName</div>";
	}
	if($venueURI) echo "<div class='eventVenueURI'>$venueURI</div>";
	if($time) echo "<div class='eventTimeDoors'>$timeDoors</div>";
	if($ticketPrice) echo "<div class='eventPrice'>$ticketPrice</div>";
	if($ageLimit) echo "<div class='eventAgeLimit'>$ageLimit</div>";
	echo "<p/>";

	$otherArtistsArray = Array();
     
  } 

  


?>
