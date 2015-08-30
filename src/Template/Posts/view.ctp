<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Post'), ['action' => 'edit', $post->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Post'), ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete # {0}?', $post->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Post'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="posts view large-10 medium-9 columns">
    <h2><?= h($post->title) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($post->id) ?></p>
            <h6 class="subheader"><?= __('Creator') ?></h6>
            <p><?= $this->Number->format($post->creator) ?></p>
            <h6 class="subheader"><?= __('Lasteditor') ?></h6>
            <p><?= $this->Number->format($post->lasteditor) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Createdate') ?></h6>
            <p><?= h($post->createdate) ?></p>
            <h6 class="subheader"><?= __('Lasteditdate') ?></h6>
            <p><?= h($post->lasteditdate) ?></p>
        </div>
        <div class="large-2 columns booleans end">
            <h6 class="subheader"><?= __('Showeditreason') ?></h6>
            <p><?= $post->showeditreason ? __('Yes') : __('No'); ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Title') ?></h6>
            <?= $this->Text->autoParagraph(h($post->title)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Shortbody') ?></h6>
            <?= $this->Text->autoParagraph(h($post->shortbody)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Veryshortbody') ?></h6>
            <?= $this->Text->autoParagraph(h($post->veryshortbody)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Longbody') ?></h6>
            <?= $this->Text->autoParagraph(h($post->longbody)) ?>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Editreason') ?></h6>
            <?= $this->Text->autoParagraph(h($post->editreason)) ?>
        </div>
    </div>
</div>
