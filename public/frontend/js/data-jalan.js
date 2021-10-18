var main_url_dj = localStorage.getItem('base_url');

$.fn.dataTable.ext.search.push(
    function(settings, data, index, rowData, counter) {
        var kategori_jalan = $('#kategori-jalan').val();
        var flag = false;
        if (kategori_jalan == 'all' || kategori_jalan == rowData['kategori_jalan']) {
            flag = true;
        }
        return flag;
    }
);

var tdj = $('#tabel-jalan').DataTable({
    dom: "<'row'<'col-md-4'l><'col-md-4 text-left'B><'col-md-4'f>>" +
        "<'row'<'col-md-12'tr>>" +
        "<'row'<'col-md-5'i><'col-md-7'p>>",
    lengthMenu: [
        [10, 25, 50, -1],
        ['10 rows', '25 rows', '50 rows', 'Show all']
    ],
    "ajax": {
        "url": main_url_dj + 'api/getDataJalan',
        "type": "GET",
        "dataSrc": (result) => { return result },
        error: (err) => { console.log(err); }
    },
    "columns": [
        { "data": null, "class": "tbl-center" },
        {
            "data": "nomor_ruas",
            "class": "tbl-center",
        },
        {
            "data": "nama_pangkal_ruas",
            "class": "tbl-center",
            "render": (data, type, row, meta) => {
                return `<a href="${main_url_dj}data_jalan/detail/${row['id']}" target="_blank" style="text-decoration: underline !important;color:#00aeef;">${data} - ${row['nama_ujung_ruas']}</a>`;
            }
        },
        {
            "data": "titik_pengenal_ruas",
            "class": "tbl-center",
            "render": (data, type, row, meta) => {
                return `${data} - ${row['titik_pengenal_ujung']}`;
            }
        },
        {
            "data": "panjang_ruas",
            "class": "tbl-center",
        },
        {
            "data": "lebar",
            "class": "tbl-center",
        },
        {
            "data": "kecamatan",
            "class": "tbl-center",
            "render": (data, type, row, meta) => {
                return data.join(", ");
            }
        },
    ],
    // "order": [
    //     [3, 'desc']
    // ],
});
tdj.on('order.dt search.dt', function() {
    tdj.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
        cell.innerHTML = i + 1;
        tdj.cell(cell).invalidate('dom');
    });
});

$('#kategori-jalan').change(function() {
    tdj.draw();
});


//form pengaduan
$("#submitBtn").attr("disabled", "disabled");
$('#terms').click(function() {
    if ($(this).is(":checked")) {
        $("#submitBtn").removeAttr("disabled");
    } else {
        $("#submitBtn").attr("disabled", "disabled");
    }
});