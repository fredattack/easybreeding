 /********************************************
  * Description: initialize an http request for ajax load
  * Parameters: the route url
  * Return none
  *********************************************/

var get = function(url){
    return new Promise(function(resolve,reject){
        var xhr = new window.XMLHttpRequest();
        xhr.onreadystatechange=function(){
            if(xhr.readyState===4){
                if(xhr.status===200){
                    resolve(xhr.responseText);
                }
                else{
                    reject(xhr);
                }
            }
        };
        xhr.open('GET',url,true);
        xhr.send()
    })

};

 /********************************************
  * Description: call ajax with promise for get stats from server
  * Parameters: none
  * Return data (Array of Stats)
  *********************************************/

async function getStats() {
    try {
        let response = await fetch('/ajax/getStats');
        let data = await response.json();
        return await data;
    }
    catch(e) {
        console.log('Error!', e);
    }
}

 /********************************************
  * Description: call getStats() to get data stats on load and call methode to generate Charts
  * Parameters: none
  * Return none
  *********************************************/

let stats =getStats().then(function(result) {
     generateStatusChart(result.status);
     generateEggStats(result.eggs);
     generateLayingStats(result.laying);
 });

  /********************************************
   * Description: generate A pie Chart with birds status
   * Parameters: status (array of stats)
   * Return
   *********************************************/

function generateStatusChart(status) {
    $('.statusChart').sparkline([status.single, status.coupled, status.rest], {
        type: 'pie',
        height: '90',
        resize: true,
        sliceColors: ['#1cadbf', '#1f5f67', '#ffffff'],
        tooltipChartTitle: Lang.get('labels.frontend.birds.status'),
        tooltipFormat: '{{offset:offset}} ({{percent.1}}%)',
        tooltipValueLookups: {
            'offset': {
                0: Lang.get('labels.frontend.birds.single'),
                1: Lang.get('labels.frontend.birds.coupled'),
                2: Lang.get('labels.frontend.birds.rest')
            }
        }
    });
}

 /********************************************
  * Parameters: status (array of stats)
  * Return
  *********************************************/

function generateEggStats(stats){
    let statsEggs=[];
    let month=[];
    statsEggs=stats['0']
    month=stats['1'];

    var d = new Date();
    var n = d.getMonth();
    // console.log
    $('.eggStats').sparkline(statsEggs, {
        type: 'bar',
        width: '100%',
        height: '70',
        barWidth: '3',
        resize: true,
        barSpacing: '6',
        barColor: '#1f5f67',
        tooltipChartTitle: Lang.get('labels.frontend.birds.eggsStat'),
        tooltipFormat: '{{offset:offset}} = {{value}}',
        tooltipValueLookups: {
            'offset': {
                0: Lang.get('labels.frontend.date.months.'+month[0]),
                1: Lang.get('labels.frontend.date.months.'+month[1]),
                2: Lang.get('labels.frontend.date.months.'+month[2]),
                3: Lang.get('labels.frontend.date.months.'+month[3]),
                4: Lang.get('labels.frontend.date.months.'+month[4]),
                5: Lang.get('labels.frontend.date.months.'+month[5]),
                6: Lang.get('labels.frontend.date.months.'+month[6]),
                7: Lang.get('labels.frontend.date.months.'+month[7]),
                8: Lang.get('labels.frontend.date.months.'+month[8]),
                9: Lang.get('labels.frontend.date.months.'+month[9]),
                10: Lang.get('labels.frontend.date.months.'+month[10]),
                11: Lang.get('labels.frontend.date.months.'+month[11]),
            }
        }
    });

}

 /********************************************
  * Description: generate A bar Chart with nestlings stats
  * Parameters: status (array of stats)
  * Return
  *********************************************/

function generateLayingStats(stats){
    let statsLaying=[];
    let month=[];
    statsLaying=stats['0']
    month=stats['1'];

    console.log(typeof (statsLaying));
    var d = new Date();
    var n = d.getMonth();
    // console.log
    $('.layingStats').sparkline(statsLaying, {
        type: 'bar',
        width: '100%',
        height: '70',
        barWidth: '3',
        resize: true,
        barSpacing: '6',
        barColor: '#ffffff',
        tooltipChartTitle: Lang.get('labels.frontend.birds.layingStat'),
        tooltipFormat: '{{offset:offset}} = {{value}}',
        tooltipValueLookups: {
            'offset': {
                0: Lang.get('labels.frontend.date.months.'+month[0]),
                1: Lang.get('labels.frontend.date.months.'+month[1]),
                2: Lang.get('labels.frontend.date.months.'+month[2]),
                3: Lang.get('labels.frontend.date.months.'+month[3]),
                4: Lang.get('labels.frontend.date.months.'+month[4]),
                5: Lang.get('labels.frontend.date.months.'+month[5]),
                6: Lang.get('labels.frontend.date.months.'+month[6]),
                7: Lang.get('labels.frontend.date.months.'+month[7]),
                8: Lang.get('labels.frontend.date.months.'+month[8]),
                9: Lang.get('labels.frontend.date.months.'+month[9]),
                10: Lang.get('labels.frontend.date.months.'+month[10]),
                11: Lang.get('labels.frontend.date.months.'+month[11]),
            }
        }
    });

}

 /********************************************
  * Description: display create Task form on button click
  * Parameters: none
  * Return none
  *********************************************/

$('#newEventBtn').on('click',function () {
   $('.addEvent').fadeToggle();
    $('#newEventBtn').toggleClass('active');
    ($('#newEventBtn').hasClass('active'))? $('#newEventBtn').html("<i id='newEventIcon' class='fa fa-rotate-left'></i>" +
        Lang.get("labels.frontend.calendar.cancel")): $('#newEventBtn').html("<i id='newEventIcon' class='fa fa-plus'></i>"+Lang.get("labels.frontend.calendar.AddNewEvent"));
});

 /********************************************
  * Description: display create Category on button click
  * Parameters: none
  * Return
  *********************************************/

$('#addCategoryBtn').on('click',function () {
    displayNewCatGroup();
});

function displayNewCatGroup(){
    $('.categoryGroup').fadeToggle();
    $('#addGroupCat').toggleClass('addCatGroup addCatGroupFlex');
    $('#addCategoryIcon').toggleClass('fa-plus').toggleClass('fa-rotate-left');
    $('#categoryLabel').toggleClass('active');
    ($('#categoryLabel').hasClass('active'))? $('#categoryLabel').text(Lang.get("labels.frontend.calendar.AddNewCategory")):$('#categoryLabel').text(Lang.get("labels.frontend.calendar.chooseCategory"));
}

 /********************************************
  * Description: hide time inputs on allday checkBox check
  * Parameters: none
  * Return none
  *********************************************/

$('#allDay_checkbox').on('change',function () {
     $('.timeEvent').fadeToggle();
});

/********************************************
* Description: initialise the spectrum colorPicker
* Parameters: none
* Return none
*********************************************/

$("#full").spectrum({
 color: "#1976D2"
});

/********************************************
* Description: initialise datePicker
* Parameters: none
* Return none
*********************************************/

// Date Picker
jQuery('.startDate, .endDate').datepicker({
 format: 'dd/mm/yyyy',
 startDate:'-1d',
 weekStart:'1',
 // language:'fr'
});

/********************************************
* Description: initialise clockPicker
* Parameters: none
* Return none
*********************************************/

$('.timeEvent,#startTime,#endTime').clockpicker({
 placement: 'bottom',
 align: 'left',
 autoclose: true,
 'default': 'now'
});

/********************************************
* Description: click on new category Button
* Parameters: none
* Return none
*********************************************/
$('#saveCategory').on('click',function () {
    if($('#newCategoryInput').val()==null) $('.form-control-feedback').css('display','block');
    else {
        let color = $("#full").spectrum('get').toHexString();
        let title = $('#newCategoryInput').val();
        createCategory(title, color);
    }
});

/********************************************
    * Description: create category - sending to server with ajax
    * Parameters: title, val(color)
    * Return
    *********************************************/
function createCategory(title,val) {

  //remove the # from color to pass the query parameters in url
    let color = val.slice( 1 );

  $.get('/ajax/createCategory?title='+title+'&color='+color,function (data) {

      $('#categorySelect').empty().append('<option value="" selected disabled >'+Lang.get("labels.frontend.calendar.chooseCategory")+'</option>');

      $.each(data,function (index,category) {
          $('#categorySelect').append('<option value="'+category.id+'" style="color:'+category.color+'">&#xf192 '+category.title+'</option>');
      });
      displayNewCatGroup();

  });
}