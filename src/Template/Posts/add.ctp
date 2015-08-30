<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="posts form large-10 medium-9 columns">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Add Post') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('shortbody');
            echo $this->Form->input('veryshortbody');
            echo $this->Form->input('longbody');
            echo $this->Form->input('createdate');
            echo $this->Form->input('lasteditdate');
            echo $this->Form->input('creator');
            echo $this->Form->input('lasteditor');
            echo $this->Form->input('editreason');
            echo $this->Form->input('showeditreason');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
