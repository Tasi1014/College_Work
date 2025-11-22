<?php
class Counter{
    //static property : tracks a count across all instances

    public static $count=0;
    public function __construct(){
        self:: $count++; 
    }
    public static function getCount(){
        return self:: $count;
    }
}

new Counter();
new Counter();
new Counter();

echo "Total objects created: ".Counter::getCount();
?>