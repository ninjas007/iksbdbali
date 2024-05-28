<div class="row">
    <div class="col-4">
    <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= set_value('nama'); ?>"
                placeholder="Masukkan nama">
            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatLahir" value="<?= set_value('tempatLahir'); ?>"
                placeholder="Masukkan tempat lahir">
            <?= form_error('tempatLahir', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggalLahir" value="<?= set_value('tanggalLahir'); ?>">
            <?= form_error('tanggalLahir', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" id="jenisKelamin" name="jenisKelamin">
                <option value="Laki-laki" <?= set_select('jenisKelamin', 'Laki-laki'); ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= set_select('jenisKelamin', 'Perempuan'); ?>>
                    Perempuan
                </option>
            </select>
            <?= form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" value="<?= set_value('pekerjaan'); ?>"
                placeholder="Masukkan pekerjaan">
            <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select class="form-control" name="agama">
                <option value="Islam" <?= set_select('agama', 'Islam'); ?>>Islam
                </option>
                <option value="Katolik" <?= set_select('agama', 'Katolik'); ?>>Katolik
                </option>
                <option value="Kristen" <?= set_select('agama', 'Kristen'); ?>>Kristen
                </option>
                <option value="Hindu" <?= set_select('agama', 'Hindu'); ?>>Hindu
                </option>
                <option value="Buddha" <?= set_select('agama', 'Buddha'); ?>>Buddha
                </option>
                <option value="Konghucu" <?= set_select('agama', 'Konghucu'); ?>>
                    Konghucu
                </option>
            </select>
            <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" name="nomorHp" value="<?= set_value('nomorHp'); ?>"
                placeholder="Masukkan nomor HP">
            <?= form_error('nomorHp', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Asal</label>
            <textarea class="form-control" name="alamatAsal" rows="3"
                placeholder="Masukkan alamat asal"><?= set_value('alamatAsal'); ?></textarea>
            <?= form_error('alamatAsal', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Domisili</label>
            <textarea class="form-control" name="alamatDomisili" rows="3"
                placeholder="Masukkan alamat domisili"><?= set_value('alamatDomisili'); ?></textarea>
            <?= form_error('alamatDomisili', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Kerja</label>
            <textarea class="form-control" name="alamatTempatKerja" rows="3"
                placeholder="Masukkan alamat tempat kerja"><?= set_value('alamatTempatKerja'); ?></textarea>
            <?= form_error('alamatTempatKerja', '<small class="text-danger">', '</small>'); ?>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <select class="form-control" name="pendidikan">
                <?php foreach ($pendidikan as $p) : ?>
                <option value="<?= $p['id']; ?>" <?= set_select('pendidikan', $p['id']); ?>>
                    <?= $p['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" class="form-control" name="jurusan" value="<?= set_value('jurusan'); ?>"
                placeholder="Masukkan jurusan">
            <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label for="hobi">Hobi</label>
            <input type="text" class="form-control" id="hobi" name="hobi" value="<?= set_value('hobi'); ?>"
                placeholder="Masukkan hobi">
            <?= form_error('hobi', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="statusDiri" onchange="toggleStatus(this.value)">
                <option value="Belum Kawin" <?= set_select('status', 'Belum Kawin'); ?>>
                    Belum Kawin
                </option>
                <option value="Kawin" <?= set_select('status', 'Kawin'); ?>>Kawin
                </option>
            </select>
        </div>
        <div class="form-group hidden" id="punyaPasangan">
            <label>Nama Pasangan</label>
            <input type="text" class="form-control" id="namaPasangan" name="namaPasangan" value="<?= set_value('namaPasangan'); ?>"
                placeholder="Masukkan nama pasangan">
        </div>
    </div>
</div>