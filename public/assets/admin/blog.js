document.querySelectorAll('.delete-blog-btn').forEach(button => {
    button.onclick = function (e) {
        e.preventDefault();
        const form = this.closest('.delete-blog-form');

        Swal.fire({
            title: 'Emin misiniz?',
            text: "Bu blog silinecek!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Evet, Sil!',
            cancelButtonText: 'İptal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    };
});

$(document).on('change', '.activeBlog', function () {
    var id = $(this).attr("id");
    var status = $(this).is(':checked') ? '1' : '0';

    $.ajax({
        method: "POST",
        url: 'blog/active/status',
        data: {
            id: id,
            status: status,
            _token: $('input[name="_token"]').val() // Direkt inputtan alıyoruz
        },
        dataType: "JSON",
        success: function (response) {
            if (response.success) {
                Swal.fire({
                    title: 'Başarılı!',
                    text: response.message,
                    icon: 'success',
                    timer: 2000
                }).then(() => {
                    window.location.reload();
                });
            } else {
                Swal.fire('Hata', response.message, 'error');
            }
        },
        error: function () {
            Swal.fire('Sistem Hatası', 'İşlem gerçekleştirilemedi.', 'error');
        }
    });
});

document.getElementById('blogForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let form = this;
    let formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            'Accept': 'application/json'
        },
        body: formData
    })
        .then(async response => {
            if (!response.ok) {
                const data = await response.json();
                throw data;
            }
            return response.json();
        })
        .then(data => {
            document.getElementById('formErrors').innerHTML =
                `<div class="alert alert-success">${data.message}</div>`;
            form.reset();
        })
        .catch(error => {
            let errorsHtml = '<div class="alert alert-danger"><ul>';
            for (let key in error.errors) {
                error.errors[key].forEach(msg => {
                    errorsHtml += `<li>${msg}</li>`;
                });
            }
            errorsHtml += '</ul></div>';

            document.getElementById('formErrors').innerHTML = errorsHtml;
        });
});

$('.sefTitle').keyup(function (event) {
    var title = $("#sef-title").val();
    var kucukCumle = title.toLowerCase();
    const chars = {
        'ş': 's',
        'Ş': 's',
        'ı': 'i',
        'İ': 'i',
        'ğ': 'g',
        'Ğ': 'g',
        'ü': 'u',
        'Ü': 'u',
        'Ö': 'o',
        'ö': 'o',
        'Ç': 'c',
        'ç': 'c',
    };
    kucukCumle = kucukCumle.replace(/ /g, "-");
    kucukCumle = kucukCumle.replace(/[şŞıİğĞüÜÖöÇç]/g, m => chars[m]);
    kucukCumle = kucukCumle.replace(/[?,/&]/g, "-");
    var seflink_language = "seflink";
    document.getElementById(seflink_language).value = kucukCumle;
});


