<?php
$file = fopen('sites.csv', 'r');
while (($line = fgetcsv($file)) !== false)
{
  $sites[] = $line;
}
fclose($file);
//var_dump($sites);
//echo $sites[0][1];
foreach ($sites as $site) {
    //echo $site[0];
    $tags = get_meta_tags($site[0]);

    if(strlen($tags['keywords']) < 2){
        $desc = explode(" ", $tags['description']);
        $desc = implode(",", $desc);
        echo $site[0].",".$desc."</br>";

    }else{
        echo $site[0].",".$tags['keywords']."</br>";
    }
   
    
    

}