$('#order').on('change',function(e){
    console.log(e.target.value);
    $('input[name="searchBox"]').val('');
    generateFamillies(e.target.value);


});

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
    console.log(e.target.value);
    generateUsualName(e.target.value);

});

function generateUsualName(id) {

    $.get('/ajax/generateUsualName?specieId='+id,function (data) {
        console.log(data);
        $('input[name="usualName"]').val(data.commonName);
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
            let ordreSearched = $("#basics").getSelectedItemData().ordre;
            let famille = $("#basics").getSelectedItemData().famillie;
            console.log(ordreSearched);
            let latin = $("#basics").getSelectedItemData().latin;
            generateFamillies($("#basics").getSelectedItemData().id_Ordre);
            generateSpecies($("#basics").getSelectedItemData().Id_famille);

            setTimeout(function (){

                // Something you want delayed.


                    $(function() {
                        $('[name=orderId] option').filter(function() {
                            return ($(this).text() == ordreSearched);
                        }).prop('selected', true);
                    });


                    console.log(famille);


                    $(function() {
                        $('[name=famillyId] option').filter(function() {
                            return ($(this).text() == famille);
                        }).prop('selected', true);
                    });


                    console.log(latin);
                    $(function() {
                        $('[name=speciesId] option').filter(function() {
                            return ($(this).text() == latin);
                        }).prop('selected', true);
                    });

            }, 500);
            $('input[name="usualName"]').val($("#basics").getSelectedItemData().name_FR);

        },
        onChooseEvent: function () {
            console.log('enter');
            let ordreSearched = $("#basics").getSelectedItemData().ordre;
            let famille = $("#basics").getSelectedItemData().famillie;
            console.log(ordreSearched);
            let latin = $("#basics").getSelectedItemData().latin;
            generateFamillies($("#basics").getSelectedItemData().id_Ordre);
            generateSpecies($("#basics").getSelectedItemData().Id_famille);

            setTimeout(function (){

                // Something you want delayed.


                $(function() {
                    $('[name=orderId] option').filter(function() {
                        return ($(this).text() == ordreSearched);
                    }).prop('selected', true);
                });


                console.log(famille);


                $(function() {
                    $('[name=famillyId] option').filter(function() {
                        return ($(this).text() == famille);
                    }).prop('selected', true);
                });


                console.log(latin);
                $(function() {
                    $('[name=speciesId] option').filter(function() {
                        return ($(this).text() == latin);
                    }).prop('selected', true);
                });

            }, 500);
            $('input[name="usualName"]').val($("#basics").getSelectedItemData().name_FR);
        }
    }

};


$("#basics").easyAutocomplete(options,"minLength", 3 );

