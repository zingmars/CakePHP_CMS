<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="about Ingmars">
        <meta name="keywords" content="about Ingmars zingmars programmer webdev blog">
        <meta name="author" content="zingmars">
        <title>Front page</title>
        <?= $this->Html->css('splash.css') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->script('splash.js') ?>
        <?= $this->Html->meta('icon') ?>
        <link href="http://fonts.googleapis.com/css?family=Roboto|Alegreya:700" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="background-container">
            <div class="background-img"> </div>
        </div>
        <div class="about-container opaque pos1">
        </div>
        <div class="about-container pos1 about-box noselect">
            <div id="about-name">Ingmars Melkis</div>
            <div id="about-title">Student, Programmer</div>
            <div id="about-description">
                <!--I'll get around to writing a bio one day. For now have a twitter box instead.-->
                <a class="twitter-timeline"  href="https://twitter.com/zingmars" data-widget-id="637659686414761984">Tweets by @zingmars. If you see this, it's probably still loading. Click here to go directly to my feed on twitter.com</a>
                <a href="<?=$this->Url->build(['controller'=>'blog', 'action'=>'index'])?>" class="adblock">
                    It appears that you're using an ad blocker or a similar piece of software that removes any references to social networks i.e. Twitter. To see this page the way it was intented to be viewed, please reload this page with all blocklists disabled. You can also click on this message to go directly to my blog. Your choice. ¯\_(ツ)_/¯
                </a>
                <noscript>
                    <p>
                        It appears that you have Javascript disabled. Just thought you might want to know.
                    </p>
                </noscript>
            </div>
            <div id="about-infobox">
                <div id="about-location"><i class="fa fa-map-marker"></i> <a href="https://www.google.com/maps?q=R%C4%ABga,+R%C4%ABgas+pils%C4%93ta,+Latvia" target="_self">Riga, Latvia</a></div>
                <div id="about-school"><i class="fa fa-graduation-cap"></i> <a href="http://www.rvt.lv/en/">Rigas Valsts Tehnikums</a></div>
                <div id="about-misc">
                    <a href="https://keybase.io/zingmars/key.asc" target="_self" title="Public GPG key"><i class="fa fa-key"></i></a>
                    <a href="http://github.zingmars.me" target="_self" title="My Github, never actually used it - GitLab ftw."><i class="fa fa-github-square"></i></a>
                    <a href="#" onclick="getEmail()" title="my email"><i class="fa fa-envelope"></i></a>
                    <a href="<?=$this->Url->build(['controller'=>'blog', 'action'=>'index'])?>" target="_self" title="My blog"><i class="fa fa-rss-square"></i></a>
                </div>
            </div>
        </div>
    </body>
    <script>adblockcheck(); !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</html>