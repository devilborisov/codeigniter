<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('registration');
    }
    //загрузка формы для входа в админку
    public function index()
    {
        $this->load->view('admin/login');
    }
    //проверка отправленных данных
    public function valid()
    {
        if (isset($_POST['submit'])) {
            $this->registration->valid_data();
        }
    }
    //выход из сессии и очистка массива session и переход на главную страницу сайта
        public function exit_session(){
            session_start();
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            session_destroy();
            header('Location:'.site_url());
        }

}