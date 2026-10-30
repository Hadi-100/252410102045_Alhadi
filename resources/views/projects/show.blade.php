<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Project</title>
</head>
<body>
    <h1>{{ $project->judul }}</h1>

    <p><strong>Klien:</strong> {{ $project->client?->nama ?? '-' }}</p>
    <p><strong>Deskripsi:</strong> {{ $project->deskripsi }}</p>
    <p><strong>Kategori:</strong> {{ $project->kategori }}</p>

    <p><strong>Budget:</strong>
        Rp{{ number_format($project->budget_min, 0, ',', '.') }}
        -
        Rp{{ number_format($project->budget_max, 0, ',', '.') }}
    </p>

    <p><strong>Batas lelang:</strong>
        {{ $project->batas_lelang->format('d-m-Y') }}
    </p>

    <p><strong>Status:</strong> {{ $project->status }}</p>

    <h2>Penawaran</h2>
    @forelse ($project->bids as $bid)
        <div>
            <p>Developer: {{ $bid->developer?->nama ?? '-' }}</p>
            <p>Harga: Rp{{ number_format($bid->harga, 0, ',', '.') }}</p>
            <p>Durasi: {{ $bid->durasi }} hari</p>
        </div>
    @empty
        <p>Belum ada penawaran.</p>
    @endforelse

    <a href="{{ route('projects.index') }}">Kembali ke daftar</a>
</body>
</html>