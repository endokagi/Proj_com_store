$(function(){
    
    // $("#Add_search").click(function(){
    //     var CFname = $("#CFname").val();
    //     var CLname = $("#CLname").val();
    //     if(CFname=="null"||CLname=="null"){
    //         alert("Please Choose Brand");
    //     }
    // });

    $("#search_add_btn").click(function(){
        var select_brand = $("#select_brand").val();
        // console.log(select_brand);
        if(select_brand=="null"){
            alert("Please Choose Brand");
        }
    });
});