<h1>Homepage</h1>
<?php
#voir les variables
foreach($vars as $article):
    ?>
    <div>
        <h2><?= $article->getTitle(); ?></h2>
        <p><?= substr($article->getContent(), 0, 500); ?></p>
        <a href="/article/<?= $article->getId(); ?>">Lire plus</a>
    </div>
<?php endforeach; ?>
