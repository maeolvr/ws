<?php

    $artist = rawurlencode($_POST['artist']);
    $title = rawurlencode($_POST['title']);
    

    $sourceText = file_get_contents("https://api.lyrics.ovh/v1/".$artist."/".$title);
    $sourceLang = $_POST['sourceLang'];
    $targetLang = $_POST['targetLang'];
    
    $res = file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&sl="
        .$sourceLang."&tl=".$targetLang."&dt=t&q=".urlencode($sourceText));

    var_dump($res);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $res = explode('[',$res);
    foreach($res as $lyrics){
        print_r($lyrics);
        echo "<br>";
    }
?> 