<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="zingmars' blog about tech and other stuff. Maybe." name="description" />
    <meta content="zingmars, programming, technology, blog, content" name="keywords" />
    <meta content="zingmars" name="author" />
    <?= $this->fetch('meta') ?>
    <title>zingmars - <?= $title ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('metro.min.css') ?>
    <?= $this->Html->css('metro-icons.min.css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('metro.min.js') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('blog.css') ?>
    <?= $this->Html->script('blog.js') ?>
</head>
<body>
<div class="container">
    <header>
        <h1><a href="<?=$this->Url->build(['controller'=>'blog', 'action'=>'index'])?>">My Blog</a></h1>
        <span>Quote of the day: </span><span class="quote"><?php echo "\"".$latestquote->quote."\" - ".$latestquote->author ?></span>
    </header>
    <div class="flex-grid">
        <div class="row">
            <div class="content-view cell colspan9">
                <?= $this->fetch('content') ?>
            </div>
            <div class="side-bar cell colspan3">
                <div id="latestposts">
                    <h3>Latest posts</h3>
                    <?php foreach($latestposts as $post): ?>
                        <div class="sidebar-post">
                            <a href="<?=$this->Url->build(['controller' => 'blog', 'action' => 'view', $post->id, str_replace(" ", "-", h($post->title))]); ?>"><h4><?= $post->title ?></h4></a>
                            <p><?= substr($post->shortbody, 0, 45) ?>...</p>
                            <p>posted on <?= $post->createdate->format('Y/m/d H:i:s'); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <form action="<?=$this->Url->build(['controller' => 'blog', 'action' => 'find'])?>" method="get" onsubmit="return validateSearch(this.search)" class="search input-control text">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit" value="submit" class="button searchbutton"><span class="mif-search"></span></button>
                </form>
                <!-- TODO: Editable from DB -->
                <h3>Friends and stuff</h3>
                <p><a target="_self" href="https://www.helgesverre.com/">Helge Sverre</a></p>
                <p><a target="_self" href="https://www.svenz.lv/">Svens Jansons</a></p>

                <h3>Misc</h3>
                <div>Version <?=\Cake\Core\Configure::read('version');?> last updated <?=\Cake\Core\Configure::read('lastupdate');?></div>
                <br />
                <a href="<?=$this->Url->build(['controller' => 'splash', 'action' => 'index']);?>">Go home.</a>
                <br />
                <a href="<?=$this->Url->build(['controller' => 'posts', 'action' => 'index.rss']);?>">RSS Feed.</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
