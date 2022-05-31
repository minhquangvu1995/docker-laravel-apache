<?php

namespace App\Helpers;

class Helper
{
    public function generateLines()
    {
        echo '<hr>';
    }

    public function generateTitle($title)
    {
        echo '<h3>' . $title . '</h3>';
    }

}
