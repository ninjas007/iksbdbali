<div class="row" id="row-0">
    <div class="col-4">
        <div class="form-group">
            <label>Nama Anak</label>
            <input type="text" class="form-control" name="namaAnak[0]" value="<?= set_value('namaAnak[0]'); ?>"
                placeholder="Masukkan nama Anak">
            <?= form_error('namaAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir Anak</label>
            <input type="text" class="form-control" name="tempatLahirAnak[0]"
                value="<?= set_value('tempatLahirAnak[0]'); ?>" placeholder="Masukkan tempat lahir Anak">
            <?= form_error('tempatLahirAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir Anak</label>
            <input type="date" class="form-control" name="tanggalLahirAnak[0]"
                value="<?= set_value('tanggalLahirAnak[0]'); ?>">
            <?= form_error('tanggalLahirAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin Anak</label>
            <select class="form-control" name="jenisKelaminAnak[0]">
                <option value="Laki-laki" <?= set_select('jenisKelaminAnak[0]', 'Laki-laki'); ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= set_select('jenisKelaminAnak[0]', 'Perempuan'); ?>>
                    Perempuan
                </option>
            </select>
            <?= form_error('jenisKelaminAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Agama Anak</label>
            <select class="form-control" name="agamaAnak[0]">
                <option value="Islam" <?= set_select('agamaAnak[0]', 'Islam'); ?>>Islam
                </option>
                <option value="Katolik" <?= set_select('agamaAnak[0]', 'Katolik'); ?>>Katolik
                </option>
                <option value="Kristen" <?= set_select('agamaAnak[0]', 'Kristen'); ?>>Kristen
                </option>
                <option value="Hindu" <?= set_select('agamaAnak[0]', 'Hindu'); ?>>Hindu
                </option>
                <option value="Buddha" <?= set_select('agamaAnak[0]', 'Buddha'); ?>>Buddha
                </option>
                <option value="Konghucu" <?= set_select('agamaAnak[0]', 'Konghucu'); ?>>
                    Konghucu
                </option>
            </select>
            <?= form_error('agamaAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Alamat Domisili Anak</label>
            <textarea class="form-control" name="alamatDomisiliAnak[0]" rows="2"
                placeholder="Masukkan alamat domisili Anak"><?= set_value('alamatDomisiliAnak[0]'); ?></textarea>
            <?= form_error('alamatDomisiliAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir Anak</label>
            <input type="text" class="form-control" name="pendidikanTerakhirAnak[0]"
                value="<?= set_value('pendidikanTerakhirAnak[0]'); ?>" placeholder="Masukkan pendidikan terakhir Anak">
            <?= form_error('pendidikanTerakhirAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jurusan Anak</label>
            <input type="text" class="form-control" name="jurusanAnak[0]" value="<?= set_value('jurusanAnak[0]'); ?>"
                placeholder="Masukkan jurusan Anak">
            <?= form_error('jurusanAnak[0]', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <button class="btn btn-danger btn-sm float-right" onclick="removeRow(0)">
               <i class="fa fa-trash"></i> Hapus
            </button>
        </div>
    </div>
</div>