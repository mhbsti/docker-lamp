<?php
$myfile = fopen("result.txt", "a+") or die("Unable to open file!");
$html_string = file_get_contents('http://www.camaracolombo.pr.gov.br/inicial.asp');
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTML($html_string);	
libxml_clear_errors();
$xpath = new DOMXpath($dom);
$values = array();
$row=$xpath->query('//p');
foreach($row as $value) {
    fwrite($myfile,trim($value->textContent));
}
fclose($myfile);
