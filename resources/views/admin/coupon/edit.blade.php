@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kupon</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Edit Kupon</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.update', $kupon->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Nama Kupon</label>
                        <input type="text" name="name" class="form-control" value="{{ $kupon->name }}">
                    </div>

                    <div class="form-group">
                        <label>Kode Kupon</label>
                        <input type="text" name="code" class="form-control" value="{{ $kupon->code }}">
                    </div>

                    <div class="form-group">
                        <label>Kuantitas</label>
                        <input type="text" name="quantity" class="form-control" value="{{ $kupon->quantity }}">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Min Pembelian</label>
                        <input type="text" name="min_purchase_amount" class="form-control"
                            value="{{ $kupon->min_purchase_amount }}">
                    </div>

                    <div class="form-group">
                        <label>Masa Habis Kupon</label>
                        <input type="date" name="expire_date" class="form-control" value="{{ $kupon->expire_date }}">
                    </div>

                    <div class="form-group">
                        <label>Tipe Diskon</label>
                        <select name="discount_type" class="form-control" id="">
                            <option @selected($kupon->discount_type === 1) value="1">Percent</option>
                            <option @selected($kupon->discount_type === 0) value="0">Amount
                                ({{ config('settings.site_currency_icon') }})</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Total Diskon</label>
                        <input type="text" name="discount" class="form-control" value="{{ $kupon->discount }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option @selected($kupon->status === 1) value="1">Aktif</option>
                            <option @selected($kupon->status === 0) value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </form>
            </div>
        </div>
    </section>
@endsection
