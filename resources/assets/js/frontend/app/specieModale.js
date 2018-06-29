jQuery(document).ready(function($) {
    console.log('reloadax');

    $('#specieModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);// Button that triggered the modal
        let birdId = button.val(); // Extract info from data-* attributes
        console.log('alert: '+ birdId);
        getSpecie(birdId);
    })

});

function getSpecie(id) {

    $.get('/ajax/getSpecie?id='+id,function(data) {
        // console.log(data);
        setText(data);
        setInputValue(data['2']);

    });
    //
}

function setText(data) {
    let specie = data['2'];
    (data['0'] !=null ?  $('#orderText').text(data['0']) : "");
    (data['1'] !=null ?  $('#famillyText').text(data['0']) : "");
    $('#NameText').text((specie['commonName']!=null ?  specie['commonName'] : Lang.get('labels.frontend.birds.unknow')));
    $('#scienceText').text((specie['scientificName']!=null ?  specie['scientificName'] : Lang.get('labels.frontend.birds.unknow')));
    $('#incubationText').text((specie['incubation']!=null ?  specie['incubation']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));
    $('#fertilityControlText').text((specie['fertilityControl']!=null ?  specie['fertilityControl']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));
    $('#spawningIntervalText').text((specie['spawningInterval']!=null ?  specie['spawningInterval']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));
    $('#outOfNestText').text((specie['outOfNest']!=null ?  specie['outOfNest']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));
    $('#weaningText').text((specie['weaning']!=null ?  specie['weaning']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));
    $('#sexMatText').text((specie['sexualMaturity']!=null ?  specie['sexualMaturity']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));
    $('#girdleDateText').text((specie['girdleDate']!=null ?  specie['girdleDate']+' '+Lang.get('labels.frontend.date.days') : Lang.get('labels.frontend.birds.unknow')));

}

function setInputValue(data) {

    let specie = data;
    $('#usualNameInput').val((specie['commonName']!=null ?  specie['commonName'] : ''));
    $('#scientificNameInput').val((specie['scientificName']!=null ?  specie['scientificName'] : ''));
    $('#incubationInput').val((specie['incubation']!=null ?  specie['incubation'] : ''));
    $('#fertilityControlInput').val((specie['fertilityControl']!=null ?  specie['fertilityControl'] : ''));
    $('#spawningIntervalInput').val((specie['spawningInterval']!=null ?  specie['spawningInterval'] : ''));
    $('#outOfNestInput').val((specie['outOfNest']!=null ?  specie['outOfNest'] : ''));
    $('#weaningInput').val((specie['weaning']!=null ?  specie['weaning'] : ''));
    $('#sexualMaturityInput').val((specie['sexualMaturity']!=null ?  specie['sexualMaturity'] : ''));
    $('#girdleDateInput').val((specie['girdleDate']!=null ?  specie['girdleDate'] : ''));
    $('#idInput').val(specie['id']);
    $('#id_famillieInput').val(specie['id_famillie']);


}



// function controlValue(specie) {
//     console.log(typeof (specie));
//     for (let [key, value] of Object.entries(specie)) {
//         if(value==null) value = '';
//         console.log(key, value);
//     }
//     return specie;
//
// }

$('#editCustomSpecieBtn').on('click',function (e) {
    e.preventDefault();
   switchView();
});


function switchView() {
    $("#specieModal input").show();
    $('#updateSpecieBtn').show();
    $('.modalText').css('display','none');
}

// $('#updateSpecieBtn').on('click',function (e) {
//
//     e.preventDefault();
//     let form = $('#UpdateSpecieForm').find('form');
//     let data = form.serializeArray();
//     console.log(data);
//     setSpecie(data);
// });

$( "#UpdateSpecieForm" ).submit(function(e) {
    e.preventDefault();
    let data =$( this ).serializeArray() ;
    console.log(data);
    setSpecie(data);
});


function setSpecie(data) {
    $.post( "/ajax/setSpecie",data).done(function( res ) {
        console.log(res);
        location.reload();
    });
}

function reSwitchView(){

}


