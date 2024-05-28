<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" class="form-control" name="namaPasangan" value="<?= set_value('namaPasangan'); ?>"
                placeholder="Masukkan nama pasangan">
            <?= form_error('namaPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir Pasangan</label>
            <input type="text" class="form-control" name="tempatLahirPasangan"
                value="<?= set_value('tempatLahirPasangan'); ?>" placeholder="Masukkan tempat lahir pasangan">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir Pasangan</label>
            <input type="date" class="form-control" name="tanggalLahirPasangan"
                value="<?= set_value('tanggalLahirPasangan'); ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin Pasangan</label>
            <select class="form-control" id="jenisKelaminPasangan" name="jenisKelaminPasangan">
                <option value="Laki-laki" <?= set_select('jenisKelaminPasangan', 'Laki-laki'); ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= set_select('jenisKelaminPasangan', 'Perempuan'); ?>>
                    Perempuan
                </option>
            </select>
        </div>
        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" class="form-control" name="pekerjaanPasangan"
                value="<?= set_value('pekerjaanPasangan'); ?>" placeholder="Masukkan pekerjaan pasangan">
        </div>
        <div class="form-group">
            <label>Agama Pasangan</label>
            <select class="form-control" name="agamaPasangan">
                <option value="Islam" <?= set_select('agamaPasangan', 'Islam'); ?>>Islam
                </option>
                <option value="Katolik" <?= set_select('agamaPasangan', 'Katolik'); ?>>Katolik
                </option>
                <option value="Kristen" <?= set_select('agamaPasangan', 'Kristen'); ?>>Kristen
                </option>
                <option value="Hindu" <?= set_select('agamaPasangan', 'Hindu'); ?>>Hindu
                </option>
                <option value="Buddha" <?= set_select('agamaPasangan', 'Buddha'); ?>>Buddha
                </option>
                <option value="Konghucu" <?= set_select('agamaPasangan', 'Konghucu'); ?>>
                    Konghucu
                </option>
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nomor HP Pasangan</label>
            <input type="text" class="form-control" name="nomorHpPasangan" value="<?= set_value('nomorHpPasangan'); ?>"
                placeholder="Masukkan nomor HP pasangan">
        </div>
        <div class="form-group">
            <label>Alamat Asal Pasangan</label>
            <textarea class="form-control" id="alamatAsalPasangan" name="alamatAsalPasangan" rows="2"
                placeholder="Masukkan alamat asal pasangan"><?= set_value('alamatAsalPasangan'); ?></textarea>
        </div>
        <div class="form-group">
            <label>Alamat Domisili Pasangan</label>
            <textarea class="form-control" name="alamatDomisiliPasangan" rows="2"
                placeholder="Masukkan alamat domisili pasangan"><?= set_value('alamatDomisiliPasangan'); ?></textarea>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Kerja Pasangan</label>
            <textarea class="form-control" name="alamatTempatKerjaPasangan" rows="2"
                placeholder="Masukkan alamat tempat kerja pasangan"><?= set_value('alamatTempatKerjaPasangan'); ?></textarea>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir Pasangan</label>
            <select class="form-control" name="pendidikanTerakhirPasangan">
                <?php foreach ($pendidikan as $p) : ?>
                <option value="<?= $p['id']; ?>" <?= set_select('pendidikanTerakhirPasangan', $p['id']); ?>>
                    <?= $p['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label>Jurusan Pasangan</label>
            <input type="text" class="form-control" name="jurusanPasangan" value="<?= set_value('jurusanPasangan'); ?>"
                placeholder="Masukkan jurusan pasangan">
            <?= form_error('jurusanPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Hobi Pasangan</label>
            <input type="text" class="form-control" name="hobiPasangan" value="<?= set_value('hobiPasangan'); ?>"
                placeholder="Masukkan hobi pasangan">
        </div>
        <!-- Checkbox Punya Anak -->
        <div class="form-group">
            <a href="javascript:void(0)" class="btn btn-primary" id="punyaAnak">Punya Anak</a>
        </div>
    </div>
</div>