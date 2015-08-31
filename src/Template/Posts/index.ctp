<?php foreach ($posts as $post): ?>
    <div class="content-post">
        <h2><?= $post->title ?></h2>
        <p class="postdate">Posted on: <?= date('M j Y, h:i', strtotime(h($post->createdate))); ?></p>
        <p><?=$post->shortbody;?></p>
        <a href="<?=$this->Url->build(['controller' => 'blog', 'action' => 'view', $post->id, str_replace(" ", "-", h($post->title))]); ?>">Click here to read the full post...</a>
    </div>
<?php endforeach; ?>
<!-- I probably want to make these look a little better. -->
<div class="pagination-urls">
    <?= $this->Paginator->first('<h4>(First page)</h4>', ['escape' => false]);?>
    <?= $this->Paginator->prev('<h4>(<< ' .('previous)</h4>'), ['escape' => false]);?>
    <?= $this->Paginator->next(('<h4>(next').' >>)</h4>', ['escape' => false]);?>
    <?= $this->Paginator->last('<h4>(Last page)</h4>', ['escape' => false]);?>
</div>
