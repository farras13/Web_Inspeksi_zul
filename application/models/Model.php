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
    public function insData($t, $object)
    {
        $this->db->insert($t, $object);
    }
    public function updData($t, $object)
    {
       $this->db->update($t, $object);
    }
    public function delData($t,$w)
    {
        $this->db->delete($t,$w);        
    }

}

/* End of file Model.php */

?>