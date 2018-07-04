jQuery(document).ready(function() {
    $('#hiddenTable').dataTable();
});

$('#order').on('change',function(e){
    console.log(e.target.value);
    $('input[name="searchBox"]').val('');
    generateFamillies(e.target.value);


});
$('#hiddenTable').dataTable();
function generateFamillies(id) {

    $.get('/ajax/generateFamillies?orderId='+id,function (data) {
        console.log(data);
        $('#familly').empty();
        $('#familly').append('<option value="" disabled selected>Choisissez une famille</option>');

        $.each(data,function (index,famillyObs) {
            $('#familly').append('<option value="'+famillyObs.id+'">'+famillyObs.name+'</option>');
        });

    });
    //
}

$('#familly').on('change',function(e){
    console.log(e.target.value);
   generateSpecies(e.target.value);
});

function generateSpecies(id) {

    $.get('/ajax/generateSpecies?famillieId='+id,function (data) {
        console.log(data);
        $('#species').empty();
        $('#species').append('<option value="" disabled selected>Choisissez une espèce</option>');

        $.each(data,function (index,speciesObs) {
            $('#species').append('<option value="'+speciesObs.id+'">'+speciesObs.scientificName+'</option>');
        })
    });


}

$('#species').on('change',function(e){
    // console.log(e.target.value);
    generateUsualName(e.target.value);
    $('#showSpecieBtn').val(e.target.value);
    $('#showSpecieBtn').css('display','inline-flex');
    $('#returnSpecieBtn').css('display', 'inline-flex');
    $('#customSpecieBtn').css('display', 'none');
    $('#addSpecieBtn').css('display', 'none');
});

function generateUsualName(id) {

    $.get('/ajax/generateUsualName?specieId='+id,function (data) {
        console.log('usualName:'+data);
        $('input[name="commonName"]').val(data.commonName);
      // $('#species').append('<option value="'+speciesObs.id+'">'+speciesObs.scientificName+'</option>');
    });
}


// Date Picker
jQuery('.mydatepicker, #datepicker').datepicker({
    format: 'dd/mm/yyyy',
    endDate:'+1d',
    weekStart:'1',
    // language:'fr'
});
jQuery('#datepicker-autoclose').datepicker({
    autoclose: true,
    todayHighlight: true
});
jQuery('#date-range').datepicker({
    toggleActive: true
});
jQuery('#datepicker-inline').datepicker({
    todayHighlight: true
});

// Gender radio button


$('input[id=sexe1]').change(function () {
    $('#sexMethod').css('display','flex');
});
$('input[id=sexe2]').change(function () {
    $('#sexMethod').css('display','flex');
});
$('input[id=sexe3]').change(function () {
    $('#sexMethod').css('display','none');
});


// Identification Methode
$('input[id=idType1]').change(function () {
    $('#idNumberGroup').css('display','flex');
});
$('input[id=idType2]').change(function () {
    $('#idNumberGroup').css('display','flex');
});
$('input[id=idType3]').change(function () {
    $('#idNumberGroup').css('display','flex');
});
$('input[id=idType4]').change(function () {
    $('#idNumberGroup').css('display','none');
});
$(document).ready(function () {
    if($('input[id=idType4]').prop('checked','true') )$('#idNumberGroup').css('display','none');
    else $('#idNumberGroup').css('display','flex');
});

// Origine

$('select[name=origin]').change(function () {
    // alert($('select[name=origin]').val());
    if($('select[name=origin]').val()!='thisElevage' ) $('#infoBreeder').css('display','flex');
    else $('#infoBreeder').css('display','none');
});

function addaptSpecieFields() {
    $('#showSpecieBtn').val($('#species').val());
    $('#showSpecieBtn').css('display', 'inline-flex');
    // $('input[name="commonName"]').val($("#basics").getSelectedItemData().name_FR);
     $('#returnSpecieBtn').css('display', 'inline-flex');
     $('#customSpecieBtn').css('display', 'none');
     $('#addSpecieBtn').css('display', 'none');

}

function displaySpecieAttribut() {
    let ordreSearched = $("#basics").getSelectedItemData().ordre;
    let famille = $("#basics").getSelectedItemData().famillie;
    console.log(ordreSearched);
    let latin = $("#basics").getSelectedItemData().latin;
    generateFamillies($("#basics").getSelectedItemData().id_Ordre);
    generateSpecies($("#basics").getSelectedItemData().Id_famille);
    $('input[name="commonName"]').val($("#basics").getSelectedItemData().name_FR);
    setTimeout(function () {

        // Something you want delayed.

        $(function () {
            $('[name=orderId] option').filter(function () {
                return ($(this).text() == ordreSearched);
            }).prop('selected', true);
        });

        console.log(famille);

        $(function () {
            $('[name=famillyId] option').filter(function () {
                return ($(this).text() == famille);
            }).prop('selected', true);
        });

        console.log(latin);
        $(function () {
            $('[name=speciesId] option').filter(function () {
                return ($(this).text() == latin);
            }).prop('selected', true);
        });


    }, 500);
    setTimeout(function () {
        addaptSpecieFields();
    }, 500);
}

//AutoComplete
let options = {
    url: function(phrase) {
        return "/ajax/autocomplete?query=" + phrase;
    },

    getValue: "name_FR",
    list: {
        maxNumberOfElements: 30,
        match: {
            enabled: true
        },
        onClickEvent: function() {
            displaySpecieAttribut();
            console.log('click');

        },
        onChooseEvent: function () {
            displaySpecieAttribut();
            console.log('choose');

        }
    }
};

$("#basics").easyAutocomplete(options,"minLength", 3 );

// create Specie

$('#addSpecieBtn').on('click',function () {
    $('.newSpecieBlock').css('display','block');
    $('.specieBlock').css('display','none');

    $('.newSpecieBlock input').prop('disabled',false);
    $('.specieBlock input').prop('disabled',true);

    $('#basics').prop('disabled',true);
    $('#newusualNameInput').prop('required',true);
    $('#type').val('newSpecie');
    $('#returnSpecieBtn').css('display', 'inline-flex');
    $('#customSpecieBtn').css('display', 'none');
    $('#addSpecieBtn').css('display', 'none');

});

$('#speciesCustomSelect').on('change',function(e){
    console.log(e.target.value);
    let id=e.target.value;


    $.get('/ajax/getSpecie?id='+id,function(data) {
        console.log(data);
        newSpecieSetInputValue(data);

    });
    $('.newSpecieBlock').css('display','none');

    $('#showSpecieBtn').val(id);
    $('#showSpecieBtn').css('display', 'inline-flex');
});

function newSpecieSetInputValue(data){
    let specie = data['2'];
    $('#newusualNameInput').val((specie['commonName']!=null ?  specie['commonName'] : 'come on'));
    $('#newscientificNameInput').val((specie['scientificName']!=null ?  specie['scientificName'] : ''));
    $('#newincubationInput').val((specie['incubation']!=null ?  specie['incubation'] : ''));
    $('#newfertilityControlInput').val((specie['fertilityControl']!=null ?  specie['fertilityControl'] : ''));
    $('#newspawningIntervalInput').val((specie['spawningInterval']!=null ?  specie['spawningInterval'] : ''));
    $('#newoutOfNestInput').val((specie['outOfNest']!=null ?  specie['outOfNest'] : ''));
    $('#newweaningInput').val((specie['weaning']!=null ?  specie['weaning'] : ''));
    $('#newsexualMaturityInput').val((specie['sexualMaturity']!=null ?  specie['sexualMaturity'] : ''));
    $('#newgirdleDateInput').val((specie['girdleDate']!=null ?  specie['girdleDate'] : ''));

}

$('#customSpecieBtn').on('click',function () {
    $('#goButton').css('display', 'none');
    $('.easy-autocomplete').css('display', 'none');
    $('#speciesCustomSelect').css('display', 'block');
    $('.specieBlock').css('display','none');
    $('.specieBlock input').prop('disabled',true);
    $('#type').val('userSpecie');
    $('#basics').css('display','none');
    $('#returnSpecieBtn').css('display', 'inline-flex');
    $('#customSpecieBtn').css('display', 'none');
    $('#addSpecieBtn').css('display', 'none');

});

$('#returnSpecieBtn').on('click',function () {
    $('#goButton').css('display', 'block');
    $('#basics').css('display','block');
    $('.easy-autocomplete').css('display', 'block');
    $('#speciesCustomSelect').css('display', 'none');
    $('#customSpecieBtn').css('display', 'inline-flex');
    $('#addSpecieBtn').css('display', 'inline-flex');
    $('#returnSpecieBtn').css('display', 'none');
    $('#showSpecieBtn').css('display', 'none');
    $('.newSpecieBlock').css('display','none');
    $('.specieBlock').css('display','block');
    $('#createBird')[0].reset();

});