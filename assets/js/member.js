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
    if (value == 'Kawin') {
        document.getElementById('punyaPasangan').classList.toggle('hidden');
    } else {
        document.getElementById('punyaPasangan').classList.toggle('hidden');
    }
}

// klik punyaPasangan
$('#punyaPasangan').click(function() {
    $('[href="#tabs-2"]').tab('show');
});

$('#punyaAnak').click(function() {
    $('[href="#tabs-3"]').tab('show');
});


$(document).ready(function () {
    changeCardBackgroundColor('tabs-1'); // Tab 1 aktif secara default

    // Initial check of the status
    toggleTabsBasedOnStatus();
    
    // Listen to changes in the status dropdown
    document.getElementById('statusDiri').addEventListener('change', toggleTabsBasedOnStatus);
});

// menonaktifkan dan aktifkan tab ketika status terganti
function toggleTabsBasedOnStatus() {
    const status = document.getElementById('statusDiri').value;
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

// tambah anak
$('#btnAddAnak').click(function() {
   let row = kontenAnak();

   // add row
   $('.table-row').append(row);
});

function removeRow(index) {
    $('#row-' + index).remove();
}

function kontenAnak() {
    let rowIndex = $('.table-row').children().length;

    return `
    <hr>
    <div class="row" id="row-${rowIndex}">
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
        <div class="form-group">
            <label>Jenis Kelamin Anak</label>
            <select class="form-control" name="jenisKelaminAnak[${rowIndex}]" required>
                <option value="Laki-laki" <?= set_select('jenisKelaminAnak[${rowIndex}]', 'Laki-laki'); ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= set_select('jenisKelaminAnak[${rowIndex}]', 'Perempuan'); ?>>
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
            <label>Alamat Domisili Anak</label>
            <textarea class="form-control" name="alamatDomisiliAnak[${rowIndex}]" rows="2"
                placeholder="Masukkan alamat domisili Anak"></textarea>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir Anak</label>
            <input type="text" class="form-control" name="pendidikanTerakhirAnak[${rowIndex}]" placeholder="Masukkan pendidikan terakhir Anak">
        </div>
        <div class="form-group">
            <label>Jurusan Anak</label>
            <input type="text" class="form-control" name="jurusanAnak[${rowIndex}]" placeholder="Masukkan jurusan Anak">
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
