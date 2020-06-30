<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model {

    public function getData($t)
    {
        return $this->db->get($t);
    }
    public function getDataO($t,$cl,$od)
    {
        $this->db->order_by($cl, $od);
        return $this->db->get($t);
    }
    public function getDataId($t,$w)
    {
        $this->db->where($w);
        return $this->db->get($t);
    }
    public function getDataW3($t,$w,$w1,$w2)
    {
        $this->db->where($w);
        $this->db->or_where($w1);
        $this->db->or_where($w2);
        return $this->db->get($t);
    }
    public function getDataW7($t,$w,$w1,$w2,$w3,$w4,$w5,$w6)
    {
        $this->db->where($w);
        $this->db->or_where($w1);
        $this->db->or_where($w2);
        $this->db->or_where($w3);
        $this->db->or_where($w4);
        $this->db->or_where($w5);
        $this->db->or_where($w6);
        return $this->db->get($t);
    }
    public function gl($t,$o)
    {
        $this->db->order_by($o, 'desc');
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
    public function count($a, $i, $t)
    {
        if($a == null){
            return $this->db->query("SELECT COUNT($i) as a FROM $t ");
        }else{
            return $this->db->query("SELECT COUNT($i) as a FROM $t WHERE MONTH($a) = MONTH(now()) and YEAR($a) = YEAR(now())");
        }
    }
    public function Filter($a, $i, $t)
    {
        return $this->db->query("SELECT * FROM $t WHERE MONTH($a) = MONTH('$i') and YEAR($a) = YEAR('$i')");
    }
    public function FilterS($a,$t)
    {
        return $this->db->query("SELECT * FROM $t WHERE status = $a ");
    }

}

/* End of file Model.php */

?>