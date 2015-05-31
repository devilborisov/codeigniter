<?php
class Registration extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    public function valid_data()
    {
        //записываем пароль и логин в переменные
        $login = $_POST['login'];
        $password = $_POST['password'];
        //запрашиваем данные
        $query = $this->db->get_where('users', array('login' => $login));
        $res = $query->result_array();
        //если есть такой пользователь и пароль, то записываем их в сессию и переходим в админку иначе назад к форме логина
        if ($res == true) {
            foreach ($res as $row) {
                if($row['login']==$login&&$row['password']==$password){
                    session_start();
                    $_SESSION['login']=$row['login'];
                    $_SESSION['password']=$row['password'];
                    return header('Location:'.site_url().'/adminka/');

                }
            }
        }else return header('Location:'.site_url().'/login/');
    }
}