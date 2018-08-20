let birdsList;
let table;

$(document).ready(function() {
    console.log('indexBird');

    table = $('#birdsIndex').DataTable({
        "lengthMenu": [ 5,10, 25, 50, 100 ],
        responsive:true,
        colReorder: true,
        columnDefs: [
            { "defaultContent": "", "targets": "_all" } ,
        { responsivePriority: 1,"data":"none", targets: 0 , "orderable": false},
        { responsivePriority: 1,"data":"id", targets: 1  },
        { responsivePriority: 2,"data":"speciesName", targets: 2,"visible":false },
        { responsivePriority: 2,"data":"personal_id", targets: 3  },
        { responsivePriority: 2,"data":"sexe", targets: 4  },
        { responsivePriority: 2,"data":"dateOfBirth", targets: 5  },
        { responsivePriority: 3,"data":"idNum", targets: 6  },
        { responsivePriority: 3,"data":"status", targets: 7 },
        { responsivePriority: 4,"data":"disponibility", targets: 8},
        { responsivePriority: 1,"data":"button", targets: 9, "orderable": false}
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


        "order": [
            [2, 'asc']
        ],
        "displayLength": 25,
        "drawCallback": function(settings) {
            let api = this.api();
            let rows = api.rows({
                page: 'current'
            }).nodes();
            let last = null;
            api.column(2, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="10">' + group + '</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order by the grouping
    $('#birdsIndex tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    table.columns.adjust().draw();

   getBirdsList();

});

function getBirdsList() {

    $.get('/ajax/getBirdsList',function (data) {
        console.log(data);
        birdsList = data;
    });

}

$('#btnBlock').on('click',function () {
    console.log('btnblock');
    $('#displayBlock').fadeToggle();
    $('#displayList').fadeToggle();

});

$('#btnList').on('click',function () {
    console.log('btnList');
    $('.TableFilter').fadeToggle();
    $('#displayBlock').fadeToggle();
    $('#displayList').fadeToggle();

});

$('#toolBar select').on('change',function (){
    console.log('select',$(this).val());
    let table = $('#'+$(this).data('table')).DataTable();
    let column = $(this).data('column');
    console.log('table: ',$(this).data('table'));
    console.log('column: ',column);
    if($(this).val()==='' )
    {
        table   .column(column)
                .search($(this).val() )
                .draw();

        $(this).val('0').prop('selected',true);
    }else{

        table.column(column)
            .search($(this).val() )
            .draw();
    }
});

 /********************************************
* Description: initialise Datepicker
* Parameters: none
* Return none
*********************************************/

jQuery('#min').datepicker({
    format: 'dd/mm/yyyy',
    endDate:'+1d',
    weekStart:'1',
    "onSelect": function(date) {
        minDateFilter = new Date(date).getTime();
        table.fnDraw();
    }
    // language:'fr'
});
