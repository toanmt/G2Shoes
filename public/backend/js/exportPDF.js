$(document).ready(function(){
    $('.btn-pdf').click(function(e){
        var id = $(this).data('id');
        var w = $('#invoice-'+id).width();
        var h = $('#invoice-'+id).height();
        html2canvas($('#invoice-'+id), {
            onrendered: function(canvas) {
                var imgData = canvas.toDataURL(
                    'image/png');              
                var doc = new jsPDF('l','pt',[w,h]);
                doc.addImage(imgData,'PNG',0,0,w,h);
                doc.save("hd-"+id+".pdf");
            }
          });
    });
});
