<?php
require("error_report.php");

class Groups{
    public $groups = [];

    public $ids=[];
    public $group_ids=[];

    public $collect_ids=[];

    public function __construct(){
        $url = "../assets/groups.json";
        $json = file_get_contents($url);
        $objs = json_decode($json);

        if(is_array($objs)) {
            foreach($objs as $obj) {
                $this->groups[] = $obj;

                //arrays of ids and group_id indexes
                $this->ids[]= $obj->id;
                if (isset($obj->group_id)){
                    $this->group_ids[]= $obj->group_id;
                }
                else{
                    $this->group_ids[]= "none";
                }
            }
        }
    }


    public function getIDs(): array
    {
        return $this->ids;
    }
    public function getGroupIDs(): array
    {
        return $this->group_ids;
    }
    //set all the group ids
    public function setGroupIds(int $start, array $ids, array $group_ids){
        //echo $start."<br>";
        $this->collect_ids[]=$start;
        $index = array_search($start, $ids);//23
        //echo $group_ids[$index]."<br>";//25
        $this->collect_ids[]=$group_ids[$index];
        $index2 = array_search($group_ids[$index], $ids);//21
        //echo $group_ids[$index2]."<br>";//20
        $this->collect_ids[]=$group_ids[$index2];
        $index3 = array_search($group_ids[$index2], $ids);//47
        //echo $group_ids[$index3]."<br>";//none
        $this->collect_ids[]=$group_ids[$index3];
        //remove empty ids ("none")
        foreach (array_keys($this->collect_ids, 'none') as $key) {
            unset($this->collect_ids[$key]);
        }

        //echo implode(",",$this->collect_ids);
        return $this->collect_ids;
    }
}

