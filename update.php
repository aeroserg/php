<?php
$json_data = file_get_contents("https://cbu.uz/ru/arkhiv-kursov-valyut/json/");
$array = json_decode($json_data, true, 512, JSON_THROW_ON_ERROR);
echo json_encode($array);
?>