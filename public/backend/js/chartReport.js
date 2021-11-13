$(document).ready(function(){
    $('#frm_filter_report').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/filterReport',
            data: $('#frm_filter_report').serialize(),
            dataType: 'json',
            success: function(data){
                chartR.setData(data.chart);
                $('.pagination').hide();
                $('#data-invoice-report-show').removeData();
                $('#data-invoice-report-show').html(data.listinvoice);
            }
        })
    });
    function data30day()
    {
        $.ajax({
            type: 'GET',
            url: '/admin/data30day',
            dataType: 'json',
            success: function(data){
                chartR.setData(data.chart);
                $('.pagination').hide();
                $('#data-invoice-report-show').removeData();
                $('#data-invoice-report-show').html(data.listinvoice);
            },
            error: function(data){
                console.log(data);
            }
        })
    }
    data30day();

    var chartR = new Morris.Bar({
        element: 'bar-charts-report',
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