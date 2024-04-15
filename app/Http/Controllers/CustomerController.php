<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
            $check_id = Customer::find($dt->Id);
            if($check_id == null){
                $check = Customer::where("CustomerId",$dt->Id)->get();
                if(count($check) == 0){
                    Customer::create([
                        "CustomerId" => $dt->Id,
                        'SyncToken' => $dt->SyncToken,
                        'Domain' => $dt->domain,
                        'DisplayName' =>$dt->DisplayName,
                        'GivenName' =>$dt->GivenName,
                        'FullyQualifiedName' =>$dt->FullyQualifiedName,
                        'PreferredDeliveryMethod' =>$dt->PreferredDeliveryMethod,
                        'Taxable' =>$dt->Taxable,
                        'Sparse' =>$dt->sparse,
                        'Active' =>$dt->Active,
                        'Job' =>$dt->Job,
                        'BillWithParent' =>$dt->BillWithParent,
                        'BalanceWithJobs' =>$dt->BalanceWithJobs,
                        'PrintOnCheckName' =>$dt->PrintOnCheckName,
                        'Balance' =>$dt->Balance,
                    ]);
                    $msg = "Enregistrement reussie";
                    $status = 200;
                }
                
            }
            else{
                $check_id->update([
                    'SyncToken' => $dt->SyncToken,
                    'Domain' => $dt->domain,
                    'DisplayName' =>$dt->DisplayName,
                    'GivenName' =>$dt->GivenName,
                    'FullyQualifiedName' =>$dt->FullyQualifiedName,
                    'PreferredDeliveryMethod' =>$dt->PreferredDeliveryMethod,
                    'Taxable' =>$dt->Taxable,
                    'Sparse' =>$dt->sparse,
                    'Active' =>$dt->Active,
                    'Job' =>$dt->Job,
                    'BillWithParent' =>$dt->BillWithParent,
                    'BalanceWithJobs' =>$dt->BalanceWithJobs,
                    'PrintOnCheckName' =>$dt->PrintOnCheckName,
                    'Balance' =>$dt->Balance,
                ]);
                $msg = "Mises à jour éffectué avec succès";
                $status = 200;
            }
        }
        return response()->json([
            "message"=>$msg,
        ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}