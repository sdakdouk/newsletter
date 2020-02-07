<?php


class Connecion
{

    private $conexion;
    private $bulk;

    public function __construct()
    {
        $this->conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $this->bulk = new MongoDB\Driver\BulkWrite;
    }
    public static function getInstance()
    {
        return new Connecion();
    }

    public function insertNews(News $news)
    {

        $bulk = new MongoDB\Driver\BulkWrite;
        $arr = array(
            'title' => $news->getTitle(),
            'text' => $news->getText(),
            'type' => $news->getType()
        );
        $bulk->insert($arr);
        $this->conexion->executeBulkWrite('news.new', $bulk);
    }

    public static function allNews()
    {

        try {
            $conexion = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            $query = new MongoDB\Driver\Query([], []);
            $rows = $conexion->executeQuery("news.new", $query);
            $arr = [];
            foreach ($rows as $row) {
                $new = new News($row->title, $row->text, $row->type,  $row->_id);
                array_push($arr, $new);
            }
            $l = new AllNews($arr);
            return $arr;
        } catch (MongoDB\Driver\Exception\Exception $e) {

            $filename = basename(__FILE__);

            echo "The $filename script has experienced an error.\n";
            echo "It failed with the following exception:\n";

            echo "Exception:", $e->getMessage(), "\n";
            echo "In file:", $e->getFile(), "\n";
            echo "On line:", $e->getLine(), "\n";
        }
    }



}