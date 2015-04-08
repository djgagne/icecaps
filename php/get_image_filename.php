<?
function get_image_filename() {
    $params = array("year","model","member","run_date","forecast_hour","variable");
    $file_db = new PDO('sqlite:/home/djgagne/web_image_record.sqlite3');
    $param_vals = array();
    $query = "SELECT filename FROM web_images WHERE ";
    foreach ($params as $param) {
        $param_vals[$param] = $_GET[$param];
        $query = $query . $param . "='" . $param_vals[$param] . "' AND ";
    }
    $query = substr($query,0, strlen($query) - 5) . ";";
    $result = $file_db->query($query)->fetch(PDO::FETCH_ASSOC);
    $filename = $result["filename"];
    $file_db = null;
    return $filename;
}
parse_str($_SERVER['QUERY_STRING'], $_GET);
echo "web_images" . get_image_filename();
?>
