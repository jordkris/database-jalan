var main_url_dp = localStorage.getItem('base_url');

var tdp = $('#tabel-penanganan').DataTable({
    dom: "<'row'<'col-md-4'l><'col-md-4 text-left'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>",
    lengthMenu: [
        [10, 25, 50, -1],
        ['10 rows', '25 rows', '50 rows', 'Show all']
    ],
    "ajax": {
        "url": main_url_dp + 'api/getDataPenanganan',
        "type": "GET",
        "dataSrc": (result) => { return result },
        error: (err) => { console.log(err); }
    },
    "columns": [
        { "data": null, "class": "tbl-center" },
        {
            "data": "jalan",
            "class": "tbl-center",
            "render": (data, type, row, meta) => {
                return `${data['nama_pangkal_ruas']} - ${data['nama_pangkal_ruas']}`;
            }
        },
        {
            "data": "paket_pekerjaan",
            "class": "tbl-center",
        },
        {
            "data": "sumber_dana",
            "class": "tbl-center",
        },
        {
            "data": "detail",
            "render": (data, type, row, meta) => {
                let list_render = '<ul>';
                data.forEach((val) => {
                    list_render += `<li>${val.tahun}</li>`;
                });
                list_render += '</ul>';
                return list_render;
            }
        },
    ],
    // "order": [
    //     [3, 'desc']
    // ],
});
tdp.on('order.dt search.dt', function() {
    tdp.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
        tdp.cell(cell).invalidate('dom');
    });
});