function checkUrlForNewBird() {
    // url = new URL(window.location.href);
    let urlParams = new URLSearchParams(location.search);

    if (urlParams.has('nbfc')) {
        getTheBird(urlParams.get('nbfc'));

    }
}

$(document).ready(function () {
    checkUrlForNewBird();
          console.log('indexCouples');

    let table = $('#couplesTable').DataTable({
        "lengthMenu": [ 5,10, 25],
        responsive: {
        details: {
            renderer: function ( api, rowIdx, columns ) {
                var data = $.map( columns, function ( col, i ) {
                    return col.hidden ?
                        '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                            '<td>'+col.title+':'+'</td> '+
                            '<td>'+col.data+'</td>'+
                        '</tr>' :
                        '';
                } ).join('');

                return data ?
                    $('<table/>').append( data ) :
                    false;
            }
        }
    },
        colReorder: true,
        language: {

             "sProcessing":     "Traitement en cours...",
    "sSearch":         Lang.get('labels.frontend.table.sSearch'),
    "sLengthMenu":     Lang.get('labels.frontend.table.sLengthMenu'),
    "sInfo":           Lang.get('labels.frontend.table.sInfo'),
    "sInfoEmpty":      Lang.get('labels.frontend.table.sInfoEmpty'),
    "sInfoFiltered":   Lang.get('labels.frontend.table.sInfoFiltered'),
    "sInfoPostFix":    "",
    "sLoadingRecords": Lang.get('labels.frontend.table.sLoadingRecords'),
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    },
    "select": {
            "rows": {
                _: "%d lignes séléctionnées",
                0: "Aucune ligne séléctionnée",
                1: "1 ligne séléctionnée"
            }
    }
    },
        "autoWidth": false,

        "columnDefs": [
            {"visible": false, "targets": [1]},
            {"orderable": false, "targets": [1,4]},
            // {"visible":false, "targets" : },
        ],

        "order": [
            [1, 'asc'],[11, 'asc']
        ],
        "displayLength": 10,
        "drawCallback": function(settings) {
            let api = this.api();
            let rows = api.rows({
                page: 'current'
            }).nodes();
            let last = null;

            api.column(1, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"> <td colspan="6">' + group + '</td> </tr>');
                    last = group;
                }
            });
        }
    });
   // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    table.columns.adjust().draw();
});




$('.btCardPlus').on('click',function () {
   $("#details"+$(this).val()).toggle();
   $(this).find('i').toggleClass('fa-plus fa-minus');

});


$(document).ready(function($) {

    console.log('specie change');
    // $('.display').dataTable();

    $('#specieCouple').on('change', function (e) {

        console.log('test:'+e.target.value);

        // $('input[name="searchBox"]').val('');
        generateMales(e.target.value);
        generateFemales(e.target.value)
    });
});


function generateMales(id) {

    $.get('/ajax/generateMales?specieId='+id,function (data) {
        console.log('males generated', data);

        $('#males').empty();
        $('#males').append('<option value="none" disabled selected>Choisissez un mâle</option>');

        $.each(data,function (index,maleReturned) {
            $('#males').append('<option value="'+maleReturned.id+'">'+maleReturned.personal_id+'('+maleReturned.idNum+')'+'</option>');
        })
    });


}
function generateFemales(id) {

    $.get('/ajax/generateFemales?specieId='+id,function (data) {
        console.log('females generated',data);

        $('#females').empty();
        $('#females').append('<option value="none" disabled selected>Choisissez une femelle</option>');

        $.each(data,function (index,femaleReturned) {
            $('#females').append('<option value="'+femaleReturned.id+'">'+femaleReturned.personal_id+'('+femaleReturned.idNum+')'+'</option>');
        })
    });

}


$(document).ready(function () {
    $('#createCouple').parsley();
});



$("#newCoupleModal").on("hidden.bs.modal", function () {
    // put your default event here
    $('#createCouple').trigger("reset");
});

$('#btnCloseNewCoupleModal').on('click',function () {
   $('#newCoupleModal').modal("hide");
});



$('.addBirdToCouple').on('click',function () {
    console.log($(this).val());
    getTheBird($(this).val());

});

function getTheBird(id) {
    $.get('/ajax/getBird?id='+id,function (data) {
        console.log(data);
      adaptModale(data);
    });
}

function adaptModale(data){
    bird=data['0'];
    $('#specieCouple option[value="'+data["0"]["species_id"]+'"]').prop('selected', true);
    // ​​$('#specieCouple').value =  bird.customId;
   let speciesId=data['0']['species_id'];
    console.log('species_id',speciesId);


    switch(bird.sexe){
        case'male':
        $('#males').empty();
        $('#males').append('<option value="'+data['0']['id']+'">'+data['0'].personal_id+'('+data['0'].idNum+')'+'</option>');
        generateFemales(speciesId);
            break;
        case'female':
        $('#females').empty();
        $('#females').append('<option value="'+data['0']['id']+'">'+data['0'].personal_id+'('+data['0'].idNum+')'+'</option>');
        generateMales(speciesId);
            break;
    }

    $('#newCoupleModal').modal("show");
}
