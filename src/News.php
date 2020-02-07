<?php
class AllNews{
    private $list = [];

    public function __construct($list = [])
    {
        $this->list = $list;
    }
    public static function getInstance()
    {
        return new AllNews();
    }
    public static function listaEstudiantes()
    {
        return Connecion::allNews();
    }
    public function getList()
    {
        return $this->list;
    }
    public function setList($list)
    {
        $this->list= $list;
    }
}

class News
{
    private $id;
    private $title;
    private $text;
    private $type;


    /**
     * News constructor.
     * @param $title
     * @param $text
     * @param $type
     * @param $id
     */
    public function __construct($title="", $text="",$type="", $id="")
    {
        $this->title = $title;
        $this->text = $text;
        $this->type=$type;
        $this->id=$id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }


    public function allNews(){

    }
     public function createNews(){

       Connecion::getInstance()->insertNews($this);
     }


     /*

     public function type($type){
         $neews=[];
         $arr= Connecion::getInstance()->allNews();
         foreach ($arr as $r) {
             if($r->type==$type){
                 $new = new News($r->title, $r->text, $r->type);
                 array_push($neews, $new);
             }

         }
         $l = new AllNews($neews);
         return $l->getList();
     }*/
     public function downloadNews($type){
         header('Content-type: text/xml');
         header('Pragma: public');
         header('Cache-control: private');
         header('Expires: -1');
         header("Content-Disposition: attachment; filename=news.xml");
         header("Content-Description: File Transfer");


         echo "<?xml version='1.0' encoding='utf-8'?>";

         echo "<xml>";


         echo "<track>";
         echo "<path>song_path</path>";
         echo "<title>track_number - track_title</title>";
         echo "</track>";


         echo "</xml>";

         /*$lis = Connecion::getInstance()->allNews();
         foreach ($lis as $i){
             if ($type==0 && $i['type']==$type){
                 $xml=$i;
             }
         }
         return $xml;
      /*if ($type==0){

            ob_clean();
            $root = 'news.xml';
           $filew = fopen($root, "w");
            $txt="<?xml version='1.0' encoding='UTF-8'?>";
            $txt.="<root>"
                ."<new>".$_POST['title']."</new>"
                ."<br>"
                ."<body>".$_POST['text']."</body>"
                ."</root>";
          //  print_r($txt);

            fwrite($filew, $txt);

            fclose($filew);
          header('Content-Type: text/xml; charset=utf-8');
          header("Content-Description: File Transfer");
          header("Content-Disposition: attachment; filename=$root");
          header('Content-Transfer-Encoding: binary');
          readfile($root);
          Header('Content-type: text/xml');
          print($root->asXML());


      }else{
            echo "imprimo json";
        }*/

     }




}
?>