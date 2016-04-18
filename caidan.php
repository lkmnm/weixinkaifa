<?php
include("token.php");
$post='
{
    "button":[

    { 

        "type":"click",
 
        "name":"今日歌曲",

        "key":"V1001_TODAY_MUSIC"

    },

    {

        "type":"click",

        "name":"歌手简介",

        "key":"V1001_TODAY_SINGER"

    },

    {

        "name":"菜单",

        "sub_button":[

        { 

            "type":"view",

            "name":"搜索",

            "url":"http://www.soso.com/"

        },

        {

            "type":"view",

            "name":"视频",

            "url":"http://v.qq.com/"

        },

        {

            "type":"click",

            "name":"赞一下我们",

            "key":"V1001_GOOD"

       }]

    }]

}'//创建菜单
$url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$token}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);//url
curl_setopt($ch, CURLOPT_POST, 1);//post
curl_setopt($ch, CURLOPT_POSTFIELD, $post);//post
curl_exec($ch);
curl_close($ch);
?>