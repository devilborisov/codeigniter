<?php
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('info');
    }
    /**
     * загружаем отображение
     */
    public function index()
    {
$this->load->view('main');
    }
    /**
     * @param $theme передаем названия раздела со статьями
     * смотреть script.js с применением AJAX
     */
    public function content($theme)
    {
        //получаем все статьи категории из модели и передаем в javascript данные
        foreach ($this->info->get_state($theme) as $row) {
            echo "<div class='text'>
               <a class='linker' href='index.php/main/full_content/{$row['id']}' onclick='return false;'>{$row['title']}</a><br><br>";
            echo "<p>" . $row['short_text'] . "...</p><br></div>";
        }
    }

    public function full_content($id)
    {
        //получаем всю статью и передаем в javascript данные
        foreach ($this->info->get_full($id) as $row) {
            echo "<div class='full-cont'><p id='full-cont'>" . $row['title'] . "</p><br>";
            echo "<p id='full-cont2'>" . $row['full_text'] . "</p><br></div>";
        }
    }

    public function lenta()
    {   //получаем 5 статей из модели и передаем в javascript данные
        echo "<h4>Последние 10 статей</h4>";
        foreach ($this->info->get_all() as $row) {
            echo "<a class='linker' href='index.php/main/full_content/{$row['id']}' onclick='return false;'>{$row['title']}</a><br><br>";
        }
    }
}