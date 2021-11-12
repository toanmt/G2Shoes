$(document).ready(function(){
    function chartMonth()
    {
        $.ajax({
            type: 'GET',
            url: '/admin/chartMonth',
            dataType: 'json',
            success: function(data){
                chartM.setData(data);
            },
            error: function(data){
                console.log(data);

            }
        })
    }
    chartMonth();

    var chartM = new Morris.Bar({
        element: 'bar-charts',
        xkey: 'day',
        ykeys: ['Total'],
        labels: ['Total Income'],
        lineColors: ['#f43b48'],
        lineWidth: '3px',
        barColors: ['#f43b48'],
        resize: true,
        redraw: true
    });
});