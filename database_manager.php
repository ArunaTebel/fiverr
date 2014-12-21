<?php

function getConnectionToDb() {
    $server_name = "localhost";
    $user_name = "root";
    $password = "";
    $db_name = "freshfutures";

    return mysqli_connect($server_name, $user_name, $password, $db_name);
}

function getCountryList() {
    $connection = getConnectionToDb();
    $query = "SELECT country_name, country_id FROM countries";
    $countries = mysqli_query($connection, $query);
    $countryArray = array();
    while ($row = mysqli_fetch_assoc($countries)) {
        $countryArray[] = $row;
    }
    return $countryArray;
}

function getFieldList() {
    $connection = getConnectionToDb();
    $query = "SELECT field_name, field_id FROM field";
    $fields = mysqli_query($connection, $query);
    $countryArray = array();
    while ($row = mysqli_fetch_assoc($fields)) {
        $countryArray[] = $row;
    }
    return $countryArray;
}

function getProvinceList() {
    $connection = getConnectionToDb();
    $query = "SELECT province, province_id FROM province";
    $provinces = mysqli_query($connection, $query);
    $provinceArray = array();
    while ($row = mysqli_fetch_assoc($provinces)) {
        $provinceArray[] = $row;
    }
    return $provinceArray;
}

function getProvinceListFromCountryId($countryId) {
    $connection = getConnectionToDb();
    $query = "SELECT province, province_id FROM province WHERE country_id = " . $countryId;
    $provinces = mysqli_query($connection, $query);
    $provinceArray = array();
    while ($row = mysqli_fetch_assoc($provinces)) {
        $provinceArray[] = $row;
    }
    echo json_encode($provinceArray);
}

function getMaxGaokaoForProvinceId($province_id) {
    $connection = getConnectionToDb();
    $query = "SELECT max_goakao_score FROM province_gaokao WHERE province_id = " . $province_id;
    $max_gaokao = mysqli_query($connection, $query);
    $maxGaokaoScore = mysqli_fetch_assoc($max_gaokao)['max_goakao_score'];
    echo $maxGaokaoScore;
}

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case 'getProvinceListFromCountryId' : 
            $country_id = $_POST['country_id'];
            getProvinceListFromCountryId($country_id);
            break;
        case 'getMaxGaokaoForProvinceId':
            $province_id = $_POST['province_id'];
            getMaxGaokaoForProvinceId($province_id);
            break;
    }
}
