
jQuery(document).ready(function($) {
    console.log('birdmodal');


// console.log(Lang.get('labels.frontend.birds.openRings'));

    $('#birdModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);// Button that triggered the modal
        let birdId = button.val(); // Extract info from data-* attributes
        console.log('alert: '+ birdId);
        getBird(birdId);
    })

});

function getBird(id) {

    $.get('/ajax/getBird?id='+id,function (data) {
        // console.log(data);
        setText(data);
        setInputValue(data['0']);
    });
    //
}

function setText(data) {
    let bird= data['0'];
    let specie = data['1'];


    $('#idPersoText').text(bird['personal_id']);
    $('#usualNameText').text(Lang.get('birds.'+specie['commonName']));
    $('#dateOfBirthText').text(bird['dateOfBirth']);
    $('#speciesText').text(specie['scientificName']);
    $('#genderText').text(Lang.get('labels.frontend.birds.'+bird['sexe']));
    $('#sexingMethodeText').text(Lang.get('labels.frontend.birds.'+bird['sexingMethode']));
    $('#idNumText').text(bird['idNum']);
    $('#idTypeText').text(Lang.get('labels.frontend.birds.'+bird['idType']));
    $('#originText').text(Lang.get('labels.frontend.birds.'+bird['origin']));
    $('#breederText').text(bird['breederId']);
    $('#disponibilityText').text(Lang.get('labels.frontend.birds.'+bird['disponibility']));
    $('#statusText').text(Lang.get('labels.frontend.birds.'+bird['status']));

    displayItems(bird);
}

function displayItems(bird) {
    if(!bird['breederId'] || !bird['origin']=='thisElevage')$('#breederGroup').css('display','none');
    // if(!bird['idNum'])$('#idNummerGroup').css('display','none');
    // if(bird['sexe'] == 'unknow')$('#genderGroup').css('display','none');
    bird['sexe'] != 'unknow' ?  $('#genderGroup').css('display','block') : $('#genderGroup').css('display','none');
    bird['idType'] != 'noOne' ?  $('#idNummerGroup').css('display','block') : $('#genderGroup').css('display','none');


}
function setInputValue(data) {

    let bird = data;
     console.log(bird);
    $('#personal_idInput').val((bird['personal_id']!=null ?  bird['personal_id'] : ''));
    $('#dateOfBirthInput').val((bird['dateOfBirth']!=null ?  bird['dateOfBirth'] : ''));
    $('#sexingMethodeSelect').val(bird['sexingMethode']).prop('selected',true);
    $('#'+bird["sexe"]).prop('checked',true);
    $('#'+bird["idType"]).prop('checked',true);
    $('#idNumInput').val((bird['idNum']!=null ?  bird['idNum'] : ''));
    $('#originSelect').val(bird['origin']).prop('selected',true);
    $('#breederIdInput').val((bird['breederId']!=null ?  bird['breederId'] : ''));
    $('#'+bird["disponibility"]).prop('checked',true);
    $('#'+bird["status"]).prop('checked',true);
    $('#idInput').val(bird['id']);

}

$('#editBirdBtn').on('click',function (e) {
    e.preventDefault();
   switchView();
});

function switchView() {
    $("#birdModal input").show();
    $("#birdModal select").show();
    $("#birdModal .radio-list").css('display','grid');
    $('#returnBirdBtn').css('display','grid');
    $('#updateBirdBtn').show();
    $('#editBirdBtn').hide();
    $('#historyGroup').hide();
    $('.modalText').hide();
     // $("#birdModal").attr('backdrop', 'static');
     // $("#birdModal").attr('keyboard', false);
     // $('#birdModal').data('modal').options.keyboard = false;
     // $('#birdModal').data('modal').options.backdrop = 'static';
}
function unSwitchViewBird() {
    $("#birdModal input").hide();
    $("#birdModal select").hide();
    $("#birdModal .radio-list").hide();
    $('#updateBirdBtn').hide();
    $('#returnBirdBtn').hide();
    $('#editBirdBtn').show();
    $('#historyGroup').show();
    $('.modalText').show();
}

  $('#sexingMethodeSelect').on('change',function (e) {
        console.log(e.target.value);
        e.target.value != 'unknow' ?  $('#genderGroup').css('display','block') : $('#genderGroup').css('display','none');
  });

$( "#UpdateBirdForm" ).submit(function(e) {
    e.preventDefault();
    let data =$( this ).serializeArray() ;
    console.log(data);
    updateBird(data);
});


function updateBird(data) {
    $.post( "/ajax/setBird",data).done(function( res ) {
        console.log(res);
        location.reload();
    });
}

$('#closeModalBtn').on('click',function (e) {
    e.preventDefault();
    console.log('close');
    unSwitchViewBird();
});

$('#returnBirdBtn').on('click',function () {
    unSwitchViewBird();
});

$('#birdModal').on('hidden.bs.modal', function (e) {
   unSwitchViewBird();
});

// function blockModal() {
//     $('#specieModal').on('hidden.bs.modal', function (e) {
//         e.preventDefault();
//     });
// }