<?php


class CsrfToken
{


    function adminCodeCreate()
    {
    
        $adminToken = md5(sha1(base64_encode(gzdeflate(gzcompress(serialize(mt_rand(0, 999999999)))))));
        Session::set("adminToken",$adminToken);
        return $adminToken;
        

        


    }

    function userCodeCreate()
    {

        $userToken = md5(sha1(base64_encode(gzdeflate(gzcompress(serialize(mt_rand(0, 999999999)))))));
        Session::set("userToken",$userToken);
        return $userToken;

    }

}

