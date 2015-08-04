<?php
date_default_timezone_set('UTC');
preg_match_all("/(.*);(.*)/", $_GET['text'], $posts);

for($i = 0; $i < count($posts[1]); $i++) {
    $post = $posts[1][$i];
    $post = explode(";", $post);
    $post[0] = trim($post[0]);
    $post[1] = trim($post[1]);
    $post[2] = trim($post[2]);
    $post[3] = trim($post[3]);
    $comments = explode("/", $posts[2][$i]);
    echo processPost($post, $comments);
}

function processPost($post, $comments) {
    $name = $post[0];
    $date = strtotime($post[1]);
    $date = date("j F Y", $date);
    $content = $post[2];
    $likes = $post[3];
    $formattedComment = '';
    if(strlen($comments[0]) > 0) {
        $formattedComment = "<div class=\"comments\">";
        foreach($comments as $comment) {
            $comment = trim($comment);
            $formattedComment .= "<p>" . htmlspecialchars($comment) . "</p>";
        }
        $formattedComment .= "</div>";

        return $formatedPost = "<article><header><span>" . htmlspecialchars($name) . "</span><time>" . $date . "</time></header><main><p>" . htmlspecialchars($content) ."</p></main><footer><div class=\"likes\">" . $likes . " people like this</div>" . $formattedComment . "</footer></article>";
    }

    return $formatedPost = "<article><header><span>" . htmlspecialchars($name) . "</span><time>" . $date . "</time></header><main><p>" . htmlspecialchars($content) ."</p></main><footer><div class=\"likes\">" . $likes . " people like this</div></footer></article>";
}

