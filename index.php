<?php
//made by Lukáš Gregor 04.07.2020 version 1 
$totals = array(
    "error"=>0,
    "warning"=>0,
    "notice"=>0,
    "info"=>0,
    "emergency"=>0,
    "alert"=>0,
    "others"=>0,
);

$file=file_get_contents("example.log", TRUE);
$rows= explode(PHP_EOL, $file);
//foreach cycle to extract words from log
foreach ($rows as $line) {
    if(preg_match("/test\.(\w+)/", $line, $matches)){
        $message=strtolower($matches[1]);
       //checking conditions of input and writing data into "totals" array
       if($message != "debug"){
          if(array_key_exists($message, $totals)){
              $totals[$message]++;
          }else{
              $totals["others"]++;
          }
       }
    }
}
//finall printing
arsort($totals);
foreach ($totals as $message => $number) {
   echo "$message: $number" . PHP_EOL; 
   echo "<br>";
}
?>

<script>
//reloading page using javascript (10sec)
setTimeout(function(){
    window.location.reload(1);
}, 10000);
</script>
