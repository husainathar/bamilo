$( document ).ready(function() {
    $(".category-list").click(function () {
        window.location = appUrl+"all-products/"+$(this).attr('data-category-id');
    });

    $(".category-attributes").click(function () {
        var attributes = [];
        $(".category-attributes").each(function( index ) {
            if($(this).prop("checked")){
                attributes.push($(this).val())
            }
        });
        $("#products-list").load(appUrl+"filter-search", {categoryId:$('#hdnCategoryId').val(), attributes:JSON.stringify(attributes)});
    });
});