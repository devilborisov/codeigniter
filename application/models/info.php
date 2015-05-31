<?php
class Info extends CI_Model{
    public function __construct()
    {
        parent::__construct();
        //подгружаем базу данных
        $this->load->database();
    }

    /**
     * @param $theme передаем название темы(напр. PHP)и получаем все статьи
     */
    public function get_state($theme){
        $query=$this->db->get_where('state',array('theme'=>$theme));
        return $query->result_array();
    }

    /**
     * @param $id передаем id и получаем всю инфу по конкретной статье
     */
    public function get_full($id){
        $query=$this->db->get_where('state',array('id'=>$id));
        return $query->result_array();
    }

    /**
     * получаем последние 5 добавленных статей
     */
    public function get_all(){
        $sql=("Select * From state ORDER BY id DESC LIMIT 0,10 ");
        $query=$this->db->query($sql);
        return $query->result_array();
    }
}