
$(document).ready(function() {
    console.log('indexNestling');

    var table = $('#nestlingTable').DataTable({
        "lengthMenu": [ 5,10, 25, 50, 100 ],
        responsive:true,
        colReorder: true,
        columnDefs: [
        { responsivePriority: 1, targets: 0 , "orderable": false},
        { responsivePriority: 1, targets: 1 },
        { responsivePriority: 2, targets: 2,"visible":false },
        { responsivePriority: 2, targets: 3 },
        { responsivePriority: 2, targets: 4 },
        { responsivePriority: 3, targets: 6},
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
            [2, 'asc'],[1, 'asc']
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
                    $(rows).eq(i).before('<tr class="group"><td colspan="8">' + group + '</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order by the grouping
    $('#nestlingTable tbody').on('click', 'tr.group', function() {
        var currentOrder = table.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            table.order([2, 'desc']).draw();
        } else {
            table.order([2, 'asc']).draw();
        }
    });
    table.columns.adjust().draw();
});

$('.outOfNestBtn').on('click',function () {
    $(this).attr('disabled', 'disabled');
    let id = $(this).attr('id').substr(3);
    setNestlingOutOfNest(id)
});

function setNestlingOutOfNest(id) {
    $.get('/ajax/moveOutOfNest?id='+id,function (data) {
        alert('job Done');
        location.reload();
    });
    //
}

$('.setDeadBtn').on('click',function () {
    console.log($(this).attr('id'));
    let id = $(this).attr('id').substr(3);


    $('.nestBtn'+id).fadeToggle();


});

$('.returnDeadBtnNestTab').on('click',function () {
    console.log($(this).attr('id'));
    let id = $(this).attr('id').substr(3);

    $('.nestBtn'+id).fadeToggle();

});

$('.selectWhyDead').on('change',function () {
    let id = $(this).attr('id').substr(3);
    let val =$(this).val();
    if(confirm(Lang.get('alerts.frontend.confirm.whyDead')))updateNestling(id,val);
});

function updateNestling(id,val) {
    $.get('/ajax/setDead?id='+id+'&reason='+val,function (data) {
        location.reload()
    });
}