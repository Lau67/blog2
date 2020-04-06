<?php $title = 'Mon blog !!!!!!!'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !!!! SUPER</h1>
        <p><a href="index.php">Retour à la liste des Sujets</a></p> <!--comment revenir à la racine -->



   <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
    </div>

        <h2>Commentaires</h2>

        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>

<?php
while ($comment = $comments->fetch())
{
?>

<p><?= htmlspecialchars($comment['author']) ?> , <?= $comment['comment_date_fr'] ?> </p>

<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('./View/Frontend/template.php'); ?>