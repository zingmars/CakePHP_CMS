<article class="view-post hentry">
    <header>
        <h1 class="entry-title"><?=$post->title?></h1>
        <h2 class="entry-summary" style="display: none;"></h2>
        
        <time class="published" datetime="<?php $post->createdate ?>">Posted on: <?php
            echo($post->createdate->format('Y/m/d H:i:s'));
            if(!is_null($post->lasteditdate)) {
                echo ", edited at ".$post->lasteditdate->format('Y/m/d H:i:s');
                if($post->showeditreason !== false && $post->editreason !== "") {
                    echo ", reason - \"".$post->editreason."\"";} }
            ?></time>
    </header>
    <div class="entry-content">
        <p><?php echo($post->longbody) ?></p>
        <br />
    </div>
    <h2>Comments: </h2>
    <?php foreach ($comments as $comment): ?>
        <h4><?php echo $comment->comment ?></h4>
        <p>Posted by <?php echo $comment->username?> on <?php echo $comment->date->format('Y/m/d H:i:s');  if ($comment->editdate !== null) {echo " and edited on ".$comment->editdate->format('Y/m/d H:i:s');}?></p>
    <?php endforeach; ?>
    <a href="#" id="gobackbutton" onclick="window.history.back()">Go back</a>
</article>
