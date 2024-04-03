<script>
    function printDiv(divId) {
        var content = document.getElementById(divId).innerHTML;
        var printWindow = window.open('', '_blank');
        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print</title></head><body>' + content + '</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
</script>