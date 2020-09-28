<?php

class  FileExport
{

    function Excelaktar($tablobasligi, array $enaltsatir = NULL, $columns = array(), $data = array(),$extension)

    {
        $filename = date("d.m.Y");
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-disposition: attachment; filename=' . $filename . '.'.$extension.'');
        echo "\xEF\xBB\xBF"; // bom

        // sonra ihtiyacımzı olabilir
        $sayim = count($columns);

        echo '<table border="1"><th style="background-color:#01AEBC;" colspan="' . $sayim . '">
	<font color="#FDFDFD">' . $tablobasligi . '</font></th>
	<tr>';
        // BAŞLIKLARIMI OLUŞTURUYORUM
        foreach ($columns as $veri):

            echo '<td style="background-color:#C3BFB8">' . trim($veri) . "</td>";

        endforeach;

        echo '</tr>';


        //VERİLERİMİ OLUŞTURUYORUM
        foreach ($data as $val):
            echo '<tr>';

            for ($i = 0; $i < $sayim; $i++):
                echo '<td>' . $val[$i] . "</td>";
            endfor;

            echo '</tr>';
        endforeach;

        if ($enaltsatir != NULL):
            echo '<tr>';
            foreach ($enaltsatir as $veri):
                echo '<td style="background-color:#ddb446">' . trim($veri) . "</td>";
            endforeach;
            echo '</tr>';
        endif;


        echo '</table>';
    }





    function TxtCreate($contents)
    {
        $filename = date("d.m.Y");
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-disposition: attachment; filename=' . $filename . '.txt');
        echo "\xEF\xBB\xBF"; // bom

        foreach ($contents as $value):
            echo "Adı: " . $value["firstname"] . " Soyadı: " . $value["lastname"] . " E-Posta: " . $value["email"] . " Telefon: " . $value["phone"] . " Mesleği: " . $value["job_title"] . "\r\n";

        endforeach;

    }

    function SqlBackupDownload($contents)
    {
        $filename = date("d.m.Y");
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-disposition: attachment; filename=' . $filename . '.sql');
        echo "\xEF\xBB\xBF"; // bom

          echo $contents;


    }


}


?>