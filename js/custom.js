$(document).ready(function () {
    $("#country_select").change(function () {
        var country_id = $(this).val();
        $('#province_select').empty()
        $.ajax({
            type: 'POST',
            url: "database_manager.php",
            dataType: 'json',
            data: {
                action: 'getProvinceListFromCountryId',
                country_id: country_id
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
    });
});