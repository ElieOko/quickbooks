<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
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
        //
        $msg = "";
        $status = 400;
        $data = json_decode($request->getContent());
        foreach ($data as $dt) {
            $check_id = Vendor::find($dt->Id);
            if($check_id == null){
                $check = Vendor::where("DisplayName",$dt->DisplayName)->get();
                if(count($check) == 0){
                    Vendor::create([
                        "VendorId"                  =>  $dt->Id,
                        'SyncToken'                 =>  $dt->SyncToken,
                        'Domain'                    =>  $dt->domain,
                        'DisplayName'               =>  $dt->DisplayName,
                        'GivenName'                 =>  $dt->GivenName,
                        'Sparse'                    =>  $dt->sparse,
                        'Active'                    =>  $dt->Active,
                       
                        // 'BillWithParent'            =>  $dt->BillWithParent,
                        // 'BalanceWithJobs'           =>  $dt->BalanceWithJobs,
                        // 'PrintOnCheckName'          =>  $dt->PrintOnCheckName,
                        // 'AcctNum'                   =>  $dt->AcctNum,
                        ]);
                        $msg = "Enregistrement réussi avec succès";
                        $status = 200;    
                }
            }
            else{
              
                $msg = "Mises a jour réussi avec succès";
                $status = 200;
                $check_id->update([
                    'SyncToken'                 =>  $dt->SyncToken,
                    'Domain'                    =>  $dt->domain,
                    'DisplayName'               =>  $dt->DisplayName,
                    'GivenName'                 =>  $dt->GivenName,
                    'Sparse'                    =>  $dt->sparse,
                    'Active'                    =>  $dt->Active,
                   
                    // 'BillWithParent'            =>  $dt->BillWithParent,
                    // 'BalanceWithJobs'           =>  $dt->BalanceWithJobs,
                    // 'PrintOnCheckName'          =>  $dt->PrintOnCheckName,
                    // 'AcctNum'                   =>  $dt->AcctNum,
                ]);
            }
        }
        return response()->json([
            "message"=>$msg,
        ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vendor $vendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendor $vendor)
    {
        //
    }
}