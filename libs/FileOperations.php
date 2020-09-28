<?php


class FileOperations extends Controller
{

    public $oku, $sorgu, $sonuc, $verileritut, $gecici, $resimvarmi = false;

    public $error = array(), $nodevalue = array(), $nodename = array(), $verilerdizi = array(), $sutunlardizi = array();


    function __construct()
    {
        parent::UploadLibrary(array("Form"));
        $this->oku = new DOMDocument();
        $this->oku->preserveWhiteSpace = false;


    }

    function VerileriAyikla($name, $yol, array $elementler)
    {

        if ($this->oku->load($_FILES[$name]["tmp_name"])):


            $this->sorgu = new DOMXPath($this->oku);


            $this->sonuc = $this->sorgu->query($yol);

            if ($this->sonuc->length != 0):


                for ($a = 0; $a < $this->sonuc->length; $a++):


                    foreach ($elementler as $deger):
                        $desen = "/[*]+/";
                        $hamhali = preg_replace($desen, "", $deger, -1, $sayi);

                        if ($sayi > 0):
                            if ($hamhali == "password"):
                                @$this->gecici .= "'" . $this->Form->encoding($this->oku->getElementsByTagName($hamhali)->item($a)->nodeValue) . "',";

                            else:
                                @$this->gecici .= "'" . $this->oku->getElementsByTagName($hamhali)->item($a)->nodeValue . "',";
                            endif;


                        else:
                            @$this->gecici .= $this->oku->getElementsByTagName($deger)->item($a)->nodeValue . ",";

                        endif;


                    endforeach;

                    $this->gecici = rtrim($this->gecici, ",");

                    @$this->verileritut .= "(" . $this->gecici . "),";
                    @$this->gecici = "";
                    /*
                    @$this->verileritut.="(
                    ".$this->oku->getElementsByTagName("ana_kat_id")->item($a)->nodeValue.",
                    ".$this->oku->getElementsByTagName("cocuk_kat_id")->item($a)->nodeValue.",
                    ".$this->oku->getElementsByTagName("katid")->item($a)->nodeValue.",
                    '".$this->oku->getElementsByTagName("urunad")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("res1")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("res2")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("res3")->item($a)->nodeValue."',
                    ".$this->oku->getElementsByTagName("durum")->item($a)->nodeValue.",
                    '".$this->oku->getElementsByTagName("aciklama")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("kumas")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("urtYeri")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("renk")->item($a)->nodeValue."',
                    ".$this->oku->getElementsByTagName("fiyat")->item($a)->nodeValue.",
                    ".$this->oku->getElementsByTagName("stok")->item($a)->nodeValue.",
                    '".$this->oku->getElementsByTagName("ozellik")->item($a)->nodeValue."',
                    '".$this->oku->getElementsByTagName("ekstraBilgi")->item($a)->nodeValue."'
                    ),";*/

                endfor;

                $this->verileritut = rtrim($this->verileritut, ",");

                return $this->verileritut;

            else:

                $this->error[] = "Sorgu hatası, elemanlara ulaşılamadı";
            endif;


        else:
            $this->error[] = "Yüklenen dosya açılamadı";
        endif;


    } // XML veri ayıklama

    function JsonVerileriAyikla($name)
    {

        $veriler = json_decode(file_get_contents($_FILES[$name]["tmp_name"]), true);

        if (json_last_error() == JSON_ERROR_NONE):

            foreach ($veriler as $value) :

                $keys = array_keys($value);
                foreach ($keys as $key) :

                    $desen = "/[*]+/";
                    $hamhali = preg_replace($desen, "", $key, -1, $sayi);

                    if ($sayi > 0):
                        if ($hamhali == "password"):
                            @$this->gecici .= "'" . $this->Form->encoding($value[$key]) . "',";
                        else:
                            @$this->gecici .= "'" . $value[$key] . "',";
                        endif;
                    else:
                        @$this->gecici .= $value[$key] . ",";

                    endif;


                endforeach;
                $this->gecici = rtrim($this->gecici, ",");

                @$this->verileritut .= "(" . $this->gecici . "),";
                @$this->gecici = "";

            endforeach;


            $this->verileritut = rtrim($this->verileritut, ",");

            return $this->verileritut;
        else:
            $this->error[] = "Yüklenene Dosya Açılamadı!";

        endif;


    }     // json dosya veri ayıklama

    function TopluGuncellemeXml($name, $yol)
    {

        if ($this->oku->load($_FILES[$name]["tmp_name"])):


            $this->sorgu = new DOMXPath($this->oku);


            $this->sonuc = $this->sorgu->query($yol);

            if ($this->sonuc->length != 0):


                foreach ($this->sonuc as $element):

                    foreach ($element->childNodes as $node):
                        if($node->nodeName == "password"):
                            $this->nodevalue[]= $this->Form->encoding($node->nodeValue);
                        else:
                            $this->nodevalue[] = $node->nodeValue;
                        endif;


                        $this->nodename[] = $node->nodeName;



                    endforeach;


                    $this->verilerdizi[] = $this->nodevalue;
                    $this->sutunlardizi[] = $this->nodename;

                    unset($this->nodevalue);
                    unset($this->nodename);


                endforeach;

            else:

                $this->error[] = "Sorgu hatası, elemanlara ulaşılamadı";
            endif;


        else:
            $this->error[] = "Yüklenen dosya açılamadı";
        endif;

    } // xml dosya veri ayıklama

    function TopluGuncellemeJson($name)
    {

        $veriler = json_decode(file_get_contents($_FILES[$name]["tmp_name"]), true);

        if (json_last_error() === JSON_ERROR_NONE):

            foreach ($veriler as $value) :

                $keys = array_keys($value);
                foreach ($keys as $key) :

                    if($key == "password"):
                        $this->nodevalue[]= $this->Form->encoding($value[$key]);
                    else:
                        $this->nodevalue[] = $value[$key];
                    endif;



                    $this->nodename[] = $key;


                endforeach;

                $this->verilerdizi[] = $this->nodevalue;
                $this->sutunlardizi[] = $this->nodename;

                unset($this->nodevalue);
                unset($this->nodename);

            endforeach;

        else:

            $this->error[] = "Yüklenen JSON dosyası açılamadı";

        endif;


    }     // json dosya veri ayıklama


    function TopluSilmeXml($name,$yol) {

        if ($this->oku->load($_FILES[$name]["tmp_name"])):


            $this->sorgu= new DOMXPath($this->oku);


            $this->sonuc= $this->sorgu->query($yol);

            if ($this->sonuc->length!=0):




                foreach ($this->sonuc as $element):

                    foreach ($element->childNodes as $node):


                        $this->verilerdizi[]=$node->nodeValue;


                    endforeach;


                endforeach;


                return join (",",$this->verilerdizi);


            else:

                $this->error[]="Sorgu hatası, elemanlara ulaşılamadı";
            endif;



        else:
            $this->error[]="Yüklenen dosya açılamadı";
        endif;

    } // XML TOPLU VERİ SİLME

    function TopluSilmeJson($name) {

        $veriler=json_decode(file_get_contents($_FILES[$name]["tmp_name"]),true);

        if (json_last_error()===JSON_ERROR_NONE):

            foreach ($veriler as $value) :

                $keys=array_keys($value);
                foreach ($keys as $key) :

                    $this->verilerdizi[]=$value[$key];

                endforeach;


            endforeach;

            return join (",",$this->verilerdizi);

        else:

            $this->error[]="Yüklenen JSON dosyası açılamadı";

        endif;




    } // JSON TOPLU VERİ SİLME



}