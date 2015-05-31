<?php
class Adminka extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //если вы авторизованы,то загружаем модель
        if(!empty($_SESSION['login'])&&!empty($_SESSION['password'])) {
            $this->load->model('admin');
        }else echo "вы не авторизованы";
    }
    public  function index(){
        //все статьи
           // $this->load->model('admin');
        if(!empty($_SESSION['login'])&&!empty($_SESSION['password'])) {
            $data['row'] = $this->admin->all_cont();
            $this->load->view('admin/adminka', $data);
        }

    }
    public function edit_content($id){
        //если форма отправлена обновляем статью иначе загружаем форму заново
        if(isset($_POST['submit'])){
            $this->admin->edit($id);
            $this->load->view('admin/edit',$data=null);
        }else {
            $data['row'] = $this->admin->edit($id);
            $this->load->view('admin/edit', $data);
        }
    }
    //если форма отправлена ,то добавляем статью в базу иначе загружаем заново форму
    public function add_content(){
        if(isset($_POST['submit'])){
            $this->admin->add();
        }
        $this->load->view('admin/add');
    }
    //удаляем статью
    public function del_content($id){
        $this->admin->del($id);
        $this->index();
    }
}
