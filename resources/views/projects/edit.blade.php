<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Project</title>
</head>
<body>
    <h1>Edit Project</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Klien</label><br>
        <select name="client_id" required>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    @selected(old('client_id', $project->client_id) == $client->id)>
                    {{ $client->nama }} ({{ $client->email }})
                </option>
            @endforeach
        </select><br><br>

        <label>Judul Project</label><br>
        <input name="judul" value="{{ old('judul', $project->judul) }}" required>
        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi" required>{{ old('deskripsi', $project->deskripsi) }}</textarea>
        <br><br>

        <label>Kategori</label><br>
        <input name="kategori" value="{{ old('kategori', $project->kategori) }}" required>
        <br><br>

        <label>Budget Minimum</label><br>
        <input type="number" name="budget_min" min="0"
               value="{{ old('budget_min', $project->budget_min) }}" required>
        <br><br>

        <label>Budget Maksimum</label><br>
        <input type="number" name="budget_max" min="0"
               value="{{ old('budget_max', $project->budget_max) }}" required>
        <br><br>

        <label>Batas Lelang</label><br>
        <input type="date" name="batas_lelang"
               value="{{ old('batas_lelang', $project->batas_lelang->format('Y-m-d')) }}"
               required>
        <br><br>

        <label>Status</label><br>
        <select name="status" required>
            <option value="terbuka"
                @selected(old('status', $project->status) == 'terbuka')>
                Terbuka
            </option>
            <option value="ditutup"
                @selected(old('status', $project->status) == 'ditutup')>
                Ditutup
            </option>
        </select>
        <br><br>

        <button type="submit">Perbarui Project</button>
        <a href="{{ route('projects.index') }}">Kembali</a>
    </form>
</body>
</html>