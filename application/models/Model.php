<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    public function getData($t)
    {
        return $this->db->get($t);
    }
    public function getDataId($t,$w)
    {
        $this->db->where($w);
        return $this->db->get($t);
    }
    public function getWL($table,$title)
    {
        $this->db->order_by($title, 'desc'); 
        return $this->db->get($table);
    }
    public function insData($t, $object)
    {
        $this->db->insert($t, $object);
    }
    public function updData($t, $object, $w)
    {
       $this->db->update($t, $object, $w);
    }
    public function delData($t,$w)
    {
        $this->db->delete($t,$w);        
    }

}

/* End of file Model.php */

?>