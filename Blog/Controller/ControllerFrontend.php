<?php

// Chargement des classes
require_once('Blog/Model/PostManager.php');
require_once('Blog/Model/CommentManager.php');

//use Blog\Model\PostManager;
//use Blog\Model\CommentManager;

function listPosts()  //pour afficher les 5 derniers posts
{
    $postManager = new Blog\Model\PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('Blog/View/Frontend/listPostsView.php');
}

function post() //pour afficher le post selectionné avec ses commentaires
{
    $postManager = new Blog\Model\PostManager();
    $commentManager = new Blog\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('Blog/View/Frontend/postView.php');
}

function addComment($postId, $author, $comment)  //pour ajouter un commentaire
{
    $commentManager = new Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

