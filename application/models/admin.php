<?
class Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
        //получаем все статьи для редактирования
    public function all_cont()
    {
        $query=$this->db->get('state');
        return $query->result_array();
    }
    public function edit($id){
        //если форма отправлена записываем все по переменным
        if(isset($_POST['submit'])){
            $content=$_POST['content'];
            $title=$_POST['title'];
            $short=$_POST['short'];
            $this->db->where('id', $id);
            //обновляем запись в базе
            $this->db->update('state', array('title'=>$title,'full_text'=>$content,'short_text'=>$short));
            //ищем в контенте все теги с изображениями
            preg_match_all('/src="([^"]+)"/', $content, $images);
            echo "Запись обновлена<br>";
            //достаем ссылки на изображения
            if($images[1]==true){
                $last_id=$id;
                //если папка для изображений не создана,то создаем ее
                if(!file_exists($_SERVER['DOCUMENT_ROOT']."/css/pic/".$last_id)) {
                    mkdir($_SERVER['DOCUMENT_ROOT'] . "/css/pic/" . $last_id . "", 0777);
                }
                //прогоняем массив со ссылками и копируем все в папку для статей
                $url=array();
                foreach ($images[1] as $k) {
                    //получаем контент по ссылкам
                    $s="";
                    $s=file_get_contents($k);
                    //вытаскиваем название изображения
                    $name=basename($k);
                    //пишем в массив ссылку на изобаражения
                    $url[]='src="/css/pic/'.$last_id."/".$name.'"';
                    //записываемизображения в папку со статьями
                    if(!file_exists('src="/css/pic/'.$last_id."/".$name.'"')) {
                        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/css/pic/" . $last_id . "/" . $name, $s);
                        chmod($_SERVER['DOCUMENT_ROOT'] . "/css/pic/" . $last_id . "/" . $name, 0777);
                    }
                }
                //прогоняем массив ссылок
                foreach($url as $item) {
                    preg_replace('/(src)=("|\')[^"\']+(")/',$item, $content);
                }
                //обновляем статью вбазе с новыми ссылками
                $this->db->where('id', $last_id);
                $this->db->update('state',array('full_text'=>$content));
                echo "Изображения добавлены";
                //header('Location:'.site_url()."/adminka/edit_content/$last_id");
        }
        }else {
            $query=$this->db->get_where('state',array('id'=>$id));
            return $query->result_array();
        }
    }
    public function add()
    {
        $theme = $_POST['theme'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $short = $_POST['short'];
        $this->db->insert('state', array('theme' => $theme, 'title' => $title, 'full_text' => $content, 'short_text' => $short));
        //ищем теги <img>
        preg_match_all('/src="([^"]+)"/', $content, $images);
        echo "Запись обновлена<br>";
        //достаем ссылки на изображения
        if ($images[1] == true) {
            $last_id = $this->db->insert_id();
            //проверяем существование папки и создаем ее если нету
            if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/css/pic/" . $last_id)) {
                mkdir($_SERVER['DOCUMENT_ROOT'] . "/css/pic/" . $last_id . "", 0777);
            }
                $url=array();
            foreach ($images[1] as $k) {
                //получаем контент по ссылкам
                $s=file_get_contents($k);
                //вытаскиваем название изображения
                $name=basename($k);
                //пишем в массив <img> на изобаражения
                $url[]='src="/css/pic/'.$last_id."/".$name.'"';
                //записываемизображения в папку со статьми
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/css/pic/".$last_id."/".$name,$s);
                chmod($_SERVER['DOCUMENT_ROOT'] . "/css/pic/" . $last_id . "/".$name, 0777);
            }
            //прогоняем массив ссылок
            foreach($url as $item) {
                preg_replace('/(src)=("|\')[^"\']+(")/',$item, $content);
            }
            //обновляем статью вбазе с новыми ссылками
            $this->db->where('id', $last_id);
            $this->db->update('state',array('full_text'=>$content));
        }
    }
    public function del($id){
        // удаляем статью по id
        $this->db->delete('state', array('id' => $id));
        $dir=$_SERVER['DOCUMENT_ROOT']."/css/pic/".$id;
        //удаляет каталог и файлы в нем
        if ($objs = glob($dir."/*")) {
            foreach($objs as $obj) {
                is_dir($obj) ? removeDirectory($obj) : unlink($obj);
            }
        }
        if(file_exists($dir)) {
            rmdir($dir);
        }
        $this->db->delete('state', array('id' => $id));
    }



}