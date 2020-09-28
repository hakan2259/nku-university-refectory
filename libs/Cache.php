<?php

class Cache
{
    public $file, $second, $type;

    function CacheControl($second2 = false)
    {
        include 'config/cache.php';
        $piece = explode("/", $_SERVER["REQUEST_URI"]);
        if (in_array(end($piece), $cacheNo)):
            $this->type = false;
        else:
            $this->type = true;
        endif;
        if ($this->type):
            if ($second2):
                $this->second = $second2;
            else:
                $this->second = $CacheTime["second"];
            endif;
            $this->file = CACHEPATH . md5($_SERVER['REQUEST_URI']) . ".html";

            if (file_exists($this->file) && (time() - $this->second < filemtime($this->file))):
                readfile($this->file);
                exit();

            endif;
            ob_start();
        endif;
    }

    function CacheCreate()
    {
        if ($this->type):
            $file = fopen($this->file, "w");
            fwrite($file, ob_get_contents());
            fclose($file);
            ob_end_flush();
        endif;
    }

}


?>