<?php
require '../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/cakecreator/class/cakecreatorproduct.class.php';

$langs->load('cakecreator@cakecreator');

if (!$user->rights->cakecreator->read) accessforbidden();

$cake = new CakeCreatorProduct($db);
$cakes = $cake->fetchAll();

llxHeader('', $langs->trans('CakeCreator'), '');

print '<h1>'.$langs->trans('CakeCreator').'</h1>';
print '<a class="butAction" href="add.php">'.$langs->trans('NewCake').'</a>';

print '<table class="liste">
<tr>
<th>ID</th>
<th>'.$langs->trans('Ref').'</th>
<th>'.$langs->trans('Label').'</th>
<th></th>
</tr>';

foreach ($cakes as $obj) {
    print '<tr>';
    print '<td>'.$obj->rowid.'</td>';
    print '<td>'.$obj->ref.'</td>';
    print '<td>'.$obj->label.'</td>';
    print '<td>';
    print '<a href="edit.php?id='.$obj->rowid.'">'.$langs->trans('Edit').'</a> | ';
    print '<a href="delete.php?id='.$obj->rowid.'">'.$langs->trans('Delete').'</a>';
    print '</td>';
    print '</tr>';
}
print '</table>';

llxFooter();
$db->close();
