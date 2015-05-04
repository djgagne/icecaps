<!DOCTYPE html>
<html>
    <head>
        <title>ICE CAPS</title>
        <link rel="stylesheet" type="text/css" href="static/mapstyle.css">
        <script type="text/javascript"
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCokgGIYJuDsFdUEWqaLvCbfE6z0qYUguo">
        </script>
        <script src="js/map_manager.js"></script>
        <?php include 'php/initialize.php'; ?>
    </head>
    <body>
        <div id="menubar_date"><?php initialize_menubar_date(); ?></div>
        <div id="map_canvas">
        </div>
        <div id="colorbar"><img id="cbar_image" src="http://www.caps.ou.edu/~djgagne/web_images/colorbars/uh_max_cbar.png" /></div>
    </body>
</html>
