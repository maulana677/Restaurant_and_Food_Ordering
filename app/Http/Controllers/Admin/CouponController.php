<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CouponDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponCreateRequest;
use App\Models\Coupon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTables)
    {
        return $dataTables->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponCreateRequest $request): RedirectResponse
    {
        $kupon = new Coupon();
        $kupon->name = $request->name;
        $kupon->code = $request->code;
        $kupon->quantity = $request->quantity;
        $kupon->min_purchase_amount = $request->min_purchase_amount;
        $kupon->expire_date = $request->expire_date;
        $kupon->discount_type = $request->discount_type;
        $kupon->discount = $request->discount;
        $kupon->status = $request->status;
        $kupon->save();

        toastr()->success('Kupon berhasil dibuat');
        return to_route('admin.coupon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $kupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('kupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponCreateRequest $request, string $id)
    {
        $kupon = Coupon::findOrFail($id);
        $kupon->name = $request->name;
        $kupon->code = $request->code;
        $kupon->quantity = $request->quantity;
        $kupon->min_purchase_amount = $request->min_purchase_amount;
        $kupon->expire_date = $request->expire_date;
        $kupon->discount_type = $request->discount_type;
        $kupon->discount = $request->discount;
        $kupon->status = $request->status;
        $kupon->save();

        toastr()->success('Kupon berhasil diedit');
        return to_route('admin.coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Coupon::findOrFail($id)->delete();
            return response(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Ada Kesalahan!']);
        }
    }
}
