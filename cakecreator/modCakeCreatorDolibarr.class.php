<?php
/*
 * Module descriptor for CakeCreatorDolibarr
 */

include_once DOL_DOCUMENT_ROOT . '/core/modules/DolibarrModules.class.php';

class modCakeCreatorDolibarr extends DolibarrModules
{
    /**
     * Constructor. Define names, constants, directories, boxes, permissions
     */
    public function __construct($db)
    {
        global $langs;
        $this->db = $db;
        $this->numero = 104001; // Module number (example)
        $this->rights_class = 'cakecreator';
        $this->family = 'other';
        $this->name = preg_replace('/^mod/', '', get_class($this));
        $this->description = 'Cake Creator module';
        $this->editor_name = 'Example';
        $this->editor_url = 'https://example.com';
        $this->version = '1.0.0';
        $this->const_name = 'MAIN_MODULE_' . strtoupper($this->rights_class);
        $this->picto = 'cakecreator@cakecreator';
        $this->module_parts = array(
            'triggers' => 0,
            'login' => 0,
            'substitutions' => 0,
            'menus' => 1,
            'theme' => 0,
            'tpl' => 0,
            'barcode' => 0,
            'models' => 0,
            'hooks' => array()
        );

        $this->dirs = array('/cakecreator/temp');
        $this->config_page_url = array();
        $this->langfiles = array('cakecreator@cakecreator');
        $this->const = array();
        $this->tabs = array();
        $this->dictionaries = array();

        $this->boxes = array();

        $this->rights = array();
        $this->rights_class = 'cakecreator';

        $r = 0;
        $this->rights[$r][0] = 104001;
        $this->rights[$r][1] = 'Read cakes';
        $this->rights[$r][2] = 'r';
        $this->rights[$r][3] = 1;
        $this->rights[$r][4] = 'read';
        $r++;
        $this->rights[$r][0] = 104002;
        $this->rights[$r][1] = 'Create/Update cakes';
        $this->rights[$r][2] = 'w';
        $this->rights[$r][3] = 1;
        $this->rights[$r][4] = 'write';
        $r++;
        $this->rights[$r][0] = 104003;
        $this->rights[$r][1] = 'Delete cakes';
        $this->rights[$r][2] = 'd';
        $this->rights[$r][3] = 1;
        $this->rights[$r][4] = 'delete';

        $this->menu = array(
            array(
                'fk_menu' => 0,
                'type' => 'top',
                'titre' => 'Cake Creator',
                'mainmenu' => 'cakecreator',
                'leftmenu' => 'cakecreator',
                'url' => '/cakecreator/list.php',
                'langs' => 'cakecreator@cakecreator',
                'position' => 100,
                'enabled' => '\$conf->cakecreator->enabled',
                'perms' => '\$user->rights->cakecreator->read',
                'target' => '',
                'user' => 0
            )
        );
    }

    /**
     * Initialize the module.
     */
    public function init($options = '')
    {
        $sql = array();
        $file = DOL_DOCUMENT_ROOT . '/cakecreator/sql/cakecreator.sql';
        if (file_exists($file)) {
            $sql = array_merge($sql, file($file));
        }
        return $this->_init($sql, $options);
    }

    /**
     * Remove module.
     */
    public function remove($options = '')
    {
        $sql = array('DROP TABLE IF EXISTS ' . MAIN_DB_PREFIX . "cakecreator_cakes");
        return $this->_remove($sql, $options);
    }
}

?>
