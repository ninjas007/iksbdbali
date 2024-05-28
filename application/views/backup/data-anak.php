<div class="row" id="row-0">
    <div class="col-4">
        <div class="form-group">
            <label>Nama Anak</label>
            <input type="text" class="form-control" name="namaAnak[0]" value="<?= set_value('namaAnak[0]'); ?>"
                placeholder="Masukkan nama Anak">
        </div>
        <div class="form-group">
            <label>Tempat Lahir Anak</label>
            <input type="text" class="form-control" name="tempatLahirAnak[0]"
                value="<?= set_value('tempatLahirAnak[0]'); ?>" placeholder="Masukkan tempat lahir Anak">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir Anak</label>
            <input type="date" class="form-control" name="tanggalLahirAnak[0]"
                value="<?= set_value('tanggalLahirAnak[0]'); ?>">
        </div>
    </div>
    <div class="col-4">
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
            <button class="btn btn-danger btn-sm float-right" onclick="removeRow(0)">
                <i class="fa fa-trash"></i> Hapus
            </button>
        </div>
    </div>
</div>