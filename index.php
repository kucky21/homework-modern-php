<?php

class logSort{
//made by Lukáš Gregor 04.07.2020 version 1 - procedural
//made by Lukáš Gregor 14.07.2020 version 2 - OOP, type hint, iterables
//made by Lukáš Gregor 15.07.2020 version 3 - anonymous function 

    public function saveLog(iterable $iterable){
        //load log file
        $read=file_get_contents("example.log", TRUE);
        $rows= explode(PHP_EOL, $read);
            //loop through the file
            foreach($rows as $line){
                if(preg_match("/test\.(\w+)/", $line, $matches)){
                    $message=strtolower($matches[1]);
                    //looking for exceptions
                if($message != "debug"){
                    //adding matches into the list
                    if(array_key_exists($message, $iterable)){
                        $iterable[$message]++;
                    }else{
                        $iterable["others"]++;
                }
            }
        }
    }
    return $iterable;      
}
    public function storeList(){
        //list to store matches
        return $list=[ "error"=>0,"warning"=>0, "notice"=>0, "info"=>0, "emergency"=>0, "alert"=>0, "others"=>0,];
    }
}
$a= $c= new logSort();
$b= $a->storeList();
$d= $c->saveLog($b);

//anonymous function to print out results
call_user_func(function() use ($d){
    foreach($d as $log => $count){
        echo "$log : $count". PHP_EOL;
        echo "<br>";
    }
});

?>



