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
    ajax: "/address-aymakan",
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
    ],
    'address': []
});