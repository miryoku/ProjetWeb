<?php




foreach($mangas as $list)
    {
        echo '<a href='.REQ_TYPE.'/'.$list->getTitreUrl().'>'.$list."</a>";
    }