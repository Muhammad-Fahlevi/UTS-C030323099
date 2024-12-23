<form action="{{ route('profils.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" required>
    </div>
    <div>
        <label for="NIM">NIM</label>
        <input type="text" name="NIM" id="NIM" required>
    </div>
    <div>
        <label for="prodi">Prodi</label>
        <input type="text" name="prodi" id="prodi" required>
    </div>
    <div>
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat"></textarea>
    </div>
    <div>
        <label for="gambar">Gambar</label>
        <input type="file" name="gambar" id="gambar" accept="image/*">
    </div>
    <button type="submit">Simpan</button>
</form>
