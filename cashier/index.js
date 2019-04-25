$(function(){
    $("#Add_search").click(function(){
        var select_brand = $("#select_brand").val();
        console.log(select_brand)
        if(select_brand=="null"){
            alert("Please Choose Brand");
        }
        $("#show_select").show();
    });
});