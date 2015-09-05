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
    <a class="app-bar-element branding">BrandName</a>
    <span class="app-bar-divider"></span>
    <ul class="app-bar-menu">
        <li><a href="">Dashboard</a></li>
        <li>
            <a href="" class="dropdown-toggle">Project</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">New project</a></li>
                <li class="divider"></li>
                <li>
                    <a href="" class="dropdown-toggle">Reopen</a>
                    <ul class="d-menu" data-role="dropdown">
                        <li><a href="">Project 1</a></li>
                        <li><a href="">Project 2</a></li>
                        <li><a href="">Project 3</a></li>
                        <li class="divider"></li>
                        <li><a href="">Clear list</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="">Security</a></li>
        <li><a href="">System</a></li>
        <li>
            <a href="" class="dropdown-toggle">Help</a>
            <ul class="d-menu" data-role="dropdown">
                <li><a href="">ChatOn</a></li>
                <li><a href="">Community support</a></li>
                <li class="divider"></li>
                <li><a href="">About</a></li>
            </ul>
        </li>
    </ul>

    <div class="app-bar-element place-right">
        <span class="dropdown-toggle"><span class="mif-cog"></span> User Name</span>
        <div class="app-bar-drop-container padding10 place-right no-margin-top block-shadow fg-dark" data-role="dropdown" data-no-close="true" style="width: 220px">
            <h2 class="text-light">Quick settings</h2>
            <ul class="unstyled-list fg-dark">
                <li><a href="" class="fg-white1 fg-hover-yellow">Profile</a></li>
                <li><a href="" class="fg-white2 fg-hover-yellow">Security</a></li>
                <li><a href="logout" class="fg-white3 fg-hover-yellow">Exit</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="flex-grid no-responsive-future" style="height: 100%;">
        <div class="row" style="height: 100%">
            <div id="cell-sidebar" class="cell" style="max-width: 200px;">
            <ul class="sidebar no-responsive-future">
                <li><a href="#">
                        <span class="mif-apps icon"></span>
                        <span class="title">all items</span>
                        <span class="counter">0</span>
                    </a></li>
                <li><a href="#">
                        <span class="mif-vpn-publ icon"></span>
                        <span class="title">websites</span>
                        <span class="counter">0</span>
                    </a></li>
                <li class="active"><a href="#">
                        <span class="mif-drive-eta icon"></span>
                        <span class="title">Virtual machines</span>
                        <span class="counter">2</span>
                    </a></li>
                <li><a href="#">
                        <span class="mif-cloud icon"></span>
                        <span class="title">Cloud services</span>
                        <span class="counter">0</span>
                    </a></li>
                <li><a href="#">
                        <span class="mif-database icon"></span>
                        <span class="title">SQL Databases</span>
                        <span class="counter">0</span>
                    </a></li>
                <li><a href="#">
                        <span class="mif-cogs icon"></span>
                        <span class="title">Automation</span>
                        <span class="counter">0</span>
                    </a></li>
                <li><a href="#">
                        <span class="mif-apps icon"></span>
                        <span class="title">all items</span>
                        <span class="counter">0</span>
                    </a></li>
            </ul>
            </div>
            <div class="cell auto-size padding20 bg-white" id="cell-content">
                <h1 class="text-light">Virtual machines <span class="mif-drive-eta place-right"></span></h1>
                <hr class="thin bg-grayLighter">
                <button class="button primary" onclick="pushMessage('info')"><span class="mif-plus"></span> Create...</button>
                <button class="button success" onclick="pushMessage('success')"><span class="mif-play"></span> Start</button>
                <button class="button warning" onclick="pushMessage('warning')"><span class="mif-loop2"></span> Restart</button>
                <button class="button alert" onclick="pushMessage('alert')">Stop all machines</button>
                <hr class="thin bg-grayLighter">
                <table class="dataTable border bordered" data-role="datatable" data-auto-width="false">
                    <thead>
                    <tr>
                        <td style="width: 20px">
                        </td>
                        <td class="sortable-column sort-asc" style="width: 100px">ID</td>
                        <td class="sortable-column">Machine name</td>
                        <td class="sortable-column">Address</td>
                        <td class="sortable-column" style="width: 20px">Status</td>
                        <td style="width: 20px">Switch</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label class="input-control checkbox small-check no-margin">
                                <input type="checkbox">
                                <span class="check"></span>
                            </label>
                        </td>
                        <td>123890723212</td>
                        <td>Machine number 1</td>
                        <td><a href="http://virtuals.com/machines/123890723212">link</a></td>
                        <td class="align-center"><span class="mif-checkmark fg-green"></span></td>
                        <td>
                            <label class="switch-original">
                                <input type="checkbox" checked>
                                <span class="check"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="input-control checkbox small-check no-margin">
                                <input type="checkbox">
                                <span class="check"></span>
                            </label>
                        </td>
                        <td>123890723212</td>
                        <td>Machine number 2</td>
                        <td><a href="http://virtuals.com/machines/123890723212">link</a></td>
                        <td class="align-center"><span class="mif-stop fg-red"></span></td>
                        <td>
                            <label class="switch-original">
                                <input type="checkbox">
                                <span class="check"></span>
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>