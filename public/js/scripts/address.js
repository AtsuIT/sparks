(function ($, DataTable) {
    $.extend(true, DataTable.defaults, {
        pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
        language: {
            url : '/dataTables/lang/'+lang+'.json'
        }
    });
})(jQuery, jQuery.fn.dataTable);
var address = $('.table-address').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/address",
    columns: [
        {data: null,
            searchable: false,
            sortable: false,
            "render": function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
        {data: 'title', name: 'title'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        {data: 'phone', name: 'phone'},
        {data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        }
    ],
    'address': []
});
$(document).on("click",".sa-warning" , function(e) {
    var form =  $(this).closest("form");
    e.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        confirmButtonClass: 'btn btn-success mt-2',
        cancelButtonClass: 'btn btn-danger ms-2 mt-2',
        buttonsStyling: false
    }).then(function (result) {
        if (result.value) {
            Swal.fire({
            title: 'Deleted!',
            text: 'Your address has been deleted.',
            icon: 'success',
            confirmButtonColor: '#776acf',
            })
            setTimeout(form.submit(), 10000);
        } else if (
            // Read more about handling dismissals
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire({
            title: 'Cancelled',
            text: 'Your address is safe :)',
            icon: 'error',
            confirmButtonColor: '#776acf',
            })
        }
    });
});