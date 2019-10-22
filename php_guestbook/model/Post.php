<?php

class Post{
    private $name;
    private $title;
    private $message;
    private $date;

    public function __construct($_name, $_title, $_message, $_date)
    {
        $this->name = $_name;
        $this->title = $_title;
        $this->message = $_message;
        $this->date = $_date;
    }


    public function getPostName()
    {
        return $this->name;
    }


    public function getPostTitle()
    {
        return $this->title;
    }


    public function getPostMessage()
    {
        return $this->message;
    }


    public function getPostDate()
    {
        return $this->date;
    }

    public function writeJson($_name, $_title, $_message, $_date){

            $JsonArray = array(
                'name' => $_name,
                'title' => $_title,
                'content' => $_message,
                'date' => $_date,
            );

        //open or read json data
        $data_results = file_get_contents('../data/guestbook.json');
        $tempArray = json_decode($data_results);

        //append additional json to json file
        $tempArray[] = $JsonArray ;
        $jsonData = json_encode($tempArray);

        file_put_contents('../data/guestbook.json', $jsonData);
    }


}