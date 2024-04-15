<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $msg = "";
        $status = 400;
        $data = json_decode($request->getContent());
        foreach ($data as $dt) {
            $check_id = Item::find($dt->Id);
            if($check_id == null){
              Item::create([
                'ItemId' => $dt->Id ,
                'FullyQualifiedName' => $dt->FullyQualifiedName ,
                'Domain' => $dt->domain,
                'Name' => $dt->Name,
                // 'SyncToken' => $dt->SyncToken,
                'Type' => $dt->Type,
                'Active' => $dt->Active,
                'Sparse' => $dt->sparse,
                'TrackQtyOnHand' => $dt->TrackQtyOnHand??false,
                'UnitPrice' => $dt->UnitPrice??0,
                'PurchaseCost' => $dt->PurchaseCost??0,
                'QtyOnHand' => $dt->QtyOnHand??0,
                'Taxable' => $dt->Taxable??false,
                // 'InvStartDate' => $dt->IncStartDate,
              ]);  
              $msg = "Nouvelles données enregistrées avec succès";
              $status = 200;
            }
            else{
                $check_id->update([
                    'FullyQualifiedName' => $dt->FullyQualifiedName ,
                    'Domain' => $dt->domain,
                    'Name' => $dt->Name,
                    // 'SyncToken' => $dt->SyncTokeb,
                    'Type' => $dt->Type,
                    'Active' => $dt->Active,
                    'Sparse' => $dt->sparse,
                    'TrackQtyOnHand' => $dt->TrackQtyOnHand??false,
                    'UnitPrice' => $dt->UnitPrice??0,
                    'PurchaseCost' => $dt->PurchaseCost??0,
                    'QtyOnHand' => $dt->QtyOnHand??0,
                    'Taxable' => $dt->Taxable??false,
                    // 'InvStartDate' => $dt->IncStartDate
                ]) ;
                $msg = "Mises a jour reussie avec succès";
              $status = 200;
            }
        }
        return response()->json([
            "msg" => $msg,
        ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
