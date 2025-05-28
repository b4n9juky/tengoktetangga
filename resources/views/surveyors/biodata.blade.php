<!-- resources/views/surveyors/biodata.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Biodata Surveyor</title>
</head>

<body>
    <h2>Isi Biodata</h2>
    <form method="POST" action="{{ route('surveyors.biodata.store') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
        <input type="text" name="kelas" placeholder="Kelas" required><br>
        <input type="text" name="kelompok" placeholder="Kelompok" required><br>
        <input type="text" name="alamat" placeholder="Alamat" required><br>
        <input type="text" name="no_hp" placeholder="No HP" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>

</html>