<?php
require '../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/cakecreator/class/cakecreatorproduct.class.php';

$langs->load('cakecreator@cakecreator');

if (!$user->rights->cakecreator->write) accessforbidden();

$action = GETPOST('action', 'alpha');
$cake = new CakeCreatorProduct($db);

if ($action == 'add') {
$category = GETPOST('category', 'alpha');
$ref = GETPOST('ref', 'alpha');
if (empty($ref) && !empty($category)) {
    $cake->ref = $cake->generateRef($category);
} else {
    $cake->ref = $ref;
}
    $cake->label = GETPOST('label', 'alpha');
    $cake->description = GETPOST('description', 'alpha');
    $cake->stuffing = GETPOST('stuffing', 'alpha');
    $cake->soaking = GETPOST('soaking', 'alpha');
    $cake->cake_color = GETPOST('cake_color', 'alpha');
    $cake->photo_weight = GETPOST('photo_weight', 'int');
    $cake->weight = GETPOST('weight', 'int');
    $cake->tiers = GETPOST('tiers', 'alpha');
    $cake->coverage = GETPOST('coverage', 'alpha');
    $cake->decoration_type = GETPOST('decoration_type', 'alpha');
    $cake->image_url = GETPOST('image_url', 'alpha');

    $cake->create($user);
    header('Location: list.php');
    exit;
}

llxHeader('', $langs->trans('NewCake'), '');

print '<form method="POST" action="add.php">';
print '<input type="hidden" name="action" value="add">';
print '<table class="border">';
print '<tr><td>Category</td><td><input type="text" name="category"></td></tr>';
print '<tr><td>Ref</td><td><input type="text" name="ref"></td></tr>';
print '<tr><td>'.$langs->trans('Label').'</td><td><input type="text" name="label"></td></tr>';
print '<tr><td>'.$langs->trans('Description').'</td><td><textarea name="description"></textarea></td></tr>';
print '<tr><td>'.$langs->trans('Stuffing').'</td><td><input type="text" name="stuffing"></td></tr>';
print '<tr><td>'.$langs->trans('Soaking').'</td><td><input type="text" name="soaking"></td></tr>';
print '<tr><td>'.$langs->trans('CakeColor').'</td><td><input type="text" name="cake_color"></td></tr>';
print '<tr><td>'.$langs->trans('PhotoWeight').'</td><td><input type="number" name="photo_weight"></td></tr>';
print '<tr><td>'.$langs->trans('Weight').'</td><td><input type="number" name="weight"></td></tr>';
print '<tr><td>'.$langs->trans('Tiers').'</td><td><input type="text" name="tiers"></td></tr>';
print '<tr><td>'.$langs->trans('Coverage').'</td><td><input type="text" name="coverage"></td></tr>';
print '<tr><td>'.$langs->trans('DecorationType').'</td><td><input type="text" name="decoration_type"></td></tr>';
print '<tr><td>'.$langs->trans('ImageURL').'</td><td><input type="text" name="image_url"></td></tr>';
print '</table>';
print '<div class="center"><input type="submit" class="button" value="'.$langs->trans('Add').'"></div>';
print '</form>';

llxFooter();
$db->close();
