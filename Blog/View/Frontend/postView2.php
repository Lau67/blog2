
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon blog O_o</title>
        <link href="./Public/style.css" rel="stylesheet" /> 
    </head>
        
   

    <body>
        <h1>Mon super blog !!!! SUPER</h1>
        <p><a href="Blog/index.php">Retour à la liste des Sujets</a></p>

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

    </body>
   
</html>
