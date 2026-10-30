<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Project</title>
</head>
<body>
    <h1>Tambah Project</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <label>Klien</label><br>
        <select name="client_id" required>
            <option value="">-- Pilih Klien --</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    @selected(old('client_id') == $client->id)>
                    {{ $client->nama }} ({{ $client->email }})
                </option>
            @endforeach
        </select><br><br>

        <label>Judul Project</label><br>
        <input type="text" name="judul" value="{{ old('judul') }}" required>
        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" required>{{ old('deskripsi') }}</textarea>
        <br><br>

        <label>Kategori</label><br>
        <input type="text" name="kategori" value="{{ old('kategori') }}" required>
        <br><br>

        <label>Budget Minimum</label><br>
        <input type="number" name="budget_min"
               min="0" value="{{ old('budget_min', 0) }}" required>
        <br><br>

        <label>Budget Maksimum</label><br>
        <input type="number" name="budget_max"
               min="0" value="{{ old('budget_max', 0) }}" required>
        <br><br>

        <label>Batas Lelang</label><br>
        <input type="date" name="batas_lelang"
               value="{{ old('batas_lelang') }}" required>
        <br><br>

        <label>Status</label><br>
        <select name="status" required>
            <option value="terbuka">Terbuka</option>
            <option value="ditutup">Ditutup</option>
        </select>
        <br><br>

        <button type="submit">Simpan Project</button>
        <a href="{{ route('projects.index') }}">Kembali</a>
    </form>
</body>
</html>