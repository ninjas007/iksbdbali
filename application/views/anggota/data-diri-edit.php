<div class="row">
    <div class="col-4">
    <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" value="<?= $anggota['nama']; ?>"
                placeholder="Masukkan nama" required>
        </div>
        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatLahir" value="<?= $anggota['tempat_lahir']; ?>"
                placeholder="Masukkan tempat lahir">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggalLahir" value="<?= $anggota['tanggal_lahir']; ?>">
        </div>
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="jenisKelamin">
                <option value="Laki-laki" <?= $anggota['jenis_kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>
                    Laki-laki
                </option>
                <option value="Perempuan" <?= $anggota['jenis_kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>
                    Perempuan
                </option>
            </select>
            <?= form_error('jenisKelamin', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
            <label>Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" value="<?= $anggota['pekerjaan']; ?>"
                placeholder="Masukkan pekerjaan">
        </div>
        <div class="form-group">
            <label>Agama</label>
            <select class="form-control" name="agama">
                <option value="Islam" <?= $anggota['agama'] == 'Islam' ? 'selected' : ''; ?>>Islam
                </option>
                <option value="Katolik" <?= $anggota['agama'] == 'Katolik' ? 'selected' : ''; ?>>Katolik
                </option>
                <option value="Kristen" <?= $anggota['agama'] == 'Kristen' ? 'selected' : ''; ?>>Kristen
                </option>
                <option value="Hindu" <?= $anggota['agama'] == 'Hindu' ? 'selected' : ''; ?>>Hindu
                </option>
                <option value="Buddha" <?= $anggota['agama'] == 'Buddha' ? 'selected' : ''; ?>>Buddha
                </option>
                <option value="Konghucu" <?= $anggota['agama'] == 'Konghucu' ? 'selected' : ''; ?>>
                    Konghucu
                </option>
            </select>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label>Nomor HP</label>
            <input type="text" class="form-control" name="nomorHp" value="<?= $anggota['nomor_hp']; ?>"
                placeholder="Masukkan nomor HP">
        </div>
        <div class="form-group">
            <label>Alamat Asal</label>
            <textarea class="form-control" name="alamatAsal" rows="3"
                placeholder="Masukkan alamat asal"><?= $anggota['alamat_asal'] ?></textarea>
        </div>
        <div class="form-group">
            <label>Alamat Domisili</label>
            <textarea class="form-control" name="alamatDomisili" rows="3"
                placeholder="Masukkan alamat domisili"><?= $anggota['alamat_domisili']; ?></textarea>
        </div>
        <div class="form-group">
            <label>Alamat Tempat Kerja</label>
            <textarea class="form-control" name="alamatTempatKerja" rows="3"
                placeholder="Masukkan alamat tempat kerja"><?= $anggota['alamat_tempat_kerja']; ?></textarea>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label>Pendidikan Terakhir</label>
            <select class="form-control" name="pendidikan">
                <?php foreach ($pendidikan as $p) : ?>
                <option value="<?= $p['id']; ?>" <?= $p['id'] == $anggota['pendidikan_id'] ? 'selected' : ''; ?>>
                    <?= $p['nama']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Jurusan</label>
            <input type="text" class="form-control" name="jurusan" value="<?= $anggota['pendidikan_jurusan']; ?>"
                placeholder="Masukkan jurusan">
        </div>
        <div class="form-group">
            <label for="hobi">Hobi</label>
            <input type="text" class="form-control" id="hobi" name="hobi" value="<?= $anggota['hobi']; ?>"
                placeholder="Masukkan hobi">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status" id="statusDiri" onchange="toggleStatus(this.value)">
                <option value="Belum Kawin" <?= $anggota['status'] == 'Belum Kawin' ? 'selected' : ''; ?>>
                    Belum Kawin
                </option>
                <option value="Kawin" <?= $anggota['status'] == 'Kawin' ? 'selected' : ''; ?>>Kawin
                </option>
            </select>
        </div>
        <div class="form-group <?= $anggota['status'] == 'Kawin' ? '' : 'hidden'; ?>" id="punyaPasangan">
            <label>Nama Pasangan</label>
            <input type="text" class="form-control" id="namaPasangan" name="namaPasangan" value="<?= $anggota['nama_pasangan'] ?>"
                placeholder="Masukkan nama pasangan">
        </div>
    </div>
</div>