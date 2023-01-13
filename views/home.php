<main>
<h1>Mon Blog</h1>
    <?php

    $aFilename=glob(SAVE_DIR.DIRECTORY_SEPARATOR.'*.json');
        foreach ($aFilename as $files){
            $sArticle=json_decode($files);
            echo
                $sArticle["subject"]."</br></br>".
                $sArticle["content"]."</br></br>".
                $sArticle["type"]."</br></br>";
    }
    ?>

</main>