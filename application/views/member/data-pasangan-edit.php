<div class="row">
    <div class="col-4">
        <div class="form-group">
            <label>Nama Pasangan</label>
            <input type="text" class="form-control" name="namaPasangan" value="<?= $member['nama_pasangan']; ?>"
                placeholder="Masukkan nama pasangan">
            <?= form_error('namaPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir Pasangan</label>
            <input type="text" class="form-control" name="tempatLahirPasangan"
                value="<?= $member['tempat_lahir_pasangan'] ?>" placeholder="Masukkan tempat lahir pasangan">
            <?= form_error('tempatLahirPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir Pasangan</label>
            <input type="date" class="form-control" name="tanggalLahirPasangan"
                value="<?= $member['tanggal_lahir_pasangan'] ?>">
            <?= form_error('tanggalLahirPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin Pasangan</label>
            <select class="form-control" name="jenisKelaminPasangan">
                <option value="Laki-laki" <?= $member['jenis_kelamin_pasangan'] == 'Laki-laki' ? 'selected' : ''; ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= $member['jenis_kelamin_pasangan'] == 'Perempuan' ? 'selected' : ''; ?>>
                    Perempuan
                </option>
            </select>
            <?= form_error('jenisKelaminPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Pekerjaan Pasangan</label>
            <input type="text" class="form-control" name="pekerjaanPasangan"
                value="<?= $member['pekerjaan_pasangan'] ?>" placeholder="Masukkan pekerjaan pasangan">
            <?= form_error('pekerjaanPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Agama Pasangan</label>
            <select class="form-control" name="agamaPasangan">
                <option value="Islam" <?=  $member['agama_pasangan'] == 'Islam' ? 'selected' : '' ?>>Islam
                </option>
                <option value="Katolik" <?=  $member['agama_pasangan'] == 'Katolik' ? 'selected' : '' ?>>Katolik
                </option>
                <option value="Kristen" <?=  $member['agama_pasangan'] == 'Kristen' ? 'selected' : '' ?>>Kristen
                </option>
                <option value="Hindu" <?=  $member['agama_pasangan'] == 'Hindu' ? 'selected' : '' ?>>Hindu
                </option>
                <option value="Buddha" <?=  $member['agama_pasangan'] == 'Buddha' ? 'selected' : '' ?>>Buddha
                </option>
                <option value="Konghucu" <?=  $member['agama_pasangan'] == 'Konghucu' ? 'selected' : '' ?>>
                    Konghucu
                </option>
            </select>
            <?= form_error('agamaPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nomor HP Pasangan</label>
            <input type="text" class="form-control" name="nomorHpPasangan" value="<?= $member['nomor_hp_pasangan'] ?>"
                placeholder="Masukkan nomor HP pasangan">
            <?= form_error('nomorHpPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Asal Pasangan</label>
            <textarea class="form-control" id="alamatAsalPasangan" name="alamatAsalPasangan" rows="2"
                placeholder="Masukkan alamat asal pasangan"><?= $member['alamat_asal_pasangan'] ?></textarea>
            <?= form_error('alamatAsalPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Domisili Pasangan</label>
            <textarea class="form-control" name="alamatDomisiliPasangan" rows="2"
                placeholder="Masukkan alamat domisili pasangan"><?= $member['alamat_domisili_pasangan']; ?></textarea>
            <?= form_error('alamatDomisiliPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Kerja Pasangan</label>
            <textarea class="form-control" name="alamatTempatKerjaPasangan" rows="2"
                placeholder="Masukkan alamat tempat kerja pasangan"><?= $member['alamat_tempat_kerja_pasangan']; ?></textarea>
            <?= form_error('alamatTempatKerjaPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Pendidikan Terakhir Pasangan</label>
            <input type="text" class="form-control" name="pendidikanTerakhirPasangan"
                value="<?= $member['pendidikan_terakhir_pasangan'] ?>" placeholder="Masukkan pendidikan terakhir pasangan">
            <?= form_error('pendidikanTerakhirPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label>Jurusan Pasangan</label>
            <input type="text" class="form-control" name="jurusanPasangan" value="<?= $member['jurusan_pasangan']; ?>"
                placeholder="Masukkan jurusan pasangan">
            <?= form_error('jurusanPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Hobi Pasangan</label>
            <input type="text" class="form-control" name="hobiPasangan" value="<?= $member['hobi_pasangan']; ?>"
                placeholder="Masukkan hobi pasangan">
            <?= form_error('hobiPasangan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <!-- Checkbox Punya Anak -->
        <div class="form-group">
            <a href="javascript:void(0)" class="btn btn-primary" id="punyaAnak">Punya Anak</a>
        </div>
    </div>
</div>