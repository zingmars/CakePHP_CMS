<div class="cell auto-size padding20 bg-white" id="cell-content">
    <h1 style="text-align: center">Welcome</h1>
    <div class="row cells6">
        <div class="dashboard-element">
            <a><h3>System</h3></a>
            <ul class="no-bullets">
                <li> Version: <?=\Cake\Core\Configure::read('version');?></li>
                <li> Release date: <?=\Cake\Core\Configure::read('lastupdate');?></li>
                <li> Latest version: Not implemented yet</li>
                <li> Latest version release date: Not implemented yet</li>
                <li> Framework name: CakePHP </li>
                <li> Framework version: </li>
            </ul>
        </div>
        <div class="dashboard-element">
            <a><h3>Web server</h3></a>
            <ul class="no-bullets">
                <li> Web server version: </li>
                <li> PHP version: </li>
            </ul>
        </div>
    </div>
    <div class="row cells6">
        <div class="dashboard-element">
            <a><h3>Database</h3></a>
            <ul class="no-bullets">
                <li> Server: </li>
                <li> Server type: MySQL</li>
                <li> Server version: </li>
                <li> Database user: </li>
                <li> Server charset: </li>
            </ul>
        </div>

        <div class="dashboard-element">
            <a><h3>Current user</h3></a>
            <ul class="no-bullets">
                <li> Username: </li>
                <li> Full name: MySQL</li>
                <li> Last login: </li>
                <li> Last login IP: </li>
                <li> Current IP: </li>
                <li> Active language: English <a href="#">[Change language]</a></li>
            </ul>
        </div>
    </div>
</div>