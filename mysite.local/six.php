<?php
//$fd=fopen("hello.php","w") or dir("не удалось откыть файл");
//$str="Привет мир";
//fputs($fd,$str);
//fclose($fd);




$fd=fopen("hello.php","w+") or die("не удалось откыть файл");
$str="Привет мир";
fwrite($fd,$str);
fseek($fd,0);
fwrite($fd,'хрю');
fseek($fd,0, SEEK_SET);
fwrite($fd, $str);
fclose($fd);

if (!rename("hello.php","subdir/hello.php"))
    echo "Ошибка перемещение файла";
else echo "Все шик ))))";

if(copy("hello.php","subdir/hello.php"))

