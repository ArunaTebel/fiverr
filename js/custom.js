$(document).ready(function () {

    initProvinceDropdownForCountryId(1);        // Initialize the dropdown according to the country id '1', when the application starts
    function initProvinceDropdownForCountryId(countryId) {
        $.ajax({
            type: 'POST',
            url: "database_manager.php",
            dataType: 'json',
            data: {
                action: 'getProvinceListFromCountryId',
                country_id: countryId
            },
            success: function (data) {
                $(data).each(function ()
                {
                    var option = $('<option />');
                    option.attr('value', this.province_id).text(this.province);
                    $('#province_select').append(option);
                });
            },
            error: function () {
                //
            }
        });
    }
    function setMaxGaokaoForProvinceId(province_id) {
        $.ajax({
            type: 'POST',
            url: "database_manager.php",
            data: {
                action: 'getMaxGaokaoForProvinceId',
                province_id: province_id
            },
            success: function (data) {
                $("#gaokao_score").removeAttr("disabled");
                $("#gaokao_max").html("/ " + data + " (max score)");
            },
            error: function () {
                //
            }
        });
    }

    $("#country_select").change(function () {
        var country_id = $(this).val();
        $('#province_select').empty();
        initProvinceDropdownForCountryId(country_id);
        if (country_id == 45) {
            $("#gaokao_score").removeAttr("disabled");
        } else {
            $("#gaokao_score").attr("disabled", "disabled");
        }
    });

    $("#province_select").change(function () {
        var province_id = $(this).val();
        setMaxGaokaoForProvinceId(province_id);
    });
});