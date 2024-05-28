<?php foreach($anak as $i => $a) : ?>
    <div class="row" id="row-<?= $i; ?>">
        <div class="col-4">
            <div class="form-group">
                <label>Nama Anak</label>
                <input type="text" class="form-control" name="namaAnak[<?= $i ?>]" value="<?= $a['nama']; ?>"
                    placeholder="Masukkan nama Anak">
                <?= form_error('namaAnak['.$i.']', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label>Tempat Lahir Anak</label>
                <input type="text" class="form-control" name="tempatLahirAnak[<?= $i ?>]"
                    value="<?= $a['tempat_lahir'] ?>" placeholder="Masukkan tempat lahir Anak">
            </div>
            <div class="form-group">
                <label>Tanggal Lahir Anak</label>
                <input type="date" class="form-control" name="tanggalLahirAnak[<?= $i ?>]"
                    value="<?= $a['tanggal_lahir']; ?>">
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <label>Jenis Kelamin Anak</label>
                <select class="form-control" name="jenisKelaminAnak[<?= $i ?>]">
                    <option value="Laki-laki" <?= $a['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>
                        Laki-laki
                    </option>
                    <option value="Perempuan" <?= $a['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>
                        Perempuan
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label>Agama Anak</label>
                <select class="form-control" name="agamaAnak[<?= $i ?>]">
                    <option value="Islam" <?= $a['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam
                    </option>
                    <option value="Katolik" <?= $a['agama'] == 'Katolik' ? 'selected' : ''; ?>; ?>>Katolik
                    </option>
                    <option value="Kristen" <?= $a['agama'] == 'Kristen' ? 'selected' : ''; ?>; ?>>Kristen
                    </option>
                    <option value="Hindu" <?= $a['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu
                    </option>
                    <option value="Buddha" <?= $a['agama'] == 'Buddha' ? 'selected' : ''; ?>>Buddha
                    </option>
                    <option value="Konghucu" <?= $a['agama'] == 'Konghucu' ? 'selected' : ''; ?>>
                        Konghucu
                    </option>
                </select>
            </div>
        </div>
        <div class="col-4">
            <div class="form-group">
                <button class="btn btn-danger btn-sm float-right" onclick="removeRow(<?= $i ?>)">
                    <i class="fa fa-trash"></i> Hapus
                </button>
            </div>
        </div>
    </div>
<?php endforeach ?>