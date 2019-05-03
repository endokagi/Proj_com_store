$(function () {

    $("#form_sel_cus").submit(function () {
        var Cname = $("#Cname").val();
        console.log(Cname);
        if (Cname == "null") {
            alert("Please Choose Name");
            return false;
        } else return true;
    });



    // 
    $("#search_add_btn").click(function () {
        var select_brand = $("#select_brand").val();
        if (select_brand == "null") {
            alert("Please Choose Brand");
        }
    });
});