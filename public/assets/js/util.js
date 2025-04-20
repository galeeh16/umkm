function ajaxGet(url, payload) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            data: payload,
            beforeSend: function() {
            },
            success: function (data) {
                resolve(data);
            },
            error: function (error) {
                reject(error);
            },
        });
    });
}

function ajaxPost(url, payload) {
    return new Promise((resolve, reject) => {
        $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            data: payload,
            beforeSend: function() {
            },
            success: function (data) {
                resolve(data);
            },
            error: function (error) {
                reject(error);
            },
        });
    });
}

function formatRupiah(number) {
    let formatNumbering = new Intl.NumberFormat("id-ID", {minimumFractionDigits: 0});
    return formatNumbering.format(number)
}

function formatDateTime(isoString) {
    // Buat objek Date dari string ISO
    const date = new Date(isoString);

    // Ambil komponen tanggal
    const day = date.getDate().toString().padStart(2, '0'); // Hari (DD)
    const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Bulan (MM), +1 karena getMonth dimulai dari 0
    const year = date.getFullYear(); // Tahun (YYYY)

    // Ambil komponen waktu
    const hours = date.getHours().toString().padStart(2, '0'); // Jam (HH)
    const minutes = date.getMinutes().toString().padStart(2, '0'); // Menit (mm)

    // Gabungkan dalam format DD-MM-YYYY HH:mm
    return `${day}-${month}-${year} ${hours}:${minutes}`;
}