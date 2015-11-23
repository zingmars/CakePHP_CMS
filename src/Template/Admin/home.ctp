<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 style="text-align: center">Welcome</h1>
    <div class="row cells6">
        <div class="dashboard-element">
            <a><h3>System</h3></a>
            <ul class="no-bullets">
                <li> Version: <?=\Cake\Core\Configure::read('version');?></li>
                <li> Release date: <?=\Cake\Core\Configure::read('lastupdate');?></li>
                <li> Latest version: -</li>
                <li> Latest version release date: -</li>
                <li> Framework name: CakePHP </li>
                <li> Framework version: <?php echo $CakeVersion ?></li>
            </ul>
        </div>
        <div class="dashboard-element">
            <a><h3>Web server</h3></a>
            <ul class="no-bullets">
                <li> Web server version: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
                <li> PHP version: <?php echo phpversion(); ?></li>
            </ul>
        </div>
    </div>
    <div class="row cells6">
        <div class="dashboard-element">
            <a><h3>Database</h3></a>
            <ul class="no-bullets">
                <li> Server: <?php echo $Server; ?></li>
                <li> Driver: <?php echo $Driver; ?></li>
                <li> Server version: <?php echo $MyVersion; ?></li>
                <li> Database user: <?php echo $User; ?></li>
                <li> Server charset: <?php echo $Charset; ?></li>
                <li> Timezone: <?php echo $Timezone; ?> </li>
            </ul>
        </div>

        <div class="dashboard-element">
            <a><h3>Current user</h3></a>
            <ul class="no-bullets">
                <li> Username: <?php echo $Username; ?></li>
                <li> Full name: <?php echo $FullName; ?></li>
                <li> Last login: <?php echo $LastLogin->format('Y/m/d H:i:s'); ?></li>
                <li> Last login IP: <?php echo $LastLoginIP; ?></li>
                <li> Current IP: <?php echo $CurrentIP; ?></li>
                <!--<li> Active language: English <a href="#">[Change language]</a></li>-->
            </ul>
        </div>
    </div>
</div>