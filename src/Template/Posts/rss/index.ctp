<?php
$this->set('channelData', [
    'title' => __("Most recent posts on zingmars' blog."),
    'link' => $this->Url->build('/', true),
    'description' => __("Most recent posts."),
    'language' => 'en-us'
]);

foreach ($posts as $post) {
    $created = strtotime($post->created);

    $link = [
        'controller' => 'blog',
        'action' => 'view',
        $post->id,
        str_replace(" ", "-", h($post->title))
    ];

    // Remove & escape any HTML to make sure the feed content will validate.
    $body = h(strip_tags($post->shortbody));
    $body = $this->Text->truncate($body, 400, [
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ]);

    echo  $this->Rss->item([], [
        'title' => $post->title,
        'link' => $link,
        'guid' => ['url' => $link, 'isPermaLink' => 'true'],
        'description' => $body,
        'pubDate' => $post->created
    ]);
}
?>