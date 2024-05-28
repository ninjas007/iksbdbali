<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" class="form-control" name="namaPasangan" value="<?= $pasangan['nama'] ?? ''; ?>"
                placeholder="Masukkan nama pasangan">
        </div>
        <div class="form-group">
            <label>Tempat Lahir Pasangan</label>
            <input type="text" class="form-control" name="tempatLahirPasangan"
                value="<?= $pasangan['tempat_lahir'] ?? '' ?>" placeholder="Masukkan tempat lahir pasangan">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir Pasangan</label>
            <input type="date" class="form-control" name="tanggalLahirPasangan"
                value="<?= $pasangan['tanggal_lahir'] ?? '' ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin Pasangan</label>
            <select class="form-control" name="jenisKelaminPasangan">
                <option value="Laki-laki" <?= $pasangan['jenis_kelamin'] ?? '' == 'Laki-laki' ? 'selected' : ''; ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= $pasangan['jenis_kelamin'] ?? '' == 'Perempuan' ? 'selected' : ''; ?>>
                    Perempuan
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" class="form-control" name="pekerjaanPasangan"
                value="<?= $pasangan['pekerjaan'] ?? '' ?>" placeholder="Masukkan pekerjaan pasangan">
        </div>
        <div class="form-group">
            <label>Agama Pasangan</label>
            <select class="form-control" name="agamaPasangan">
                <option value="Islam" <?=  $pasangan['agama'] ?? '' == 'Islam' ? 'selected' : '' ?>>Islam
                </option>
                <option value="Katolik" <?=  $pasangan['agama'] ?? '' == 'Katolik' ? 'selected' : '' ?>>Katolik
                </option>
                <option value="Kristen" <?=  $pasangan['agama'] ?? '' == 'Kristen' ? 'selected' : '' ?>>Kristen
                </option>
                <option value="Hindu" <?=  $pasangan['agama'] ?? '' == 'Hindu' ? 'selected' : '' ?>>Hindu
                </option>
                <option value="Buddha" <?=  $pasangan['agama'] ?? '' == 'Buddha' ? 'selected' : '' ?>>Buddha
                </option>
                <option value="Konghucu" <?=  $pasangan['agama'] ?? '' == 'Konghucu' ? 'selected' : '' ?>>
                    Konghucu
                </option>
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nomor HP Pasangan</label>
            <input type="text" class="form-control" name="nomorHpPasangan" value="<?= $pasangan['nomor_hp'] ?? '' ?>"
                placeholder="Masukkan nomor HP pasangan">
        </div>
        <div class="form-group">
            <label>Alamat Asal Pasangan</label>
            <textarea class="form-control" id="alamatAsalPasangan" name="alamatAsalPasangan" rows="2"
                placeholder="Masukkan alamat asal pasangan"><?= $pasangan['alamat_asal'] ?? '' ?></textarea>
        </div>
        <div class="form-group">
            <label>Alamat Domisili Pasangan</label>
            <textarea class="form-control" name="alamatDomisiliPasangan" rows="2"
                placeholder="Masukkan alamat domisili pasangan"><?= $pasangan['alamat_domisili'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Kerja Pasangan</label>
            <textarea class="form-control" name="alamatTempatKerjaPasangan" rows="2"
                placeholder="Masukkan alamat tempat kerja pasangan"><?= $pasangan['alamat_tempat_kerja'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir Pasangan</label>
            <select class="form-control" name="pendidikanTerakhirPasangan">
                <?php foreach ($pendidikan as $p) : ?>
                <option value="<?= $p['id']; ?>" <?= $pasangan['pendidikan_id'] ?? '' == $p['id'] ? 'selected' : '' ?>>
                    <?= $p['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label>Jurusan Pasangan</label>
            <input type="text" class="form-control" name="jurusanPasangan" value="<?= $pasangan['pendidikan_jurusan'] ?? ''; ?>"
                placeholder="Masukkan jurusan pasangan">
        </div>
        <div class="form-group">
            <label>Hobi Pasangan</label>
            <input type="text" class="form-control" name="hobiPasangan" value="<?= $pasangan['hobi'] ?? ''; ?>"
                placeholder="Masukkan hobi pasangan">
        </div>
        <div class="form-group">
            <a href="javascript:void(0)" class="btn btn-primary" id="punyaAnak">Punya Anak</a>
        </div>
    </div>
</div>