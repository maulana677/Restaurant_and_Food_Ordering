@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Kupon</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Buat Kupon</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.coupon.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Nama Kupon</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label>Kode Kupon</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code') }}">
                    </div>

                    <div class="form-group">
                        <label>Kuantitas</label>
                        <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Min Pembelian</label>
                        <input type="text" name="min_purchase_amount" class="form-control"
                            value="{{ old('min_purchase_amount') }}">
                    </div>

                    <div class="form-group">
                        <label>Masa Habis Kupon</label>
                        <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date') }}">
                    </div>

                    <div class="form-group">
                        <label>Tipe Diskon</label>
                        <select name="discount_type" class="form-control" id="">
                            <option value="1">Percent</option>
                            <option value="0">Amount ({{ config('settings.site_currency_icon') }})</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Total Diskon</label>
                        <input type="text" name="discount" class="form-control" value="{{ old('discount') }}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
