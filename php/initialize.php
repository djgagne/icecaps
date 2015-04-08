<?php
function get_selection_values($columns) {
    $file_db = new PDO('sqlite:/home/djgagne/web_image_record.sqlite3');
    $selection_values = array();
    foreach ($columns as $column) {
        $vals = $file_db->query('SELECT DISTINCT ' . $column . ' FROM web_images;')->fetchAll(PDO::FETCH_COLUMN,0);
        sort($vals);
        $selection_values[$column]  = $vals;
    }
    $file_db = null;
    return $selection_values;
}

function initialize_menubar_date() {
    $columns = array("year","model","run_date","member", "variable", "forecast_hour");
    $label_names = array("Year", "Model", "Run Date", "Member", "Variable", "Forecast Hour");
    $selection_values = get_selection_values($columns);
    echo "<div id=\"logo\"><img src='capslogo.png' height='50px' /></div>\n";
    echo "<h3 align=\"center\">Interactive Convection Evaluator for CAPS (ICE CAPS)</h3>\n"; 
    echo "<table align=\"center\">\n<tr>";
    for ($i=0; $i < count($columns); $i++) {
        echo "<td>" . $label_names[$i]  . "</td>\n";
        echo "<td>\n<select id=\"" . $columns[$i] . "\" onchange=\"setMapOverlay()\">\n";
        foreach ($selection_values[$columns[$i]] as $value) {
            echo "<option value=\"" . $value . "\">" . strtoupper($value) . "</option>\n";
        }
        echo "</select></td>\n";
    }
    echo "</tr></table>";
}

?>
