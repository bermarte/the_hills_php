<?php

class Posts
{
    public $messages = [];

    public function __construct()
    {
        $url = "../data/guestbook.json";
        $json = file_get_contents($url);
        $objs = json_decode($json);

        if (is_array($objs)) {
            foreach ($objs as $obj) {
                $this->messages[] = $obj;
            }
        }
    }
}