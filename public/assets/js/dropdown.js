$(document).ready(function () {

    $('select').multiselect({
          enableFiltering: true,
          includeSelectAllOption: true,
          selectAllJustVisible: false
    });

    // $('#btnSelected').click(function () {
    //     var selected = $("#lstFruits option:selected");
    //     var message = "";
    //     selected.each(function () {
    //         message += $(this).text() + " " + $(this).val() + "\n";
    //     });
    //     alert(message);
    // });

});
