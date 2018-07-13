$(document).ready(function () {
          console.log('indexBird');

    var table = $('#couplesTable').DataTable({
        "lengthMenu": [ 5,10, 25],
        responsive:true,
        colReorder: false,
        columnDefs: [
        { responsivePriority: 2, targets: -1 ,"width": "10%"},
        { responsivePriority: 1, targets: 0 ,"width": "10%"},
        // { responsivePriority: 1, targets: 1 ,"width": "10%" },
        // { responsivePriority: 2, targets: 2,"width": "30%" },
        // { responsivePriority: 2, targets: 3 ,"width": "30%" },
        // { responsivePriority: 2, targets: 4 ,"width": "10%" },

    ],
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

        "columnDefs": [{
            "visible": false,
            "targets": 2,

        }],

        "order": [
            [1, 'asc']
        ],
        "displayLength": 5,
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;

            api.column(2, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="2">' + group + '</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order by the grouping
    // $('#example tbody').on('click', 'tr.group', function() {
    //     var currentOrder = table.order()[0];
    //     if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
    //         table.order([2, 'desc']).draw();
    //     } else {
    //         table.order([2, 'asc']).draw();
    //     }
    // });
    table.columns.adjust().draw();
});

$(document).ready(function($) {
    console.log('specie change');
    // $('.display').dataTable();

    $('#specieCouple').on('change', function (e) {

        console.log(e.target.value);

        // $('input[name="searchBox"]').val('');
        generateMales(e.target.value);
        generateFemales(e.target.value)
    });
});

function generateMales(id) {

    $.get('/ajax/generateMales?specieId='+id,function (data) {
        console.log(data);
        
        $('#males').empty();
        $('#males').append('<option value="none" disabled selected>Choisissez un mâle</option>');

        $.each(data,function (index,maleReturned) {
            $('#males').append('<option value="'+maleReturned.id+'">'+maleReturned.personal_id+'('+maleReturned.idNum+')'+'</option>');
        })
    });


}
function generateFemales(id) {

    $.get('/ajax/generateFemales?specieId='+id,function (data) {
        console.log(data);

        $('#females').empty();
        $('#females').append('<option value="none" disabled selected>Choisissez une femelle</option>');

        $.each(data,function (index,maleReturned) {
            $('#females').append('<option value="'+maleReturned.id+'">'+maleReturned.personal_id+'('+maleReturned.idNum+')'+'</option>');
        })
    });

}

$(document).ready(function () {
    $('#createCouple').parsley(options);
});