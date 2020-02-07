<?php
// Send the headers
header('Content-type: text/xml');
header('Pragma: public');
header('Cache-control: private');
header('Expires: -1');
header("Content-Disposition: attachment; filename=news.xml");
header("Content-Description: File Transfer");


echo "<?xml version='1.0' encoding='utf-8'?>";

echo "<xml>";


echo "<track>";
    echo "<path>song_path</path>";
    echo "<title>track_number - track_title</title>";
echo "</track>";


echo "</xml>";

?>
