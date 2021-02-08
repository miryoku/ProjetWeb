<?php 



foreach($detail as $list)
{
    echo '<a href='.REQ_TYPE_ID.'/'.$list->getNumero_du_tome().'>'.$list."</a>";
}