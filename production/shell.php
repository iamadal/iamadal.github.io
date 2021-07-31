<?php

 $file = 'fib.c';
 $command = 'views\\compiler\\tcc ' . $file . '-o test.exe';
 exec($command,$result,$args);

 print_r($result);
 print_r($args);


?>