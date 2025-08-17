$(function() {
	"use strict";
    const tableId = $('#datatable');

    const datatableForm = $("#datatableForm");
    /**
     *Server Side Datatable Records
    */
    window.loadDatatables = function() {
        //Delete previous data
        tableId.DataTable().destroy();

        var exportColumns = [1,2,3,4,5,6,7,8,9,10];//Index Starts from 0

        var table = tableId.DataTable({
            processing: true,
            serverSide: true,
            method:'get',
            ajax: {
                    url: baseURL+'/party/items-list',
                    data:{
                            party_id : $('#party_id').val(),
                        },
                },
            columns: [
                //{targets: 0, data:'id', orderable:true, visible:false},
                { data: 'id', name: 'id', orderable:false, className: 'item_id' },
                {
                    data: 'name',
                    render: function(data, type, full, meta) {
                        let item_location = full.item_location || '';
                        if (item_location != '') {
                            return data+ `<br><span class="badge text-primary bg-light-primary p-2 text-uppercase px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Location">
                                                ${item_location}
                                                <i class="fadeIn bx bx-sm bx-location-plus "></i></span>`;
                        }
                        return data;
                      }
                },
                {data: 'item_code', name: 'item_code'},
                {data: 'sku', name: 'sku', visible:itemSettings.sku==1?true:false, orderable: false,},
                {data: 'brand_name', name: 'brand_name', orderable: false,},
                {data: 'category_name', name: 'category_name', orderable: false,},
                {data: 'sale_price', name: 'sale_price', className: 'text-end'},
                {data: 'purchase_price', name: 'purchase_price', className: 'text-end'},
                {
                    data: 'customer_item_price',
                    orderable: false,
                    className: 'text-end editable',
                    render: function(data, type, full, meta) {
                        return `<span class="customer_item_price" data-item-id=" ${full.id}">${data}</span>`;
                    }
                },
                {data: 'current_stock', name: 'current_stock', className: 'text-left'},
                {data: 'username', name: 'username'},
                {data: 'created_at', name: 'created_at'}
            ],

            createdRow: function (row, data, dataIndex) {
                $('td:eq(0)', row).addClass('d-none'); 
            },
            headerCallback: function (thead, data, start, end, display) {
                $(thead).find('th').eq(0).addClass('d-none');
            },

            dom: "<'row' "+
                    "<'col-sm-12' "+
                        "<'float-start' l"+
                            /* card-body class - auto created here */
                        ">"+
                        "<'float-end' fr"+
                            /* card-body class - auto created here */
                        ">"+
                        "<'float-end ms-2'"+
                            "<'card-body ' B >"+
                        ">"+
                    ">"+
                  ">"+
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            buttons: [
                // Apply exportOptions only to Copy button
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: exportColumns
                    }
                },
                // Apply exportOptions only to Excel button
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: exportColumns
                    }
                },
                // Apply exportOptions only to CSV button
                {
                    extend: 'csvHtml5',
                    exportOptions: {
                        columns: exportColumns
                    }
                },
                // Apply exportOptions only to PDF button
                {
                    extend: 'pdfHtml5',
                    orientation: 'portrait',//or "landscape"
                    exportOptions: {
                        columns: exportColumns,
                    },
                },

            ],

            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            order: [[1, 'desc']]
        });

        table.on('click', '.deleteRequest', function () {
              let deleteId = $(this).attr('data-delete-id');

              deleteRequest(deleteId);

        });

        table.on('dblclick', '.editable', function () {
            let cell = table.cell(this);
            let rowData = table.row(this).data();
            let originalValue = cell.data();
            let itemId = $(this).closest('tr').find('.item_id').html();

            let $input = $('<input type="text" class="form-control form-control-sm"/>').val(originalValue);
            $(this).empty().append($input);
            $input.focus();

            // Save on Enter or blur
            $input.on('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    saveEdit();
                } else if (e.key === 'Escape') {
                    cell.data(originalValue);
                }
            });

            $input.on('blur', function () {
                saveEdit();
            });

            function saveEdit() {
                let newValue = $input.val();
                if (newValue === originalValue) {
                    cell.data(originalValue);
                    return;
                }

                // optimistic update
                cell.data(newValue);
                
                const form = datatableForm;
                const formArray = {
                    formId: form.attr("id"),
                    csrf: form.find('input[name="_token"]').val(),
                    _method: 'POST',
                    url: baseURL + '/party/update-price',
                    formObject : form,
                    formData: new FormData() // Create a new FormData object
                };
                // Append the 'id' to the FormData object
                formArray.formData.append('party_id', $('#party_id').val());
                formArray.formData.append('item_id', itemId);
                formArray.formData.append('item_customer_price', newValue);
                ajaxRequest(formArray);
            }
        });

        //Adding Space on top & bottom of the table attributes
        $('.dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate').wrap("<div class='card-body py-3'>");
    }
    
    /*tableId.find('tbody').on('dblclick', 'td.editable', function () {
        alert('ssssss');
        let cell = table.cell(this);
        let rowData = table.row(this).data();
        let field = table.column(this).dataSrc(); // "sale_price", "purchase_price", etc.
        let originalValue = cell.data();

        // create input
        let $input = $('<input type="text" class="form-control form-control-sm"/>').val(originalValue);
        $(this).empty().append($input);
        $input.focus();

        // Save on Enter or blur
        $input.on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                saveEdit();
            } else if (e.key === 'Escape') {
                cell.data(originalValue).draw();
            }
        });
        $input.on('blur', function () {
            saveEdit();
        });

        function saveEdit() {
            let newValue = $input.val();
            if (newValue === originalValue) {
                cell.data(originalValue).draw();
                return;
            }

            // optimistic update
            cell.data(newValue).draw();

            $.ajax({
                url: baseURL + '/party/items-update/' + rowData.id, // backend update route
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    field: field,
                    value: newValue
                },
                success: function (resp) {
                    // you can refresh or update rowData if backend returns canonical value
                    // table.row(cell.index().row).data(resp.item).draw(false);
                },
                error: function () {
                    alert('Failed to update. Restoring original value.');
                    cell.data(originalValue).draw();
                }
            });
        }
    });*/

    // Handle header checkbox click event
    tableId.find('thead').on('click', '.row-select', function() {
        var isChecked = $(this).prop('checked');
        tableId.find('tbody .row-select').prop('checked', isChecked);
    });

    /**
     * @return count
     * How many checkbox are checked
    */
   function countCheckedCheckbox(){
        var checkedCount = $('input[name="record_ids[]"]:checked').length;
        return checkedCount;
   }

   /**
    * Validate checkbox are checked
    */
   async function validateCheckedCheckbox(){
        const confirmed = await confirmAction();//Defined in ./common/common.js
        if (!confirmed) {
            return false;
        }
        if(countCheckedCheckbox() == 0){
            iziToast.error({title: 'Warning', layout: 2, message: "Please select at least one record to delete"});
            return false;
        }
        return true;
   }
    /**
     * Caller:
     * Function to single delete request
     * Call Delete Request
    */
    async function deleteRequest(id) {
        const confirmed = await confirmAction();//Defined in ./common/common.js
        if (confirmed) {
            deleteRecord(id);
        }
    }

    /**
     * Create Ajax Request:
     * Multiple Data Delete
    */
   async function requestDeleteRecords(){
        //validate checkbox count
        const confirmed = await confirmAction();//Defined in ./common/common.js
        if (confirmed) {
            //Submit delete records
            datatableForm.trigger('submit');
        }
   }
    datatableForm.on("submit", function(e) {
        e.preventDefault();

            //Form posting Functionality
            const form = $(this);
            const formArray = {
                formId: form.attr("id"),
                csrf: form.find('input[name="_token"]').val(),
                _method: form.find('input[name="_method"]').val(),
                url: form.closest('form').attr('action'),
                formObject : form,
                formData : new FormData(document.getElementById(form.attr("id"))),
            };
            ajaxRequest(formArray); //Defined in ./common/common.js

    });

    /**
     * Create AjaxRequest:
     * Single Data Delete
    */
    function deleteRecord(id){
        const form = datatableForm;
        const formArray = {
            formId: form.attr("id"),
            csrf: form.find('input[name="_token"]').val(),
            _method: form.find('input[name="_method"]').val(),
            url: form.closest('form').attr('action'),
            formObject : form,
            formData: new FormData() // Create a new FormData object
        };
        // Append the 'id' to the FormData object
        formArray.formData.append('record_ids[]', id);
        ajaxRequest(formArray); //Defined in ./common/common.js
    }

    function afterSeccessOfAjaxRequest(formObject, response){
        
    }

    /**
    * Ajax Request
    */
    function ajaxRequest(formArray){
        var jqxhr = $.ajax({
            type: formArray._method,
            url: formArray.url,
            data: formArray.formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': formArray.csrf
            },
            beforeSend: function() {
                // Actions to be performed before sending the AJAX request
                if (typeof beforeCallAjaxRequest === 'function') {
                    // Action Before Proceeding request
                }
            },
        });
        jqxhr.done(function(response) {
            iziToast.success({title: 'Success', layout: 2, message: response.message});
            if (typeof afterSeccessOfAjaxRequest === 'function') {
                afterSeccessOfAjaxRequest(formArray.formObject, response);
            }
        });
        jqxhr.fail(function(response) {
                var message = response.responseJSON.message;
                iziToast.error({title: 'Error', layout: 2, message: message});
        });
        jqxhr.always(function() {
            // Actions to be performed after the AJAX request is completed, regardless of success or failure
            if (typeof afterCallAjaxResponse === 'function') {
                afterCallAjaxResponse(formArray.formObject);
            }
        });
    }

    function afterCallAjaxResponse(formObject){
        loadDatatables();


    }

    $(document).ready(function() {
        //Load Datatable
        loadDatatables();

        /**
         * Modal payment type, reinitiate initSelect2PaymentType() for modal
         * Call because modal won't support ajax search input box cursor.
         * by this code it works
         * */
        initSelect2PaymentType({ dropdownParent: $('#invoicePaymentModal') });
	} );

    $(document).on("change", '#party_id, #user_id, input[name="from_date"], input[name="to_date"]', function function_name(e) {
        loadDatatables();
    });

});
