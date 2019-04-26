$(function(){
    
    // select_customer from cashier/index
    $("#confirm_name").click(function(){
        var Cname = $("#Cname").val();
        console.log(Cname);
        if(Cname=="null"){
            alert("Please Choose Name");
            
        }
    });

    // 
    $("#search_add_btn").click(function(){
        var select_brand = $("#select_brand").val();
        if(select_brand=="null"){
            alert("Please Choose Brand");
        }
    });
});