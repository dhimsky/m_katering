@extends('layouts.main')
@section('title', 'Orders')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Daftar Pesanan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display text-dark" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menu</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->menu->name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->delivery_date }}</td>
                                <td>
                                    <form action="{{ route('merchant.orders.destroy', $order->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addOrderModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('merchant.orders.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="menu_id">Menu</label>
                        <select name="menu_id" id="menu_id" class="form-control" required>
                            <option value="" disabled selected>Pilih Menu</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Jumlah</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
                    </div>
                    <div class="form-group">
                        <label for="delivery_date">Tanggal Pengiriman</label>
                        <input type="date" name="delivery_date" id="delivery_date" class="form-control" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
