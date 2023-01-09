(function ($, DataTable) {
    $.extend(true, DataTable.defaults, {
        pageLength : 20,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'All']],
        language: {
            url : '/dataTables/lang/'+lang+'.json'
        }
    });
})(jQuery, jQuery.fn.dataTable);
var orders = $('.table-orders').DataTable({
    processing: true,
    serverSide: true,
    ajax: "/orders-aymakan",
    columns: [
        {data: null,
            searchable: false,
            sortable: false,
            "render": function (data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }},
        {data: 'tracking_number', name: 'tracking_number'},
        {data: 'reference', name: 'reference'},
        {data: 'uuid', name: 'uuid'},
        {data: 'customer_name', name: 'customer_name'},
        {data: 'status', name: 'status'},
    ],
    'order': []
});