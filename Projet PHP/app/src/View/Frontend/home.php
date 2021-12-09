<h1>Un titre de home page</h1>

<?php
/**
 * @var $user \App\Entity\Author
 * @var $posts \App\Entity\Post[]
 */


print_r($posts);

?>
<table class="table">
    <thead>
    <th>Titre</th>
    <th>Contenu</th>
    <th>Date</th>
    <th>userId</th>
    </thead>
    <tbody>
    <?php
    foreach($posts as $post){
        ?>
        <tr>
            <td><?php echo $post->getTitle(); ?></td>
            <td><?php echo $post->getContent(); ?></td>
            <!--<td><?php //echo $post['publish_date']; ?></td>
            <td><?php // echo $post['userId']; ?></td>-->

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
