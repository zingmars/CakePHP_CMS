<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta content="plsdonotsnoop" name="description" />
    <meta content="peek-a-boo" name="keywords" />
    <meta content="zingmars" name="author" />

    <?= $this->fetch('meta') ?>
    <title>Admin panel - <?= $title ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('metro.min.css') ?>
    <?= $this->Html->css('metro-icons.min.css') ?>
    <?= $this->Html->css('metro-responsive.min.css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('metro.min.js') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('login.css') ?>
    <?= $this->Html->script('login.js') ?>
</head>
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</body>
</html>