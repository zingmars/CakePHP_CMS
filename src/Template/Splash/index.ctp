<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content="about Ingmars">
        <meta name="keywords" content="about Ingmars zingmars programmer webdev blog">
        <meta name="author" content="zingmars">
        <meta name="google-site-verification" content="qcVrZUjuVgt0OvJT46RXMI6ozBaeHryC20W2K3ATPJw" />
        <meta name="google-site-verification" content="HnLL_kAzyjjD8HXAlokSk64o_g2zv8a2Uzodhh6cSBQ" />
        <meta name="google-site-verification" content="UfLQ3dWzAejSQD25TeTPSCMB3ujd1Dv2tgbL_gvQ1II" />
        <meta name="google-site-verification" content="qcVrZUjuVgt0OvJT46RXMI6ozBaeHryC20W2K3ATPJw" />
        <meta name="google-site-verification" content="UfLQ3dWzAejSQD25TeTPSCMB3ujd1Dv2tgbL_gvQ1II" />
        <meta name="google-site-verification" content="HnLL_kAzyjjD8HXAlokSk64o_g2zv8a2Uzodhh6cSBQ" />
        <title>About zingmars</title>
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
                <a href="Blog" class="adblock">
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
                    <a href="http://twitter.zingmars.me" target="_self" title="My random ramblings"><i class="fa fa-twitter-square"></i></a>
                    <a href="http://github.zingmars.me" target="_self" title="My Github, never actually used it - GitLab ftw."><i class="fa fa-github-square"></i></a>
                    <a href="http://steam.zingmars.me" target="_self" title="My video game storage"><i class="fa fa-steam-square"></i></a>
                    <a href="https://news.ycombinator.com/user?id=zingmars" target="_self" title="All my friends have one..."><i class="fa fa-hacker-news"></i></a>
                    <a href="http://google.zingmars.me" target="_self" title="Why do I even have this"><i class="fa fa-google-plus-square"></i></a>
                    <a href="https://www.reddit.com/user/zingmars" target="_self" title="My favourite place to procrastinate in"><i class="fa fa-reddit-square"></i></a>
                    <a href="https://www.youtube.com/user/zingmars/" target="_self" title="My videos"><i class="fa fa-youtube-square"></i></a>
                    <a href="#" onclick="getEmail()" title="my email"><i class="fa fa-envelope"></i></a>
                    <a href="Blog" target="_self" title="My blog"><i class="fa fa-rss-square"></i></a>
                </div>
            </div>
        </div>
    </body>
    <script>adblockcheck(); !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</html>