<?php foreach ($posts as $post): ?>
    <h2><?= $post['title']?></h2>
    <p><?= $post['text']?></p>
    <a href="<?= ROOT?>/post/<?= $post['id']?>">More...</a>
    <br>
<?php endforeach;?>
<hr>
<a href="<?= ROOT?>/post/add">Add post</a>