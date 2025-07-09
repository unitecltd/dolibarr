<?php
/**
 * Class to manage cake products
 */
class CakeCreatorProduct
{
    public $db;
    public $table = 'cakecreator_cakes';

    public $id;
    public $ref;
    public $label;
    public $description;
    public $stuffing;
    public $soaking;
    public $cake_color;
    public $photo_weight;
    public $weight;
    public $tiers;
    public $coverage;
    public $decoration_type;
    public $image_url;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Generate product reference
     *
     * @param string $category Category code
     * @return string
     */
    public function generateRef($category)
    {
        $uniq = time();
        return strtoupper($category) . '-' . $uniq;
    }

    /**
     * Create product
     */
    public function create($user)
    {
        $sql = "INSERT INTO " . MAIN_DB_PREFIX . "$this->table
            (ref, label, description, stuffing, soaking, cake_color, photo_weight, weight, tiers, coverage, decoration_type, image_url)
            VALUES (
                '".$this->db->escape($this->ref)."',
                '".$this->db->escape($this->label)."',
                '".$this->db->escape($this->description)."',
                '".$this->db->escape($this->stuffing)."',
                '".$this->db->escape($this->soaking)."',
                '".$this->db->escape($this->cake_color)."',
                "".(float)$this->photo_weight.",
                "".(float)$this->weight.",
                '".$this->db->escape($this->tiers)."',
                '".$this->db->escape($this->coverage)."',
                '".$this->db->escape($this->decoration_type)."',
                '".$this->db->escape($this->image_url)."'
            )";
        return $this->db->query($sql);
    }

    /**
     * Fetch all cakes
     */
    public function fetchAll()
    {
        $sql = "SELECT * FROM " . MAIN_DB_PREFIX . "$this->table";
        $resql = $this->db->query($sql);
        $rows = array();
        if ($resql) {
            while ($obj = $this->db->fetch_object($resql)) {
                $rows[] = $obj;
            }
        }
        return $rows;
    }

    /**
     * Update cake
     */
    public function update($id)
    {
        $sql = "UPDATE " . MAIN_DB_PREFIX . "$this->table SET
            label='".$this->db->escape($this->label)."',
            description='".$this->db->escape($this->description)."',
            stuffing='".$this->db->escape($this->stuffing)."',
            soaking='".$this->db->escape($this->soaking)."',
            cake_color='".$this->db->escape($this->cake_color)."',
            photo_weight=".(float)$this->photo_weight.",
            weight=".(float)$this->weight.",
            tiers='".$this->db->escape($this->tiers)."',
            coverage='".$this->db->escape($this->coverage)."',
            decoration_type='".$this->db->escape($this->decoration_type)."',
            image_url='".$this->db->escape($this->image_url)."'
            WHERE rowid=".(int)$id;
        return $this->db->query($sql);
    }

    /**
     * Delete cake
     */
    public function delete($id)
    {
        $sql = "DELETE FROM " . MAIN_DB_PREFIX . "$this->table WHERE rowid=".(int)$id;
        return $this->db->query($sql);
    }
}
