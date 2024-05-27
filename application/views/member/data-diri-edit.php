<div class="row">
    <div class="col-4">
    <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $member['nama']; ?>"
                placeholder="Masukkan nama">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatLahir" value="<?= $member['tempat_lahir']; ?>"
                placeholder="Masukkan tempat lahir">
            <?= form_error('tempatLahir', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggalLahir" value="<?= $member['tanggal_lahir']; ?>">
            <?= form_error('tanggalLahir', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jenisKelamin">
                <option value="Laki-laki" <?= $member['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= $member['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>
                    Perempuan
                </option>
            </select>
            <?= form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" value="<?= $member['pekerjaan']; ?>"
                placeholder="Masukkan pekerjaan">
            <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select class="form-control" name="agama">
                <option value="Islam" <?= $member['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam
                </option>
                <option value="Katolik" <?= $member['agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik
                </option>
                <option value="Kristen" <?= $member['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen
                </option>
                <option value="Hindu" <?= $member['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu
                </option>
                <option value="Buddha" <?= $member['agama'] == 'Buddha' ? 'selected' : ''; ?>>Buddha
                </option>
                <option value="Konghucu" <?= $member['agama'] == 'Konghucu' ? 'selected' : ''; ?>>
                    Konghucu
                </option>
            </select>
            <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" name="nomorHp" value="<?= $member['nomor_hp']; ?>"
                placeholder="Masukkan nomor HP">
            <?= form_error('nomorHp', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Asal</label>
            <textarea class="form-control" name="alamatAsal" rows="3"
                placeholder="Masukkan alamat asal"><?= $member['alamat_asal'] ?></textarea>
            <?= form_error('alamatAsal', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Domisili</label>
            <textarea class="form-control" name="alamatDomisili" rows="3"
                placeholder="Masukkan alamat domisili"><?= $member['alamat_domisili']; ?></textarea>
            <?= form_error('alamatDomisili', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Kerja</label>
            <textarea class="form-control" name="alamatTempatKerja" rows="3"
                placeholder="Masukkan alamat tempat kerja"><?= $member['alamat_tempat_kerja']; ?></textarea>
            <?= form_error('alamatTempatKerja', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <select class="form-control" name="pendidikan">
                <?php foreach ($pendidikan as $p) : ?>
                <option value="<?= $p['id']; ?>" <?= $p['id'] == $member['nama_pendidikan'] ? 'selected' : ''; ?>>
                    <?= $p['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" class="form-control" name="jurusan" value="<?= $member['pendidikan_jurusan']; ?>"
                placeholder="Masukkan jurusan">
            <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="hobi">Hobi</label>
            <input type="text" class="form-control" id="hobi" name="hobi" value="<?= $member['hobi']; ?>"
                placeholder="Masukkan hobi">
            <?= form_error('hobi', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="statusDiri" onchange="toggleStatus(this.value)">
                <option value="Belum Kawin" <?= $member['status'] == 'Belum Kawin' ? 'selected' : ''; ?>>
                    Belum Kawin
                </option>
                <option value="Kawin" <?= $member['status'] == 'Kawin' ? 'selected' : ''; ?>>Kawin
                </option>
            </select>
            <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
        </div>
        <!-- Checkbox Punya Pasangan -->
        <div class="form-group">
            <a href="javascript:void(0)" class="btn btn-primary hidden" id="punyaPasangan">Punya Pasangan</a>
        </div>
    </div>
</div>