<?php

function is_online()
{
    return isset($_SESSION['user_data']) ? true : false;
}
