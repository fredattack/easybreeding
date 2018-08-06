

$(document).ready(function () {
      console.log('hatchingsIndex');

    let table = $('#hatchingsTable').DataTable({
        "lengthMenu": [ 5,10, 25],
        responsive:true,
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
            { "targets": 0,"orderable": false },
            { "targets": 1 },
            { "targets": 2,'visible':false},
            {  "targets": 3},
            {  "targets": 4,"data":"status","orderable": false,'visible':false},
            {  "targets": 5 },
            {  "targets": 6 },
            {  "targets": 7 },
            {  "targets": 8 },
            {  "targets": 9 },
            {  "targets": 10},
            {  "targets": 11},
            {  "targets": 12},
        ],

        "order": [
            [1, 'asc'],[3, 'asc']
        ],
        "displayLength": 10,
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
                    $(rows).eq(i).before('<tr class="group"> <td colspan="12">' + group + '</td> </tr>');
                    last = group;
                }
            });
        }
    });


   //Order by the grouping
   //  $('#hatchingsTable tbody').on('click', 'tr.group', function() {
   //      var currentOrder = table.order()[0];
   //      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
   //          table.order([2, 'desc']).draw();
   //      } else {
   //          table.order([2, 'asc']).draw();
   //      }
   //  });
   //  table.columns.adjust().draw();

    searStatus(table,'still')
});


$('input[type=radio][name=status]').change(function(data) {
    let table = $('#hatchingsTable').DataTable();

   let val  =this.value;
    searStatus(table,val)
});

function searStatus(table,val){
    if (val == 'still') {
        table
            .column(4)
            .search( '1' )
            .draw();
    }
    else if (val == 'finish') {
        table
            .column(4 )
            .search('0')
            .draw();
    }
    else{
        table
            .column(4)
            .search( '' )
            .draw();
    }
}