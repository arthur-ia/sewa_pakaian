@extends('backend.master')
@section('navbar')
	@include('backend.navbar')
@endsection
@section('sidebar')
	@include('backend.sidebar')
@endsection
@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Daftar Pemesanan Pakaian</h1>
        <a href="{{ route('Order.create') }}" class="btn btn-primary mb-3">Tambah Pemesanan</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>ID Pakaian</th>
                    <th>No Resi</th>
                    <th>Tanggal Pesan</th>
                    <th>Status Pesan</th>
                    <th>Status Sewa</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id_pelanggan }}</td>
                    <td>{{ $order->id_pakaian }}</td>
                    <td>{{ $order->no_resi }}</td>
                    <td>{{ $order->tgl_pesan }}</td>
                    <td>{{ ucfirst($order->status_pesan) }}</td>
                    <td>{{ ucfirst($order->status_sewa) }}</td>
                    <td>Rp {{ number_format($order->total_bayar, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('Order.edit', $order->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection