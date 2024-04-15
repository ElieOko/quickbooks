<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
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
            $check_id = Account::find($dt->Id);
            if($check_id == null){
                $check = Account::where("AccountId",$dt->Id)->get();
                if(count($check) == 0){
                    Account::create([
                        'AccountId' => $dt->Id,
                        'AccountType' =>$dt->AccountType??false,
                        'AccountSubType' => $dt->AccountSubType??false,
                        'Active' => $dt->Active,
                        'Classification' =>$dt->Classification??"",
                        'CurrentBalance'=>$dt->CurrentBalance??0,
                        'CurrentBalanceWithSubAccounts'=>$dt->CurrentBalanceWithSubAccounts,
                        'Domain'=>$dt->domain,
                        'FullyQualifiedName'=>$dt->FullyQualifiedName,
                        'Name'=>$dt->Name,
                        'Sparse'=>$dt->sparse,
                        'SubAccount'=>$dt->SubAccount,
                        'SyncToken'=>$dt->SyncToken,
                    ]);
                    $msg = "Enregistrement réussi avec succès";
                    $status = 200;
                }
            }
            else{
                $check_id->update([
                    'AccountType' =>$dt->AccountType,
                    'AccountSubType' => $dt->AccountSubType??false,
                    'Active' => $dt->Active,
                    'Classification' =>$dt->Classification??"",
                    'CurrentBalance'=>$dt->CurrentBalance??0,
                    'CurrentBalanceWithSubAccounts'=>$dt->CurrentBalanceWithSubAccounts,
                    'Domain'=>$dt->domain,
                    'FullyQualifiedName'=>$dt->FullyQualifiedName,
                    'Name'=>$dt->Name,
                    'Sparse'=>$dt->sparse,
                    'SubAccount'=>$dt->SubAccount,
                    'SyncToken'=>$dt->SyncToken
                ]);
                $status = 200;
                $msg = "Mises à jour réussi avec succès";
            }
        }
        return response()->json([
            "message"=>$msg,
        ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}