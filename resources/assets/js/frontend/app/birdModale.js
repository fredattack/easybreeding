jQuery(document).ready(function($) {
console.log('reloadax');

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
    $('#usualNameText').text(specie['commonName']);
    $('#dateOfBirthText').text(bird['dateOfBirth']);
    $('#speciesText').text(specie['scientificName']);
    $('#genderText').text(bird['sexe']);
    $('#sexingMethodeText').text('sexingMethod');
    $('#idNumText').text(bird['idNum']);
    $('#idTypeText').text(bird['idType']);
    $('#breederText').text(bird['breederId']);
    $('#statusText').text(bird['status']);

}
