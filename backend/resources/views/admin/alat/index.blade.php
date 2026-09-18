@extends('layouts.app')

@section('title', 'Manajemen Data Alat - Panel Admin')
@section('header-title', 'Manajemen Data Alat')

@section('content')

@if(session('success'))
    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
    <!-- Header & Search + Button -->
    <div class="p-6 flex flex-col md:flex-row justify-between items-center gap-4 border-b border-gray-200">
        <h3 class="text-base font-semibold text-gray-800">Daftar Alat Laboratorium</h3>
        
        <div class="flex items-center gap-3 w-full md:w-auto justify-end">
            <form action="{{ route('admin.alat.index') }}" method="GET" class="flex items-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama alat, kategori..." 
                    class="px-3 py-1.5 text-sm border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-1.5 text-sm font-semibold rounded-r-lg transition">
                    Cari
                </button>
            </form>
            
            <a href="{{ route('admin.alat.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1.5 text-sm font-semibold rounded-lg transition flex items-center whitespace-nowrap">
                + Tambah Alat
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-gray-600 text-xs uppercase tracking-wider font-semibold">
                    <th class="py-3 px-4">Gambar</th>
                    <th class="py-3 px-4">Nama Alat</th>
                    <th class="py-3 px-4">Kategori</th>
                    <th class="py-3 px-4">Stok</th>
                    <th class="py-3 px-4">Kondisi</th>
                    <th class="py-3 px-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm">
                @forelse($alats as $item)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4">
                        @if($item->gambar)
                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->nama_alat }}" class="w-10 h-10 object-cover rounded-lg border">
                        @else
                            <div class="w-10 h-10 bg-gray-100 border rounded-lg flex items-center justify-content-center text-gray-400 text-xs font-semibold">
                                Alat
                            </div>
                        @endif
                    </td>
                    <td class="py-3 px-4 font-semibold text-gray-800">{{ $item->nama_alat }}</td>
                    <td class="py-3 px-4 text-gray-600">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                    <td class="py-3 px-4 font-semibold text-gray-800">{{ $item->stok }}</td>
                    <td class="py-3 px-4">
                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-2.5 py-1 rounded-full">
                            {{ ucfirst($item->status_kondisi ?? 'Baik') }}
                        </span>
                    </td>
                    <td class="py-3 px-4">
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.alat.edit', $item->id) }}" class="bg-amber-500 hover:bg-amber-600 text-white px-3 py-1 rounded text-xs font-semibold transition">Edit</a>
                            <form action="{{ route('admin.alat.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus alat ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-gray-500 text-sm">Data alat belum tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if(method_exists($alats, 'links'))
        <div class="p-4 border-t border-gray-200">
            {{ $alats->links() }}
        </div>
    @endif
</div>

@endsection