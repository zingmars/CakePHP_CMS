<!-- TODO: Highlighting and shortmessage should only go around the highlighted text or first characters if it's in the title and not in text. -->
<?php foreach ($results as $post): ?>
    <div class="content-post">
        <h2><?= $post->title ?></h2>
        <p class="postdate">Posted on: <?=
            $post->createdate->format('Y/m/d H:i:s');
            if(!is_null($post->lasteditdate)) {
                echo ", edited at ".$post->lasteditdate->format('Y/m/d H:i:s');
                if($post->showeditreason !== false && $post->editreason !== "") {
                    echo ", reason - \"".$post->editreason."\"";} }
            ?></p>
        <p><?=$post->shortbody;?></p>
        <a href="<?=$this->Url->build(['controller' => 'blog', 'action' => 'view', $post->id, str_replace(" ", "-", h($post->title))]); ?>">Click here to read the full post...</a>
    </div>
<?php endforeach; ?>
<div class="pagination-urls">
    <?= $this->Paginator->first('<h4>(First page)</h4>', ['escape' => false]);?>
    <?= $this->Paginator->prev('<h4>(<< ' .('previous)</h4>'), ['escape' => false]);?>
    <?= $this->Paginator->next(('<h4>(next').' >>)</h4>', ['escape' => false]);?>
    <?= $this->Paginator->last('<h4>(Last page)</h4>', ['escape' => false]);?>
</div>
