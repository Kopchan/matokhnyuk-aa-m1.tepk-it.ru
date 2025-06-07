<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use App\Models\PartnerType;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner
            ::with('type')
//            ->withSum('sales as salesQuantity', 'quantity')
            ->get();

//        foreach ($partners as $partner) {
//            $discount = 0;
//
//            if ($partner->salesQuantity > 300_000)
//                $discount = 15;
//            else
//            if ($partner->salesQuantity > 50_000)
//                $discount = 10;
//            else
//            if ($partner->salesQuantity > 10_000)
//                $discount = 5;
//
//            $partner['discount'] = $discount;
//        }

        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        $types = PartnerType::all();
        return view('partners.create', compact('types'));
    }

    public function store(PartnerRequest $request)
    {
        $partner = Partner::create($request->validated());
        return redirect()->route('partners.show', $partner);
    }

    public function show(Partner $partner)
    {
        $partner->load('type', 'sales', 'sales.product');
        return view('partners.show', compact('partner'));
    }

    public function edit(Partner $partner)
    {
        $types = PartnerType::all();
        return view('partners.edit', compact('partner', 'types'));
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $partner->update($request->validated());
        return redirect()->route('partners.show', $partner);
    }

    public function destroy(Partner $partner)
    {
        //$partner->delete();
        //return redirect()->route('partners.index');
    }
}
