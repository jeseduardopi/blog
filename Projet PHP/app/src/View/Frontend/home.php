<h1>Un titre de home page</h1>

<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */

?>
<?php
foreach($posts as $post){

    ?>
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">

                <div class="card-body">
                    <h5 class="card-title"><?php  echo $post->getTitle(); ?></h5>
                    <p class="card-text"><?php echo $post->getContent(); ?></p>
                    <a href="/post/<?php echo $post->getId()?>" class="btn btn-primary stretched-link">Lire plus</a>
                </div>

            </div>
        </div>
    </div>

    <?php
}
?>
