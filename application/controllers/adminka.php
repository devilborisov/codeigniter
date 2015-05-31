<?php
class Adminka extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        //���� �� ������������,�� ��������� ������
        if(!empty($_SESSION['login'])&&!empty($_SESSION['password'])) {
            $this->load->model('admin');
        }else echo "�� �� ������������";
    }
    public  function index(){
        //��� ������
           // $this->load->model('admin');
        if(!empty($_SESSION['login'])&&!empty($_SESSION['password'])) {
            $data['row'] = $this->admin->all_cont();
            $this->load->view('admin/adminka', $data);
        }

    }
    public function edit_content($id){
        //���� ����� ���������� ��������� ������ ����� ��������� ����� ������
        if(isset($_POST['submit'])){
            $this->admin->edit($id);
            $this->load->view('admin/edit',$data=null);
        }else {
            $data['row'] = $this->admin->edit($id);
            $this->load->view('admin/edit', $data);
        }
    }
    //���� ����� ���������� ,�� ��������� ������ � ���� ����� ��������� ������ �����
    public function add_content(){
        if(isset($_POST['submit'])){
            $this->admin->add();
        }
        $this->load->view('admin/add');
    }
    //������� ������
    public function del_content($id){
        $this->admin->del($id);
        $this->index();
    }
}
