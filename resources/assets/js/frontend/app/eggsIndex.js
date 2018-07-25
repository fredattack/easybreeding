

$(document).ready(function () {
      console.log('indexEggs');

    let table = $('#eggsTable').DataTable({
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
        "autoWidth": true,

        "columnDefs": [
            {"visible": false, "targets": [1,2]},
            {"orderable": false, "targets": [0,1,4,6,7]},
             // { "width": "5%", "targets": 0 },
             // { "width": "5%", "targets": 1 },
             // { "width": "5%", "targets": 2 },
             // { "width": "15%", "targets": 3 },
             // { "width": "10%", "targets": 4 },
             // { "width": "10%", "targets": 5 },
             // { "width": "25%", "targets": 6 },
             // { "width": "25%", "targets": 7 },
            // {"visible":false, "targets" : },
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
   //  $('#eggsTable tbody').on('click', 'tr.group', function() {
   //      var currentOrder = table.order()[0];
   //      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
   //          table.order([2, 'desc']).draw();
   //      } else {
   //          table.order([2, 'asc']).draw();
   //      }
   //  });
   //  table.columns.adjust().draw();
});

$("#newEggModal").on("hidden.bs.modal", function () {
    // put your default event here
    $('#addEgg').trigger("reset");
});

$('#btnCloseNewEggModal').on('click',function () {
   $('#newEggModal').modal("hide");
   $('#addEgg').trigger("reset");
});

 $('#newEggModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);// Button that triggered the modal
        let idCouple = button.val(); // Extract info from data-* attributes
        console.log('alert: '+ idCouple);
         $('#idCouple').text(idCouple);
         $('#idCoupleHidden').val(idCouple);
 });

 $('#btnAddEgg').on('click',function () {
     alert('click');
     $('.idCoupleGroupe').toggle();
     $('.selectCoupleGroupe').toggle();
     $('#selectCouple').prop('required',);
 });

 $('#selectCouple').on('change',function () {
     console.log('select',$(this).val());
     $('#idCoupleHidden').val($(this).val());
 });

 $('.fertControlCheck').on('click',function () {
    let id = $(this).attr('id').substr(3);
    console.log(id);
    $('#fcg'+id).toggle();
    $('#ses'+id).toggle();
    $('#set'+id).toggle();
 });

 $(".returnFertBtnEggTab").click(function() {
   let id = $(this).attr('id').substr(3);
    console.log('this: ',id);
    $('#fcg'+id).toggle();
    $('#ses'+id).toggle();
    $('#set'+id).toggle();
});

 $("button[name='fertCheck']").click(function() {
   let id = $(this).attr('id').substr(3);
    console.log('this: ',id);
    $('#ffc'+id).toggle();
    $('#sec'+id).toggle();
    $('#seb'+id).toggle();
});

 $(".returnFertBtnEggCard").click(function() {
   let id = $(this).attr('id').substr(3);
    console.log('this: ',id);
    $('#ffc'+id).toggle();
    $('#sec'+id).toggle();
    $('#seb'+id).toggle();
});



 $("button[name='hatchNotCheck']").click(function() {
   let id = $(this).attr('id').substr(3);
    console.log('this: ',id);
    $('#bnc'+id).toggle();
    $('#bhc'+id).toggle();
    $('#swc'+id).toggle();
    $('#swb'+id).toggle();
});

 $('.returnHatBtnEggCard').on('click',function () {
     let id = $(this).attr('id').substr(3);
    console.log('return: ',id);
    $('#bnc'+id).toggle();
    $('#bhc'+id).toggle();
    $('#swb'+id).toggle();
    $('#swc'+id).toggle();
 });

 $('.selectEggfertility').on('change',function () {
     let id = $(this).attr('id').substr(3);
     let val =$(this).val();
     updateFertility(id,val);
 });

function updateFertility(id,data) {
    if(confirm(Lang.get('alerts.frontend.confirm.fecundity')+Lang.get('labels.frontend.eggs.'+data))){
         $.get('/ajax/setFertility?id='+id+'&val='+data,function (res) {
        console.log(res);
        location.reload();
    });
    }
}

 $('.birdHatchedCheck').on('click',function () {
    let id = $(this).attr('id').substr(3);
    console.log(id);
    updateHatching(id,'hatched');
 });

 $('.birdNotHatchedCheck').on('click',function () {
    let id = $(this).attr('id').substr(3);
    console.log(id);
    $('#bnh'+id).toggle();
    $('#bhd'+id).toggle();
    $('#swn'+id).toggle();
    $('#sss'+id).toggle();
 });

 $('.returnhatchBtnEggTab').on('click',function () {
     let id = $(this).attr('id').substr(3);
    console.log('return: ',id);
    $('#bnh'+id).toggle();
    $('#bhd'+id).toggle();
    $('#swn'+id).toggle();
    $('#sss'+id).toggle();
 });

 $('.selectWhyNotHatched').on('change',function () {
     let id = $(this).attr('id').substr(3);
     let val =$(this).val();
     updateHatching(id,val);
 });

function updateHatching(id,data) {
    if(confirm(Lang.get('alerts.frontend.confirm.fecundity')+Lang.get('labels.frontend.eggs.'+data))){
         $.get('/ajax/updateHatching?id='+id+'&val='+data,function (res) {
        console.log(res);
        location.reload();
    });
    }
}




