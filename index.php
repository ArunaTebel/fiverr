<?php
require 'database_manager.php';
$countryList = getCountryList();
$fieldList = getFieldList();
$provinceList = getProvinceList();
//$a = getProvinceListFromCountryId("15");
//var_dump($a);die;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Freshfutures - University Recommendation</title>
        <!-- Compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/custom.css">

        <!--JavaScript -->
        <script src="js/jquery-2.1.3.min.js"></script>
        <!--JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <!--Result Table JavaScript -->
        <script src="js/result_table.js"></script>
        <!--Result Table JavaScript -->
        <script src="js/custom.js"></script>

        <!--Font Styles-->
        <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <form class="form-horizontal">
            <fieldset>
                <div class="form-container">
                    <h3 class="form-heading">
                        Student Feedback Form
                    </h3>
                    <div class="form-left">
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="country_select">Country</label>
                            <div class="col-md-6">
                                <select id="country_select" name="country_select" class="form-control">
                                    <?php foreach ($countryList as $country) { ?>
                                        <option value="<?php echo strtolower($country['country_id']); ?>"><?php echo $country['country_name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="field_select">Field/Faculty</label>
                            <div class="col-md-6">
                                <select id="field_select" name="field_select" class="form-control">
                                    <?php foreach ($fieldList as $field) { ?>
                                        <option value="<?php echo strtolower($field['field_id']); ?>"><?php echo $field['field_name']; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="province_select">Province</label>
                            <div class="col-md-6">
                                <select id="province_select" name="province_select" class="form-control">
                                    <!--                                    <option value="western">Western</option>
                                                                        <option value="southern">Southern</option>
                                                                        <option value="eastern">Eastern</option>-->
                                </select>
                            </div>
                        </div>

                        <!-- Appended Input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="gaokao_score">GAOKAO Score</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input id="gaokao_score" name="gaokao_score" class="form-control" placeholder="0" type="text">
                                    <span class="input-group-addon">/ 750</span>
                                </div>

                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="budget_input">Estimated budget per year</label>  
                            <div class="col-md-4">
                                <input id="budget_input" name="budget_input" type="text" placeholder="0" class="form-control input-md">
                                <span class="help-block">* in Australian Dollars</span>  
                            </div>
                        </div>

                        <!-- Button Drop Down -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="pref_location_dropdown">Preferred Location</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="pref_location_dropdown" name="pref_location_dropdown" class="form-control" placeholder="" type="text">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            - Select Location - 
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="#">Sydney</a></li>
                                            <li><a href="#">Melbourne</a></li>
                                            <li><a href="#">Darwin</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="worl_rank_radios">Select preferred university rank</label>
                            <div class="col-md-4"> 
                                <label class="radio-inline" for="worl_rank_radios-0">
                                    <input type="radio" name="worl_rank_radios" id="worl_rank_radios-0" value="1" checked="checked">
                                    Top 10
                                </label> 
                                <label class="radio-inline" for="worl_rank_radios-1">
                                    <input type="radio" name="worl_rank_radios" id="worl_rank_radios-1" value="2">
                                    Top 50
                                </label> 
                                <label class="radio-inline" for="worl_rank_radios-2">
                                    <input type="radio" name="worl_rank_radios" id="worl_rank_radios-2" value="3">
                                    Top 100
                                </label>
                            </div>
                        </div>
                        <!--</fieldset>-->
                        <!--</form>-->
                    </div>
                    <div class="form-right">
                        <!--                <form class="form-horizontal">
                                            <fieldset>-->
                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ielts_reading">IELTS Scores</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Reading</span>
                                    <input id="ielts_reading" name="ielts_reading" class="form-control" placeholder="0.0" type="text">
                                </div>

                            </div>
                        </div>

                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ielts_writing"></label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Writing</span>
                                    <input id="ielts_writing" name="ielts_writing" class="form-control" placeholder="0.0" type="text">
                                </div>

                            </div>
                        </div>

                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ielts_speaking"></label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Speaking</span>
                                    <input id="ielts_speaking" name="ielts_speaking" class="form-control" placeholder="0.0" type="text">
                                </div>

                            </div>
                        </div>

                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ielts_listening"></label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Listening</span>
                                    <input id="ielts_listening" name="ielts_listening" class="form-control" placeholder="0.0" type="text">
                                </div>

                            </div>
                        </div>

                        <!-- Prepended text-->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ielts_total"></label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">Total</span>
                                    <input id="ielts_total" name="ielts_total" class="form-control" placeholder="0.0" type="text">
                                </div>

                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="comments_text">Additional Comments</label>
                            <div class="col-md-6">                     
                                <textarea class="form-control" id="comments_text" name="comments_text">Write something here...</textarea>
                            </div>
                        </div>

                        <!--Submit Button-->
                        <input type="submit" value="Submit!" class="btn btn-primary btn-lg submit-btn"/>
                        
                    </div>
                </div>
            </fieldset>
        </form>

        <!--Results Table-->
        <div class="table-container">
            <h3 class="table-heading">Here are the suggested Universities matching your criteria</h3>
            <div class="row">
                <div class="panel panel-primary filterable">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users</h3>
                        <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th><input type="text" class="form-control" placeholder="#" disabled></th>
                                <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </body>
</html>
