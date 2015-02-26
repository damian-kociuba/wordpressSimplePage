$(function() {
    $("#source_paper_details").hide();
    
    $("select#source_type").change(function(){
        var value = $(this).val();
        if(value === 'paper') {
            $("#source_link_details").hide();
            $("#source_paper_details").show();
        } else {
            $("#source_link_details").show();
            $("#source_paper_details").hide();
        }
    });
});