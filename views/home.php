<main>
<h1>Mon Blog</h1>
    <?php

    $aFilenames=glob(SAVE_DIR.DIRECTORY_SEPARATOR.'*.json');
        foreach ($aFilenames as $files){
            $article = json_decode(file_get_contents($files), true);
            echo
                $article['subject']."</br></br>".
                $article['content']."</br></br>".
                $article['type']."</br></br>";
        }
    ?>

</main>