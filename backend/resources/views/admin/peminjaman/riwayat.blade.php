<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman - Peminjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Peminjaman Alat</a>
            <div>
                <a href="{{ route('peminjam.katalog') }}" class="btn btn-sm btn-outline-light me-2">Katalog Alat</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-light text-primary">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3 class="mb-4">Riwayat Peminjaman Saya</h3>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nama Alat</th>
                                <th>Tanggal Pinjam</th>
                                <th>Rencana Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($riwayats as $index => $r)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $r->alat->nama_alat ?? '-' }}</td>
                                    <td>{{ $r->tgl_pinjam }}</td>
                                    <td>{{ $r->tgl_kembali_plan }}</td>
                                    <td>
                                        <span class="badge bg-{{ $r->status == 'disetujui' ? 'success' : ($r->status == 'ditolak' ? 'danger' : ($r->status == 'dikembalikan' ? 'secondary' : 'warning')) }}">
                                            {{ ucfirst($r->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada riwayat peminjaman.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>