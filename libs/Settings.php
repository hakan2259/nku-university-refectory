<?php

/*

BURADA SİTENİN TÜM AYARLARINI KONTROL EDECEĞİZ

*/

class  Settings extends Model
{

    public $result, $result2,
        $refectory_places,
        $menu,
        $title,
        $front_logo,
        $banner,
        $video_link,
        $footer_img,
        $footer_logo,
        $description,
        $keywords,
        $icon, $address, $email, $phone, $fax, $facebook_url, $twitter_url, $ios_url, $android_url, $instagram_url, $youtube_url;

    function __construct()
    {

        parent::__construct();

        $this->result = $this->db->listele("settings");
        $this->result2 = $this->db->listele("contact");


        ///Reservation
        $this->refectory_places = $this->db->listele("refectory_places", "where status=1");
        $this->menu = $this->db->listele("menu", "ORDER BY menu_date");

        ///Reservation
        ///
        $this->title = $this->result[0]["title"];
        $this->front_logo = $this->result[0]["front_logo"];
        $this->banner = $this->result[0]["banner"];
        $this->video_link = $this->result[0]["video_link"];
        $this->footer_img = $this->result[0]["footer_img"];
        $this->footer_logo = $this->result[0]["footer_logo"];
        $this->description = $this->result[0]["description"];
        $this->keywords = $this->result[0]["keywords"];
        $this->icon = $this->result[0]["icon"];


        //contact
        $this->address = $this->result2[0]["address"];
        $this->email = $this->result2[0]["email"];
        $this->phone = $this->result2[0]["phone"];
        $this->fax = $this->result2[0]["fax"];
        $this->facebook_url = $this->result2[0]["facebook_url"];
        $this->twitter_url = $this->result2[0]["twitter_url"];
        $this->ios_url = $this->result2[0]["ios_url"];
        $this->android_url = $this->result2[0]["android_url"];
        $this->instagram_url = $this->result2[0]["instagram_url"];
        $this->youtube_url = $this->result2[0]["youtube_url"];

    }

    function MenuSelect($id)
    {
        return $this->db->listele("menu", "where id=" . $id);
    }





}
