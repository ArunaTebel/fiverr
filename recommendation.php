<?php

$GLOBALS['gaokao_max'] = $_POST['gaokao_max'];

getPostData();

function getPostData() {
    $country_id = $_POST["country_select"];
    $feild_id = $_POST["field_select"];
    $province_id = $_POST["province_select"];
    if (isset($_POST["gaokao_score"])) {
        $gaokao_score = $_POST["gaokao_score"];
    }else{
        $gaokao_score = 0;
    }
    $budget = $_POST["budget_input"];
    $location = $_POST["pref_location_dropdown"];
    $university_rank = $_POST["worl_rank_radios"];
    $ielts_overall = $_POST["ielts_total"];
    $ielts_reading = $_POST["ielts_reading"];
    $ielts_writing = $_POST["ielts_writing"];
    $ielts_speaking = $_POST["ielts_speaking"];
    $ielts_listening = $_POST["ielts_listening"];
    $comments = $_POST['comments_text'];
    
    validateData($gaokao_score, $budget, $ielts_overall, $ielts_listening, $ielts_reading, $ielts_speaking, $ielts_writing);
    
//    echo "Country Id : " . $country_id . "<br>";
//    echo "Field Id : " . $feild_id . "</br>";
//    echo "Province Id : " . $province_id . "</br>";
//    echo "Gaokao Score : " . $gaokao_score . "</br>";
//    echo "Budget : " . $budget . "</br>";
//    echo "Location : " . $location . "</br>";
//    echo "Uni Rank : " . $university_rank . "</br>";
//    echo "IELTS Overall : " . $ielts_overall . "</br>";
//    echo "IELTS Reading : " . $ielts_reading . "</br>";
//    echo "IELTS Writing : " . $ielts_writing . "</br>";
//    echo "IELTS Listening : " . $ielts_listening . "</br>";
//    echo "IELTS Speaking : " . $ielts_speaking . "</br>";
//    echo "Comments : " . $comments;
}

function validateData($gaokao_score, $budget, $ielts_overall, $ielts_listening, $ielts_reading, $ielts_speaking, $ielts_writing) {
    if ($gaokao_score < 0) {
        echo "GAOKAO Score cannot be negative!";
        die;
    } else if ($gaokao_score > $GLOBALS['gaokao_max']) {
        echo "GAOKAO Score cannot exceed the maximum value applicable to the province you have selected!";
        die;
    }
    if (is_numeric($budget)) {
        if ($budget < 0) {
            echo "Budget value cannot be negative!";
            die;
        }
    } else {
        echo "Please enter a valid numeric value for the budget!";
        die;
    }
    if (is_numeric($ielts_overall)) {
        if ($ielts_overall < 0) {
            echo "IELTS Overall score cannot be negative!";
            die;
        }
    } else {
        echo "Please enter a valid numeric value for the IELTS Overall Score!";
        die;
    }
    if (is_numeric($ielts_listening)) {
        if ($ielts_listening < 0) {
            echo "IELTS Listening score cannot be negative!";
            die;
        } else if ($ielts_listening > 9) {
            echo "IELTS Listening score cannot exceed 9!";
            die;
        }
    } else {
        echo "Please enter a valid numeric value for the IELTS Listening Score!";
        die;
    }

    if (is_numeric($ielts_reading)) {
        if ($ielts_reading < 0) {
            echo "IELTS Reading score cannot be negative!";
            die;
        } else if ($ielts_reading > 9) {
            echo "IELTS Reading score cannot exceed 9!";
            die;
        }
    } else {
        echo "Please enter a valid numeric value for the IELTS Reading Score!";
        die;
    }

    if (is_numeric($ielts_speaking)) {
        if ($ielts_speaking < 0) {
            echo "IELTS Speaking score cannot be negative!";
            die;
        } else if ($ielts_speaking > 9) {
            echo "IELTS Speaking score cannot exceed 9!";
            die;
        }
    } else {
        echo "Please enter a valid numeric value for the IELTS Speaking Score!";
        die;
    }

    if (is_numeric($ielts_writing)) {
        if ($ielts_writing < 0) {
            echo "IELTS Writing score cannot be negative!";
            die;
        } else if ($ielts_writing > 9) {
            echo "IELTS Writing score cannot exceed 9!";
            die;
        }
    } else {
        echo "Please enter a valid numeric value for the IELTS Writing Score!";
        die;
    }
}
