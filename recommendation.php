<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$country_id=$_POST["country_select"];
$feild_id=$_POST["field_select"];
$province_id=$_POST["province_select"];
$gaokao_score=$_POST["gaokao_score"];
$budget=$_POST["budget_input"];
$location=$_POST["pref_location_dropdown"];
$university_rank=$_POST["worl_rank_radios"];
$ielts_overall=$_POST["ielts_total"];
$ielts_reading=$_POST["ielts_reading"];
$ielts_writing=$_POST["ielts_writing"];
$ielts_speaking=$_POST["ielts_speaking"];
$ielts_listening=$_POST["ielts_listening"];
echo $country_id."<br>".$feild_id."</br>".$province_id."</br>".$gaokao_score."</br>".$budget."</br>".$location."</br>".$university_rank."</br>".$ielts_overall."</br>";
echo $ielts_reading."</br>".$ielts_writing."</br>".$ielts_listening."</br>".$ielts_speaking."</br>";
require 'database_manager.php';
$max_score_array= getMaxGaokao($province);
foreach ($max_score_array as $max){
    echo $max;
    if($gaokao_score > $max){
    echo 'above the allowed value';
  }else{
     
  }
}


