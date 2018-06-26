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
        console.log(data);
        setText(data);

    });
    //
}

function setText(data) {
    let specie = data['2'];
    console.log('sguen '+specie['commonName']);
    console.log('pépite '+specie['scientificName']);
    $('#orderText').text(data['0']);
    $('#famillyText').text(data['1']);
    $('#NameText').text(specie['commonName']);
    $('#scienceText').text(specie['scientificName']);
    $('#incubationText').text(specie['incubation']);
    $('#fertilityControlText').text(specie['fertilityControl']);
    $('#spawningIntervalText').text(specie['spawningInterval']);
    $('#outOfNestText').text(specie['outOfNest']);
    $('#weaningText').text(specie['weaning']);
    $('#sexMatText').text(specie['sexualMaturity']);
    $('#girdleDateText').text(specie['girdleDate']);

}
