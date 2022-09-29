<?php



function isloggedIn()
{
    if (isset($_SESSION['id'])) {
        return true;
    } else {
        return false;
    }
}


// prevention

function prevention()
{
    if (!isloggedIn()) {
        redirect(base_url('login'));
    }
}
// if login return to product page
function guard()
{
    if (isloggedIn()) {
        redirect(base_url('product'));
    }
}
