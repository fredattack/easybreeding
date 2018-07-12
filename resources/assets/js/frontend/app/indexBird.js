
$(document).ready(function() {
    console.log('indexBird');

    var table = $('#example').DataTable({
        "lengthMenu": [ 5,10, 25, 50, 100 ],
        responsive:true,
        colReorder: true,
        columnDefs: [
        { responsivePriority: 1, targets: 0 ,"width": "30%"},
        { responsivePriority: 1, targets: 0 ,"width": "10%" },
        { responsivePriority: 2, targets: -1,"width": "10%" },
        { responsivePriority: 2, targets: -1 ,"width": "10%" },
        { responsivePriority: 2, targets: -1 ,"width": "10%" },
        { responsivePriority: 2, targets: -1 ,"width": "15%" },
        { responsivePriority: 2, targets: 0,"width": "5%", "orderable": false },
        { responsivePriority: 2, targets: 0,"width": "5%", "orderable": false },
        { responsivePriority: 2, targets: 0,"width": "5%", "orderable": false }
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
            [2, 'asc']
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
                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
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

$('#btnBlock').on('click',function () {
    console.log('btnblock');
    $('#displayBlock').show();
    $('#displayList').hide();

});

$('#btnList').on('click',function () {
    console.log('btnList');
    $('#displayBlock').hide();
    $('#displayList').show();

});