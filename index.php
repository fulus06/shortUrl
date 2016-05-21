<?php
echo shortUrl("https://www.baidu.com/");
/*
 * 功能： 生成百度短链接
 **************************************************************
 * author:chiefyang
         * date:2016/5/19
 */

function shortUrl($Url){
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,"http://dwz.cn/create.php");
    curl_setopt($ch,CURLOPT_POST,true);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $data=array('url'=>$Url);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    $strRes=curl_exec($ch);
    curl_close($ch);
    $arrResponse=json_decode($strRes,true);

    if($arrResponse['status']==0){
        return $arrResponse['tinyurl'];
    }else{
        //失败
        return false;
    }
}

?>
