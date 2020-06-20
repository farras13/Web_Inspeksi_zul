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
    public function gl($t)
    {
        return $this->db->get($t, 1);
    }
    public function getWL($table,$title)
    {
        $this->db->order_by($title, 'desc'); 
        return $this->db->get($table);
    }
    public function getPk()
    {
       $this->db->join('p3k', 'p3k.id_p3k = detail_p3k.id_p3k', 'left');
       $this->db->join('list_p3k', 'list_p3k.id_list_p3k = detail_p3k.id_list_p3k', 'left');
       return $this->db->get('detail_p3k');       
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