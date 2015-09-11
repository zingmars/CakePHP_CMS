<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="zingmars">

    <?= $this->fetch('meta') ?>
    <title>Admin panel - <?= $title ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('metro.min.css') ?>
    <?= $this->Html->css('metro-icons.min.css') ?>
    <?= $this->Html->css('metro-responsive.min.css') ?>
    <?= $this->Html->css('jquery.dataTables.min.css') ?>
    <?= $this->fetch('css') ?>
    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('jquery.dataTables.min.js') ?>
    <?= $this->Html->script('metro.min.js') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('admin.css') ?>
    <?= $this->Html->script('admin.js') ?>
</head>
<body class="bg-steel">
<div class="app-bar fixed-top darcula" data-role="appbar">
    <a href="home" class="app-bar-element branding">zingmars.info</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <li><a href="home">Dashboard</a></li>
        <li>
            <a href="posts" class="dropdown-toggle">Posts</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="posts">Posts</a></li>
                <li><a href="#" onclick="pushMessage('alert', 'Error', 'Feature not implemented yet.')">Comments</a></li>
            </ul>
        </li>
        <li><a href="analytics">Analytics</a></li>
        <li><a href="maillist">Mailing list</a></li>
        <li><a href="settings">Settings</a></li>
    </ul>

    <div class="app-bar-element place-right">
        <span class="dropdown-toggle"><span class="mif-cog"></span> <?=$this->request->session()->read('Auth.User.visiblename');?></span>
        <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
            <h2 class="text-light">User</h2>
            <ul class="unstyled-list fg-dark">
                <li><a href="profile" class="fg-white1 fg-hover-yellow">Profile</a></li>
                <li><a href="security" class="fg-white2 fg-hover-yellow">Security</a></li>
                <br />
                <li><a href="logout" class="fg-white3 fg-hover-yellow">Exit</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="flex-grid no-responsive-future" style="height: 100%;">
        <div class="row" style="height: 100%">
            <?= $this->fetch('content') ?>
        </div>
    </div>
</div>
</body>
</html>