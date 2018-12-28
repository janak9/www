<?php
$url="https://maps.googleapis.com/maps/api/distancematrix/json?units=metric&origins=Surat,IN&destinations=Mumbai,IN&key=%20AIzaSyBPKY80DNkrjxCAcGvUHAO9yFum1yYcDE8";
$json = file_get_contents($url);
$data = json_decode($json);
print_r($data);

echo "<pre>";
//print_r($data);
//$pageid = $data->query->pageids[0];
//echo $data=$data->query->pages->$pageid->revisions;

$data1=$data->rows;
$data=$data1[0]->elements;
$data=$data[0];
print_r($data);

$ans=$data->distance;

print_r($ans);

$ans=$data->duration->text;

print_r($ans);


?>




