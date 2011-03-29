
$(document).ready(function()

  //function loadEvents()
  {
    $.ajax({
      url: "php/simpleFeedLoader.php?url=http://artistdata.sonicbids.com/45-shootout/shows/xml/",
      success: parseXml,
      error:function (xhr, ajaxOptions, thrownError){
        $("#output").append("Error loading events feed")
       }
    });
  });

  function parseXml(xml)
  {
    alert(xml);
    var showData = "";
    $(xml).find("show").each(function()
    {
      showData += "<div class='eventName'"+$(this).find("name").text()+"><br />"
                  + "<div class='eventDescription'"+$(this).find("description").text()+"><br />"
                  + "<div class='eventImage'><img src="+$(this).find("posterImage").text()+"></img></div><br />"
                  + "<div class='eventCity'"+$(this).find("city").text()+"><br />"
                  + "<div class='eventStateAbbrev'"+$(this).find("stateAbbreviation").text()+"><br />"
                  + "<div class='eventVenue'"+$(this).find("venueName").text()+"><br />"
                  + "<div class='eventVenueNameExt'"+$(this).find("venueNameExt").text()+"><br />"
                  + "<div class='eventAddress'"+$(this).find("venueAddress").text()+"><br />"
                  + "<div class='eventVenueLink'"+$(this).find("venueURI").text() +"><br />"
                  + "<div class='eventTime'"+$(this).find("timeDoors").text() +"><br />"
                  + "<div class='eventPrice'"+$(this).find("ticketPrice").text()+"><br />"
                  + "<div class='eventAge'"+$(this).find("ageLimit").text()+"><br />"
      
 
      
    });
    
    $("#eventsWidget").append(showData);
 
  }

