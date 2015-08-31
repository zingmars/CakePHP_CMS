<div class="container">
    <header>
        <h1><a href="./Blog">My Blog</a></h1>
        <!--Test: --><?php /*$this->fetch('quote'); */?>
        <!--<span>Quote of the day: </span><span class="quote">"Individual Ambition Serves the Common Good" -Adam Smith</span>-->
    </header>
    <div class="flex-grid">
        <div class="row">
            <div class="content-view cell colspan9">
                <?php foreach ($posts as $post): ?>
                    <div class="content-post">
                        <h2><?= $post->title ?></h2>
                        <p class="postdate">Posted on: <?= date('M j Y, h:i', strtotime(h($post->createdate))); ?></p>
                        <p><?=$post->shortbody;?></p>
                        <a href="Blog/View?id=<?=$post->id;?>">Click here to read the full post...</a>
                    </div>
                <?php endforeach; ?>
                <!-- I probably want to make these look a little better. -->
                <div class="pagination-urls">
                    <?= $this->Paginator->first('<h4>(First page)</h4>', ['escape' => false]);?>
                    <?= $this->Paginator->prev('<h4>(<< ' .('previous)</h4>'), ['escape' => false]);?>
                    <?= $this->Paginator->next(('<h4>(next').' >>)</h4>', ['escape' => false]);?>
                    <?= $this->Paginator->last('<h4>(Last page)</h4>', ['escape' => false]);?>
                </div>
            </div>
            <div class="side-bar cell colspan3">
                <div id="latestposts">
                    <h3>Latest posts</h3>
                    <?php foreach($latestposts as $post): ?>
                        <div class="sidebar-post">
                            <a href="Blog/View?id=<?=$post->id;?>"><h4><?= $post->title ?></h4></a>
                            <p><?= $post->veryshortbody ?>n</p>
                            <p>posted on <?= date('Y/m/d H:i:s', strtotime(h($post->createdate)));?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="search input-control text">
                    <input type="text" placeholder="Search...">
                    <button class="button"><span class="mif-search"></span></button>
                </div>
                <!-- TODO: Editable from DB -->
                <h3>Friends and stuff</h3>
                <p><a target="_self" href="https://www.helgesverre.com/">Helge Sverre</a></p>
                <p><a target="_self" href="https://www.svenz.lv/">Svens Jansons</a></p>
            </div>
        </div>
    </div>
</div>