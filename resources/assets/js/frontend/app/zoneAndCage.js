$(document).ready(function(){

    if(window.location.hash != "") {
        $('a[href="' + window.location.hash + '"]').click()
    }

});
//region drag'n drop

$('#addZoneBtn').on('click',function (e) {
    $('#cagesBoard').toggle();
    // e.preventDefault();
    $('#newZoneForm').toggle();
    $('#zonePlusBtn').toggleClass('ti-plus').toggleClass('fa fa-rotate-left');
});

$('#addCageBtn').on('click',function (e) {
    $('#zonesBoard').toggle();
    // e.preventDefault();
    $('#newCageForm').toggle();
    $('#cagePlusBtn').toggleClass('ti-plus').toggleClass('fa fa-rotate-left');
});


/*set in cages*/



function setBirdCage(birdId,cageId,zoneId) {
    console.log('setBirdCage for' +birdId+ ' in cage '+cageId);
    $.get('/ajax/setBirdCage?birdId='+birdId+'&cageId='+cageId,function (data) {
        console.log('set in return',data);

        window.location.hash='zone'+zoneId;
        window.location.reload();
    });
}

/*remove from cages*/



function removeBirdCage(birdId,cageId) {
    console.log('removeBirdCage for' +birdId+ ' in cage ');
    $.get('/ajax/setBirdCage?birdId='+birdId+'&cageId='+cageId+'&supp=true',function (data) {
        console.log('remove return',data);
        $('#brd'+birdId).toggle();
    });
}
//endregion




$('.btnEditCage').on('click',function () {
    let id = $(this).attr('id').substr(3);
    $('#editCagebtn'+id).toggleClass('fa-pencil').toggleClass('fa-rotate-left');
    $('.cageinput'+id).toggle();
    $('.cageText'+id).toggle();
    $('#birdsBlock'+id+' a').fadeToggle();
    $('#editCage'+id).fadeToggle();
    console.log('sguen...'+id);
});

$('.removebtn').on('click',function () {
    let birdId = $(this).attr('id').substr(3);
    let cageId = $(this).attr('data-cage');
    console.log('data '+cageId);
    removeBirdCage(birdId,cageId)

});
$('.selectBird').on('change',function () {
    let birdId = $(this).val();
    let cageId = $(this).attr('data-cage');
    let zoneId = $(this).attr('data-zone');
    console.log('data '+cageId+' & bird '+birdId+' @ zone: '+zoneId );
    setBirdCage(birdId,cageId,zoneId)
    // removeBirdCage(birdId,cageId)

});
