function initializeMap()
{
    var mapOptions = {
        center: { lat: 39.9, lng: -98.5},
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.HYBRID};
    map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
    setMapOverlay();
    return map;
}

function setMapOverlay()
{
    var imageBounds = new google.maps.LatLngBounds(
            new google.maps.LatLng(20.0, -125.0),
            new google.maps.LatLng(55.0, -60.0));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            if (dataOverlay !== null)
            {
                dataOverlay.setMap(null);
                dataOverlay = null;
            }
            dataOverlay = new google.maps.GroundOverlay("http://www.caps.ou.edu/~djgagne/" + xmlhttp.responseText,
                                                    imageBounds);
            dataOverlay.setOpacity(0.7);
            dataOverlay.setMap(map);

        }
    }
    var options = getOptionValues();
    var getString = makeGetString(options);
    xmlhttp.open("GET","php/get_image_filename.php" + getString,true);
    xmlhttp.send();
}

function getOptionValues()
{
    var columns = ["year","run_date","forecast_hour","model","variable","member"];
    var element;
    var values = [];
    for (i = 0; i < columns.length; i++) {
        element = document.getElementById(columns[i]);
        values[i] = element.options[element.selectedIndex].value;
    }
    var options = {'columns':columns, 'values':values};
    return options;
}

function makeGetString(options)
{
    var getString = "?";
    for (i=0; i < options.columns.length; i++)
    {
        getString += options.columns[i] + "=" + options.values[i] + "&";
    }
    return getString;
}
var map;
var dataOverlay = null;
google.maps.event.addDomListener(window, 'load', initializeMap);
