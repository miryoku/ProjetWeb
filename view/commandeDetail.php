<table>

    <tr>
        <th>Titre</th>
        <th>Numero du tome</th>
        <th>Prix</th>
        <th>Ean</th>
    </tr>
   <?php foreach($arrays as $array): ?>
    <tr>
        <td><?= $array[1]->getTitre() ?></td>
        <td><?= $array[2]->getNumero_du_tome() ?></td>
        <td><?= $array[0]->getPrix() ?></td>
        <td><?= $array[2]->getEan() ?></td>
    </tr>
   <?php endforeach?>
</table>