<script>

$(document).ready(function() {
    // Function to calculate total based on price and quantity
    function calculateTotal() {
        var price = parseFloat($(this).closest('tr').find('.price').val());
        var quantity = parseFloat($(this).closest('tr').find('.quantity').val());
        var total = price * quantity;
        $(this).closest('tr').find('.total').val(total.toFixed(0)); // Limit to 0 decimal places
        
        // Calculate total price for all rows
        var totalPrice = 0;
        $('.total').each(function() {
            totalPrice += parseFloat($(this).val());
        });
        $('.total-price').val(totalPrice.toFixed(0)); // Limit to 0 decimal places
    }

    // Calculate total on change of price or quantity
    $(document).on('input', '.price, .quantity', calculateTotal);

    // Change unit and price based on selected product
    $(document).on('change', '.product-select', function() {
        var selectedOption = $(this).find('option:selected');
        var unit = selectedOption.data('unit');
        var price = selectedOption.data('price');
        $(this).closest('tr').find('.unit').val(unit);
        $(this).closest('tr').find('.price').val(price);
        calculateTotal.call(this); // Recalculate total
    });

    // Add row
    $(document).on('click', '.add-row', function() {
        var newRow = '<tr>' +
            '<td>' +
            '<select name="select[]" class="form-control product-select">' +
            '<?php foreach ($products as $product): ?>' +
            '<option value="<?php echo $product->id; ?>" data-unit="<?php echo $product->unit; ?>" data-price="<?php echo $product->price; ?>"><?php echo $product->product_name; ?></option>' +
            '<?php endforeach; ?>' +
            '</select>' +
            '</td>' +
            '<td width="10%">' +
            '<input type="number" name="quantity[]" value="1" class="form-control quantity">' +
            '</td>' +
            '<td width="20%">' +
            '<div><input type="number" name="price[]" class="form-control price"></div>' +
            '</td>' +
            '<td width="20%">' +
            '<div><input type="number" name="total[]" class="form-control total" readonly></div>' +
            '</td>' +
            '<td width="5%">' +
            '<button type="button" class="btn btn-danger btn-sm delete-row">Delete</button>' +
            '</td>' +
            '</tr>';
        $('#po-table tbody').append(newRow);
    });

    // Delete row
    $(document).on('click', '.delete-row', function() {
        $(this).closest('tr').remove();
        calculateTotal.call(this); // Recalculate total
    });
});

$("#addPOForm").submit(function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        url: "<?php echo base_url('purchase-orders/save'); ?>",
        type: 'POST',
        data: formData,
        success: function(response) {
            // console.log(response);
            // location to purchase-orders url
            window.location.href = "<?php echo base_url('purchase-orders'); ?>";
        }
    });
});
    
</script>
