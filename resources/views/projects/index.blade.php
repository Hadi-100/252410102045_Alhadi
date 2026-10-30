<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Project</title>
</head>
<body>
    <h1>Daftar Project GarudaHub</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('projects.create') }}">+ Tambah Project</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Klien</th>
                <th>Kategori</th>
                <th>Budget</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $project->judul }}</td>
                    <td>{{ $project->client?->nama ?? '-' }}</td>
                    <td>{{ $project->kategori }}</td>
                    <td>
                        Rp{{ number_format($project->budget_min, 0, ',', '.') }}
                        -
                        Rp{{ number_format($project->budget_max, 0, ',', '.') }}
                    </td>
                    <td>{{ $project->status }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}">
                            Detail
                        </a>

                        <a href="{{ route('projects.edit', $project) }}">
                            Edit
                        </a>

                        <form action="{{ route('projects.destroy', $project) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                onclick="return confirm('Yakin ingin menghapus project ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada project.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>