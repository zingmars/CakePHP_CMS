<h1><?= h($post->title) ?></h1>
<p><?= h($post->longbody) ?></p>
<p><small>Created: <?= $post->createdate->format(DATE_RFC850) ?></small></p>