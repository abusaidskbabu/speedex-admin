var manageOrderTable;

$(document).ready(function() {

    var divRequest = $(".div-request").text();

    // top nav bar
    $("#navOrder").addClass('active');

    if(divRequest == 'add')  {
        // add order
        // top nav child bar
        $('#topNavAddOrder').addClass('active');

        // order date picker
        $("#orderDate").datepicker();

        // create order form function
        $("#createOrderForm").unbind('submit').bind('submit', function() {
            var form = $(this);

            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('.text-danger').remove();

            var orderDate = $("#orderDate").val();
            var clientName = $("#clientName").val();
            var clientContact = $("#clientContact").val();
            var paid = $("#paid").val();
            var discount = $("#discount").val();
            var paymentType = $("#paymentType").val();
            var paymentStatus = $("#paymentStatus").val();

            // form validation
            if(orderDate == "") {
                $("#orderDate").after('<p class="text-danger"> The Order Date field is required </p>');
                $('#orderDate').closest('.form-group').addClass('has-error');
            } else {
                $('#orderDate').closest('.form-group').addClass('has-success');
            } // /else

            if(clientName == "") {
                $("#clientName").after('<p class="text-danger"> The Client Name field is required </p>');
                $('#clientName').closest('.form-group').addClass('has-error');
            } else {
                $('#clientName').closest('.form-group').addClass('has-success');
            } // /else

            if(clientContact == "") {
                $("#clientContact").after('<p class="text-danger"> The Contact field is required </p>');
                $('#clientContact').closest('.form-group').addClass('has-error');
            } else {
                $('#clientContact').closest('.form-group').addClass('has-success');
            } // /else

            if(paid == "") {
                $("#paid").after('<p class="text-danger"> The Paid field is required </p>');
                $('#paid').closest('.form-group').addClass('has-error');
            } else {
                $('#paid').closest('.form-group').addClass('has-success');
            } // /else

            if(discount == "") {
                $("#discount").after('<p class="text-danger"> The Discount field is required </p>');
                $('#discount').closest('.form-group').addClass('has-error');
            } else {
                $('#discount').closest('.form-group').addClass('has-success');
            } // /else

            if(paymentType == "") {
                $("#paymentType").after('<p class="text-danger"> The Payment Type field is required </p>');
                $('#paymentType').closest('.form-group').addClass('has-error');
            } else {
                $('#paymentType').closest('.form-group').addClass('has-success');
            } // /else

            if(paymentStatus == "") {
                $("#paymentStatus").after('<p class="text-danger"> The Payment Status field is required </p>');
                $('#paymentStatus').closest('.form-group').addClass('has-error');
            } else {
                $('#paymentStatus').closest('.form-group').addClass('has-success');
            } // /else


            // array validation
            var productName = document.getElementsByName('productName[]');
            var validateProduct;
            for (var x = 0; x < productName.length; x++) {
                var productNameId = productName[x].id;
                if(productName[x].value == ''){
                    $("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
                    $("#"+productNameId+"").closest('.form-group').addClass('has-error');
                } else {
                    $("#"+productNameId+"").closest('.form-group').addClass('has-success');
                }
            } // for

            for (var x = 0; x < productName.length; x++) {
                if(productName[x].value){
                    validateProduct = true;
                } else {
                    validateProduct = false;
                }
            } // for

            var quantity = document.getElementsByName('quantity[]');
            var validateQuantity;
            for (var x = 0; x < quantity.length; x++) {
                var quantityId = quantity[x].id;
                if(quantity[x].value == ''){
                    $("#"+quantityId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
                    $("#"+quantityId+"").closest('.form-group').addClass('has-error');
                } else {
                    $("#"+quantityId+"").closest('.form-group').addClass('has-success');
                }
            }  // for

            for (var x = 0; x < quantity.length; x++) {
                if(quantity[x].value){
                    validateQuantity = true;
                } else {
                    validateQuantity = false;
                }
            } // for


            if(orderDate && clientName && clientContact && paid && discount && paymentType && paymentStatus) {
                if(validateProduct == true && validateQuantity == true) {
                    // create order button
                    // $("#createOrderBtn").button('loading');

                    $.ajax({
                        url : form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success:function(response) {
                            console.log(response);
                            // reset button
                            $("#createOrderBtn").button('reset');

                            $(".text-danger").remove();
                            $('.form-group').removeClass('has-error').removeClass('has-success');

                            if(response.success == true) {

                                // create order button
                                $(".success-messages").html('<div class="alert alert-success">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                    ' <br /> <br /> <a type="button" onclick="printOrder('+response.order_id+')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print </a>'+
                                    '<a href="orders.php?o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Order </a>'+

                                    '</div>');

                                $("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

                                // disabled te modal footer button
                                $(".submitButtonFooter").addClass('div-hide');
                                // remove the product row
                                $(".removeProductRowBtn").addClass('div-hide');

                            } else {
                                alert(response.messages);
                            }
                        } // /response
                    }); // /ajax
                } // if array validate is true
            } // /if field validate is true


            return false;
        }); // /create order form function

    } else if(divRequest == 'manord') {
        // top nav child bar
        $('#topNavManageOrder').addClass('active');

        manageOrderTable = $("#manageOrderTable").DataTable({
            'ajax': 'php_action/fetchOrder.php',
            'order': []
        });

    } else if(divRequest == 'editOrd') {
        $("#orderDate").datepicker();

        // edit order form function
        $("#editOrderForm").unbind('submit').bind('submit', function() {
            // alert('ok');
            var form = $(this);

            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('.text-danger').remove();

            var orderDate = $("#orderDate").val();
            var clientName = $("#clientName").val();
            var clientContact = $("#clientContact").val();
            var paid = $("#paid").val();
            var discount = $("#discount").val();
            var paymentType = $("#paymentType").val();
            var paymentStatus = $("#paymentStatus").val();

            // form validation
            if(orderDate == "") {
                $("#orderDate").after('<p class="text-danger"> The Order Date field is required </p>');
                $('#orderDate').closest('.form-group').addClass('has-error');
            } else {
                $('#orderDate').closest('.form-group').addClass('has-success');
            } // /else

            if(clientName == "") {
                $("#clientName").after('<p class="text-danger"> The Client Name field is required </p>');
                $('#clientName').closest('.form-group').addClass('has-error');
            } else {
                $('#clientName').closest('.form-group').addClass('has-success');
            } // /else

            if(clientContact == "") {
                $("#clientContact").after('<p class="text-danger"> The Contact field is required </p>');
                $('#clientContact').closest('.form-group').addClass('has-error');
            } else {
                $('#clientContact').closest('.form-group').addClass('has-success');
            } // /else

            if(paid == "") {
                $("#paid").after('<p class="text-danger"> The Paid field is required </p>');
                $('#paid').closest('.form-group').addClass('has-error');
            } else {
                $('#paid').closest('.form-group').addClass('has-success');
            } // /else

            if(discount == "") {
                $("#discount").after('<p class="text-danger"> The Discount field is required </p>');
                $('#discount').closest('.form-group').addClass('has-error');
            } else {
                $('#discount').closest('.form-group').addClass('has-success');
            } // /else

            if(paymentType == "") {
                $("#paymentType").after('<p class="text-danger"> The Payment Type field is required </p>');
                $('#paymentType').closest('.form-group').addClass('has-error');
            } else {
                $('#paymentType').closest('.form-group').addClass('has-success');
            } // /else

            if(paymentStatus == "") {
                $("#paymentStatus").after('<p class="text-danger"> The Payment Status field is required </p>');
                $('#paymentStatus').closest('.form-group').addClass('has-error');
            } else {
                $('#paymentStatus').closest('.form-group').addClass('has-success');
            } // /else


            // array validation
            var productName = document.getElementsByName('productName[]');
            var validateProduct;
            for (var x = 0; x < productName.length; x++) {
                var productNameId = productName[x].id;
                if(productName[x].value == ''){
                    $("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
                    $("#"+productNameId+"").closest('.form-group').addClass('has-error');
                } else {
                    $("#"+productNameId+"").closest('.form-group').addClass('has-success');
                }
            } // for

            for (var x = 0; x < productName.length; x++) {
                if(productName[x].value){
                    validateProduct = true;
                } else {
                    validateProduct = false;
                }
            } // for

            var quantity = document.getElementsByName('quantity[]');
            var validateQuantity;
            for (var x = 0; x < quantity.length; x++) {
                var quantityId = quantity[x].id;
                if(quantity[x].value == ''){
                    $("#"+quantityId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
                    $("#"+quantityId+"").closest('.form-group').addClass('has-error');
                } else {
                    $("#"+quantityId+"").closest('.form-group').addClass('has-success');
                }
            }  // for

            for (var x = 0; x < quantity.length; x++) {
                if(quantity[x].value){
                    validateQuantity = true;
                } else {
                    validateQuantity = false;
                }
            } // for


            if(orderDate && clientName && clientContact && paid && discount && paymentType && paymentStatus) {
                if(validateProduct == true && validateQuantity == true) {
                    // create order button
                    // $("#createOrderBtn").button('loading');

                    $.ajax({
                        url : form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success:function(response) {
                            console.log(response);
                            // reset button
                            $("#editOrderBtn").button('reset');

                            $(".text-danger").remove();
                            $('.form-group').removeClass('has-error').removeClass('has-success');

                            if(response.success == true) {

                                // create order button
                                $(".success-messages").html('<div class="alert alert-success">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                    '</div>');

                                $("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

                                // disabled te modal footer button
                                $(".editButtonFooter").addClass('div-hide');
                                // remove the product row
                                $(".removeProductRowBtn").addClass('div-hide');

                            } else {
                                alert(response.messages);
                            }
                        } // /response
                    }); // /ajax
                } // if array validate is true
            } // /if field validate is true


            return false;
        }); // /edit order form function
    }

}); // /documernt


// print order function
function printOrder(orderId = null) {
    if(orderId) {

        $.ajax({
            url: 'php_action/printOrder.php',
            type: 'post',
            data: {orderId: orderId},
            dataType: 'text',
            success:function(response) {

                var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
                mywindow.document.write('<html><head><title>Order Invoice</title>');
                mywindow.document.write('</head><body>');
                mywindow.document.write(response);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10

                mywindow.print();
                mywindow.close();

            }// /success function
        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function

function addRow() {
    $("#addRowBtn").button("loading");

    var tableLength = $("#productTable tbody tr").length;

    var tableRow;
    var arrayNumber;
    var count;

    if(tableLength > 0) {
        tableRow = $("#productTable tbody tr:last").attr('id');
        arrayNumber = $("#productTable tbody tr:last").attr('class');
        count = tableRow.substring(3);
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;
    } else {
        // no table row
        count = 1;
        arrayNumber = 0;
    }

    // $.ajax({
    //     url: 'php_action/fetchProductData.php',
    //     type: 'post',
    //     dataType: 'json',
    //     success:function(response) {
            $("#addRowBtn").button("reset");

            var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+
                '<td>'+
                '<div class="form-group">'+
                count;
            
            tr += '</div>'+
                '</td>'+
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input type="Date" name="payment_date[]" id="payment_date'+count+'" class="form-control" required placeholder="Date"/>'+
                    '</div>'+
                '</td>'+
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input type="text" min="0" name="awb[]" id="awb'+count+'" autocomplete="off" class="form-control" required placeholder="Awb #"/>'+
                    '</div>'+
                '</td>'+
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input type="text"  name="dest[]" id="dest'+count+'" autocomplete="off" class="form-control" required placeholder="Dest"/>'+
                    '</div>'+
                '</td>'+
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input type="text"  name="dox_spx[]" id="dox_spx'+count+'" class="form-control" autocomplete="off" required placeholder="Dox / Spx"/>'+
                    '</div>'+
                '</td>'+
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input data-parsley-type="number" type="text"  name="weight[]" id="weight'+count+'" class="form-control" autocomplete="off" required placeholder="Weight"/>'+
                    '</div>'+
                '</td>'+
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input type="text"  name="amount[]" id="amount'+count+'" onkeyup="getTotal('+count+')" class="form-control" autocomplete="off" required placeholder="Amount U.S.$"/>'+
                    '</div>'+
                '</td>'+
                
                '<td style="">'+
                    '<div class="form-group">'+
                        '<input type="text"   name="remarks[]" id="remarks'+count+'" class="form-control" autocomplete="off" placeholder="Remarks"/>'+
                    '</div>'+
                '</td>'+
                '<td>'+
                    '<button class="btn btn-danger removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow('+count+')"><i class="mdi mdi-close-circle"></i></button>'+
                '</td>'+
                '</tr>';
            if(tableLength > 0) {
                $("#productTable tbody tr:last").after(tr);
            } else {
                $("#productTable tbody").append(tr);
            }

    //     } // /success
    // });	// get the product data

} // /add row

function removeProductRow(row = null) {
    if(row) {
        $("#row"+row).remove();
    } else {
        alert('error! Refresh the page again');
    }
    
}


// table total
function getTotal(row = null) {
    
    if(row) {
        var tableProductLength = $("#productTable tbody tr").length;
        var totalSubAmount = 0;
        var totalQty = 0;
        for(x = 0; x < tableProductLength; x++) {
            var tr = $("#productTable tbody tr")[x];
            var count = $(tr).attr('id');
            count = count.substring(3);

            totalSubAmount = Number(totalSubAmount) + Number($("#amount"+count).val());

        } // /for

        totalSubAmount = totalSubAmount.toFixed(2);

        // sub total
        $("#total").val(totalSubAmount);

        $("#fuelCharge").val('0');
        $("#rate").val('0');
        $("#afterFuelCharge").val('0');
        $("#ttlus").val('0');
        $("#rate").val('0');
        $("#bdt").val('0');
        
    } else {
        alert('no row !! please refresh the page');
    }
}



