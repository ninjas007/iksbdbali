// Array untuk menyimpan warna background untuk masing-masing tab
const tabColors = {
    "tabs-1": "#ffffff", // Warna untuk tab 1
    "tabs-2": "#d1e7dd", // Warna untuk tab 2
    "tabs-3": "lightblue"  // Warna untuk tab 3
};

// Fungsi untuk mengubah warna background cardForm
function changeCardBackgroundColor(tabId) {
    const cardForm = document.getElementById('cardForm');
    cardForm.style.backgroundColor = tabColors[tabId];
}

// Event listener untuk mengubah warna saat tab diklik
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    const target = $(e.target).attr("href").substring(1); // Dapatkan id tab yang dituju tanpa #
    changeCardBackgroundColor(target);
});

// mengecek status kawin untuk mengalihkan ke halaman pasangan
function toggleStatus(value) {
    if (value === 'Kawin') {
        $('#punyaPasangan').removeClass('hidden');
    } else {
        $('#punyaPasangan').addClass('hidden');
        $('#namaPasangan').val('');
    }
}

function loadStatus() {
    const status = ('#statusDiri').val();
    toggleStatus(status);
}


$('#punyaAnak').click(function() {
    $('[href="#tabs-3"]').tab('show');
});


$(document).ready(function () {
     // Tab 1 aktif secara default
    changeCardBackgroundColor('tabs-1');

    // check status tab ketika status terganti
    toggleTabsBasedOnStatus();
    
    $('#statusDiri').on('change', toggleTabsBasedOnStatus);
});

// menonaktifkan dan aktifkan tab ketika status terganti
function toggleTabsBasedOnStatus() {
    const status = $('#statusDiri').val();
    const tabs = document.querySelectorAll('.nav-link[data-toggle="tab"]');
    tabs.forEach(tab => {
        if (status === 'Kawin') {
            tab.classList.remove('disabled-tab');
        } else {
            if (tab.getAttribute('href') !== '#tabs-1') {
                tab.classList.add('disabled-tab');
            }
        }
    });
}

function tambahAnak() {
    $('.table-row').append(kontenAnak());
}

function removeRow(index) {
    $('#row-' + index).remove();
}

function kontenAnak() {
    let rowIndex = $('.table-row').children().length;

    return `
    <div class="row" id="row-${rowIndex}">
    <div class="col-12">
        <hr>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nama Anak ${rowIndex + 1}</label>
            <input type="text" class="form-control" name="namaAnak[${rowIndex}]"
                placeholder="Masukkan nama Anak" required>
        </div>
        <div class="form-group">
            <label>Tempat Lahir Anak</label>
            <input type="text" class="form-control" name="tempatLahirAnak[${rowIndex}]"  placeholder="Masukkan tempat lahir Anak" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir Anak</label>
            <input type="date" class="form-control" name="tanggalLahirAnak[${rowIndex}]" required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Jenis Kelamin Anak</label>
            <select class="form-control" name="jenisKelaminAnak[${rowIndex}]" required>
                <option value="Laki-laki">
                    Laki-laki
                </option>
                <option value="Perempuan">
                    Perempuan
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Agama Anak</label>
            <select class="form-control" name="agamaAnak[${rowIndex}]" required>
                <option value="Islam">Islam
                </option>
                <option value="Katolik">Katolik
                </option>
                <option value="Kristen">Kristen
                </option>
                <option value="Hindu">Hindu
                </option>
                <option value="Buddha">Buddha
                </option>
                <option value="Konghucu">
                    Konghucu
                </option>
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <button class="btn btn-danger btn-sm float-right" onclick="removeRow(${rowIndex})">
               <i class="fa fa-trash"></i> Hapus
            </button>
        </div>
    </div>
</div>`
}
