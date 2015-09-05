<div class="view-post">
    <h1><?=$post->title?></h1>
    <p>Posted on: <?php
        echo($post->createdate->format('Y/m/d H:i:s'));
        if(!is_null($post->lasteditdate)) {
            echo ", edited at ".$post->lasteditdate->format('Y/m/d H:i:s');
            if($post->showeditreason !== false && $post->editreason !== "") {
                echo ", reason - \"".$post->editreason."\"";} }
        ?></p>
    <p><?php echo($post->longbody) ?></p>
    <br />
    <a href="#" id="gobackbutton" onclick="window.history.back()">Go back</a>
</div>
