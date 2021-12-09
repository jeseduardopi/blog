<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
$comments = new \App\Manager\CommentManager(new \App\Factory\PDOFactory());

$post = new \App\Manager\PostManager(new \App\Factory\PDOFactory());

$test = $comments->getAllComments();


$posts = $post->getAllPosts();

//var_dump($posts);


?>



<!-- ***********     View of the template // HERE JUST FOR TESTING PURPOSES-->

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Ranking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
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
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['content']; ?></td>
            <td><?php echo $post['publish_date']; ?></td>
            <td><?php echo $post['userId']; ?></td>

        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</div>
</body>
</html>
<?php



?>



