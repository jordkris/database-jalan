let main_url = localStorage.getItem('base_url');

$('#flash-message').click(() => {
    let url = main_url + "auth/session_destroy";
    $.ajax({
        url: url,
        method: 'get',
        success: () => {
            console.log('Notifikasi berhasil terhapus');
            $('div.alert').remove();
        },
        error: (e) => {
            console.log(url);
            console.log(e);
        }
    });
});