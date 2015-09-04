<?php foreach ($results as $post): ?>
    <div class="content-post">
        <h2><?php echo(preg_replace("/($search)/", sprintf('<span class="highlight">$1</span>'), $post->title)); ?></h2>
        <p class="postdate">Posted on: <?=
            $post->createdate->format('Y/m/d H:i:s');
            if(!is_null($post->lasteditdate)) {
                echo ", edited at ".$post->lasteditdate->format('Y/m/d H:i:s');
                if($post->showeditreason !== false && $post->editreason !== "") {
                    echo ", reason - \"".$post->editreason."\"";} }
            ?></p>
        <p><?php echo(preg_replace("/($search)/", sprintf('<span class="highlight">$1</span>'), substr($post->shortbody, 0, 150))); ?>...</p>
        <a href="<?=$this->Url->build(['controller' => 'blog', 'action' => 'view', $post->id, str_replace(" ", "-", h($post->title))]); ?>">Click here to read the full post...</a>
    </div>
<?php endforeach; ?>
<div class="pagination-urls">
    <?= $this->Paginator->first('<h4>(First page)</h4>', ['escape' => false]);?>
    <?= $this->Paginator->prev('<h4>(<< ' .('previous)</h4>'), ['escape' => false]);?>
    <?= $this->Paginator->next(('<h4>(next').' >>)</h4>', ['escape' => false]);?>
    <?= $this->Paginator->last('<h4>(Last page)</h4>', ['escape' => false]);?>
</div>
