
jQuery(document).ready(function($) {
    console.log('nestlingModal');



    $('#nestlingModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);// Button that triggered the modal
        let nestlingId = button.val(); // Extract info from data-* attributes
        console.log('alert: '+ nestlingId);
        getNestling(nestlingId);
    })

});

function getNestling(id) {

    $.get('/ajax/getNestling?id='+id,function (data) {
        // console.log(data);
        setText(data);
        setInputValue(data['0']);
    });
    //
}


function setText(data) {
    let nestling= data['0'];
    let specie = data['1'];
    console.log('sexingMeth:',nestling['sexingMethod']);

    $('#idPersoText').text(nestling['personal_id']);
    $('#usualNameText').text(Lang.get('birds.'+specie['commonName']));
    $('#dateOfBirthText').text(nestling['dateOfBirth']);
    $('#speciesText').text(specie['scientificName']);
    $('#genderText').text(Lang.get('labels.frontend.birds.'+nestling['sexe']));
    $('#sexingMethodeText').text(Lang.get('labels.frontend.birds.'+nestling['sexingMethod']));
    $('#idNumText').text(nestling['idNum']);
    $('#idTypeText').text(Lang.get('labels.frontend.birds.'+nestling['idType']));
    $('#originText').text(Lang.get('labels.frontend.birds.'+nestling['origin']));
    $('#breederText').text(nestling['breederId']);
    $('#disponibilityText').text(Lang.get('labels.frontend.birds.'+nestling['disponibility']));
    $('#statusText').text(Lang.get('labels.frontend.birds.'+nestling['status']));

    displayItems(nestling);
}



function displayItems(nestling) {
    nestling['sexe'] != 'unknow' ?  $('#genderGroup').css('display','block') : $('#genderGroup').css('display','none');
    nestling['idType'] != 'noOne' ?  $('#idNummerGroup').css('display','block') : $('#genderGroup').css('display','none');


}
function setInputValue(data) {

    let nestling = data;
     console.log(nestling);
    $('#personal_idInput').val((nestling['personal_id']!=null ?  nestling['personal_id'] : ''));
    $('#dateOfBirthInput').val((nestling['dateOfBirth']!=null ?  nestling['dateOfBirth'] : ''));
    $('#sexingMethodeSelect').val(nestling['sexingMethod']).prop('selected',true);
    $('#'+nestling["sexe"]).prop('checked',true);
    $('#'+nestling["idType"]).prop('checked',true);
    $('#idNumInput').val((nestling['idNum']!=null ?  nestling['idNum'] : ''));
    $('#originSelect').val(nestling['origin']).prop('selected',true);
    $('#breederIdInput').val((nestling['breederId']!=null ?  nestling['breederId'] : ''));
    $('#'+nestling["disponibility"]).prop('checked',true);
    $('#'+nestling["status"]).prop('checked',true);
    $('#idInput').val(nestling['id']);

}

$('#editNestlingBtn').on('click',function (e) {
    e.preventDefault();
   switchView();
});

function switchView() {
    $("#nestlingModal input").show();
    $("#nestlingModal select").show();
    $("#nestlingModal .radio-list").css('display','grid');
    $('#returnNestlingBtn').css('display','grid');
    $('#updateNestlingBtn').show();
    $('#editNestlingBtn').hide();
    $('#historyGroup').hide();
    $('.modalText').hide();
     // $("#nestlingModal").attr('backdrop', 'static');
     // $("#nestlingModal").attr('keyboard', false);
     // $('#nestlingModal').data('modal').options.keyboard = false;
     // $('#nestlingModal').data('modal').options.backdrop = 'static';
}
function unSwitchViewNestling() {
    $("#nestlingModal input").hide();
    $("#nestlingModal select").hide();
    $("#nestlingModal .radio-list").hide();
    $('#updateNestlingBtn').hide();
    $('#returnNestlingBtn').hide();
    $('#editNestlingBtn').show();
    $('#historyGroup').show();
    $('.modalText').show();
}

  $('#sexingMethodeSelect').on('change',function (e) {
        console.log(e.target.value);
        e.target.value != 'unknow' ?  $('#genderGroup').css('display','block') : $('#genderGroup').css('display','none');
  });

$( "#UpdateNestlingForm" ).submit(function(e) {
    e.preventDefault();
    let data =$( this ).serializeArray() ;
    console.log(data);
    updateNestling(data);
});


function updateNestling(data) {
    $.post( "/ajax/setNestling",data).done(function( res ) {
        console.log(res);
        location.reload();
    });
}

$('#closeModalBtn').on('click',function (e) {
    e.preventDefault();
    console.log('close');
    unSwitchViewNestling();
});

$('#returnNestlingBtn').on('click',function () {
    unSwitchViewNestling();
});

$('#nestlingModal').on('hidden.bs.modal', function (e) {
   unSwitchViewNestling();
});

// function blockModal() {
//     $('#specieModal').on('hidden.bs.modal', function (e) {
//         e.preventDefault();
//     });
// }