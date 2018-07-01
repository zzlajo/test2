<?php


function redirect($path, $message = [])
{
    if (count($message))
        $_SESSION['messages'][$message[0]][] = $message[1];

    header("Location: " . BASE_URL . $path);
    exit();
}

