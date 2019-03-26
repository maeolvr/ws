<?php
    $artist = rawurlencode($_POST['artist']);
    $title = rawurlencode($_POST['title']);
    

    $sourceText = file_get_contents("https://api.lyrics.ovh/v1/".$artist."/".$title);
    $sourceLang = $_POST['sourceLang'];
    $targetLang = $_POST['targetLang'];
    
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    $res = file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&sl="
        .$sourceLang."&tl=".$targetLang."&dt=t&q=".urlencode($sourceText));

    /*foreach($res as $lyrics){
        print_r($lyrics);
        echo "<br>";
        echo "<br>";
        echo "<br>";
    } 
*/
    $res = strtr($res,"lyrics","");

    $res = explode('\\ \\ n', $res);

    $res = implode($res);
    $res = explode('\\n', $res);

    $res = implode($res);
    $res = explode('\\ \\ n', $res);

    $res = implode($res);
    $res = explode('null,null,3]', $res);

    $res = implode($res);
    $res = explode('","', $res);

    $res = implode($res);
    $res = explode('["', $res);
    $res = implode($res);
    $res = explode('\\\\ n', $res);
    $res = implode($res);
    $res = explode('"', $res);
    $res = implode($res);
    $res = explode('\\', $res);
    $res = implode($res);
    $res = explode(',,', $res); 
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $res = implode($res);
    $res = explode('\\ n', $res);

    $res = implode($res);

    $res = preg_split('/(?=[ABCDEFGHIJKLMNOPQRSTUVWXYZ])/', $res, -1, PREG_SPLIT_NO_EMPTY); 

    foreach($res as $lyrics){
        print_r($lyrics);
        echo "<br>";
    }
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
?> 