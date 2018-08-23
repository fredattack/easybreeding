/********************************************
 * Description: display create Category on button click
 * Parameters: none
 * Return
 *********************************************/

$('#addCategoryBtn2').on('click',function () {
    displayNewCatGroup2();
});



function displayNewCatGroup2(){
    $('.categoryGroup').fadeToggle();
    $('#addGroupCat').toggleClass('addCatGroup addCatGroupFlex');
    $('#addCategoryIcon').toggleClass('fa-plus').toggleClass('fa-rotate-left');
}



$('.categoryColorInput').on('change',function () {
    let idCat=$(this).prop('id').substr(4);
    let color=$('#'+$(this).prop('id')).spectrum('get').toHexString().slice(1);


    updateCategory(idCat,color);
});

function updateCategory(id,color) {

    $.get('/ajax/updateCategoryColor?id=' + id + '&color=' + color, function (data) {
        console.log('changed');
    });
}

$('.deleteCat').on('click',function () {
    let idCat=$(this).prop('id').substr(4);
    $.get('/ajax/deleteCategory?id=' + idCat , function (data) {
        $('#row'+idCat).toggle();
    });
});


/********************************************
 * Description: click on new category Button
 * Parameters: none
 * Return none
 *********************************************/
$('#saveCategoryset').on('click',function () {
    if($('#newCategoryInput').val()==null) $('.form-control-feedback').css('display','block');
    else {
        let color = $("#full").spectrum('get').toHexString();
        let title = $('#newCategoryInput').val();
        createCategorySet(title, color);
    }
});

/********************************************
 * Description: create category - sending to server with ajax
 * Parameters: title, val(color)
 * Return
 *********************************************/
function createCategorySet(title,val) {

    //remove the # from color to pass the query parameters in url
    let color = val.slice( 1 );

    $.get('/ajax/createCategory?title='+title+'&color='+color,function (data) {

        location.reload();

    });
}

$("input[name='defaultView']").on('change',function () {
    let val=$("input[name='defaultView']:checked").val();
    console.log('val= ' + val);
    updateDefaultView(val);
});

function updateDefaultView(val){
    $.get('/ajax/updateDefaultView?val='+val,function (data) {
        console.log(data);
    });
}