
var countries = [];
$('[name="destFrom"]').find('option').each(function(){
    if($(this).attr('value')!='Country of departure'&&$(this).attr('value')!='? object:null ?'&&$(this).attr('value')!='placeholder'){
        countries.push($(this).attr('value'));
    }
});


var sleep = 0;
var sleepTime = 1;

var first = '';
var second = '';
var urls = [];
var countCountry=0;
var output = [];

$.each(countries, function(k,v){
    first = v;

    $.each(countries, function(kk,vv){
        second = vv;
        urls.push(first+'/'+second);
        console.log(urls);
    });
});

$.each(urls, function(i, url){

    setTimeout(function(){
        // Check route
        console.log('Checking '+url);
        window.location.replace('http://stage2.wktransportservices.com/freightsTool/fr/#!/search/'+url);

        var route = url;
        var count = 0;
        var possibleError = 'no';
        setTimeout(function(){
            if($('.wrapperTitle h1').length){
                count = $('.wrapperTitle p').text().match(/\d+/)[0];
                if(count==0){
                    possibleError = 'check XHR requests';
                }
            } else {
                possibleError = 'yes';
            }

            console.log(route, count, possibleError);

            output.push({
                'route': route,
                'count': count,
                'possibleError': possibleError
            });
            countCountry++;
            console.log(countCountry);

        }, (sleepTime/2));
    }, sleep);

    sleep = sleep + sleepTime;

});

//after Check dconvert and Download Csv.

    console.log(output);

    downloadCSV('test');


    function convertArrayOfObjectsToCSV(args) {
    var result, ctr, keys, columnDelimiter, lineDelimiter, data;

    data = args.data || null;
    if (data == null || !data.length) {
    return null;
}

    columnDelimiter = args.columnDelimiter || ',';
    lineDelimiter = args.lineDelimiter || '\n';

    keys = Object.keys(data[0]);

    result = '';
    result += keys.join(columnDelimiter);
    result += lineDelimiter;

    data.forEach(function(item) {
    ctr = 0;
    keys.forEach(function(key) {
    if (ctr > 0) result += columnDelimiter;

    result += item[key];
    ctr++;
});
    result += lineDelimiter;
});

    return result;
}



    function downloadCSV(args) {
    var data, filename, link;

    var csv = convertArrayOfObjectsToCSV({
    data: output
});
    if (csv == null) return;

    filename = args.filename || 'export.csv';

    if (!csv.match(/^data:text\/csv/i)) {
    csv = 'data:text/csv;charset=utf-8,' + csv;
}
    data = encodeURI(csv);

    link = document.createElement('X');
    link.setAttribute('href', data);
    link.setAttribute('download', filename);
    link.click();
}

