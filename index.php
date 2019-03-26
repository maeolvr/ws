<?php
    echo '<head style="background-color: 	#66FCF1;">
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <div style="background-color: 	#66FCF1;margin-bottom: 3%;">
        <h1 id="txtbanner" style="color:#1F2833;height: 150px; padding-top: 4%;"> <i class="fas fa-music"></i>
           Bienvenue sur Lala Trad <i class="fas fa-music"></i>
        </h1>
    </div>';
    

    $artist = rawurlencode($_POST['artist']);
    $title = rawurlencode($_POST['title']);

    $sourceText = file_get_contents("https://api.lyrics.ovh/v1/".$artist."/".$title);
    $sourceLang = $_POST['sourceLang'];
    $targetLang = $_POST['targetLang'];
    
    if($sourceText==false){
        echo '<body style="background-color: #1F2833;color: #1F2833;text-align:center">';
        }
        else {
        echo '<body style="background-color: #1F2833;color: #66FCF1;text-align:center;">';
        }
    
    
    $res = file_get_contents("https://translate.googleapis.com/translate_a/single?client=gtx&sl="
        .$sourceLang."&tl=".$targetLang."&dt=t&q=".urlencode($sourceText));

    //on découpe la chaine de caractere de facon a voir quelque chose de clean 
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

    $res = implode($res);
    $res = explode('\\ n', $res);

    $res = implode($res);

    $res = preg_split('/(?=[ABCDEFGHIJKLMNOPQRSTUVWXYZ])/', $res, -1, PREG_SPLIT_NO_EMPTY); 

    if($sourceText==false){
        echo " <h1 style='color: #66FCF1;text-align:center;'> Les paroles sont introuvables</h1>";
        echo "<br>";
        echo "<img src='mongif.gif' style='display: block;margin-left: auto;margin-right: auto'>";
    }
    else{
        $urlYT='https://www.youtube.com/results?search_query='.$artist.'+'.$title;
        echo '<a href='.$urlYT.'><img src="yt.png" style="width: 8%"></a></br>';
        foreach($res as $lyrics){
            print_r($lyrics);
            echo "<br>";
        }

    }

    
?>