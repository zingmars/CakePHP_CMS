<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="zingmars' blog about tech and other stuff. Maybe." name="description" />
    <meta content="zingmars, programming, technology, blog, content" name="keywords" />
    <meta content="zingmars" name="author" />
    <?= $this->fetch('meta') ?>
    <title>zingmars - <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('metro.min.css') ?>
    <?= $this->Html->css('metro-icons.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('metro.min.js') ?>
    <?= $this->Html->script('Blog.js') ?>
    <?= $this->Html->css('blog.css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->fetch('content') ?>
</body>
</html>
