
jQuery(document).ready(function($) {

console.log(Lang.get('labels.frontend.birds.openRings'));

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

    });
    //
}

function setText(data) {
    let bird= data['0'];
    let specie = data['1'];
    console.log(bird);

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
    if(!bird['idNum'])$('#idNummerGroup').css('display','none');
    if(bird['sexe'] == 'unknow')$('#genderGroup').css('display','none');

}