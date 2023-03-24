<?php

$baseUrl = '
<h2 id = "tries">
<h2>5</h2>
</h2>';

$baseUrl = str_replace('<h2', '<div', $baseUrl);

$baseUrl = str_replace('<h2>', '<div>', $baseUrl);

$baseUrl = str_replace('</h2>', '</div>', $baseUrl);
$domdoc = new DOMDocument();
$domdoc->loadHTML($baseUrl);


$count =  $domdoc->getElementById('tries')->getElementsByTagName('div')->item(0)->nodeValue;

if (!empty($_POST['guess'])) {

  echo "<img src='./icons/green_arrow.png' width = '30' height = '30' id ='up'>" . $_POST['guess'] . "<br>";
}
