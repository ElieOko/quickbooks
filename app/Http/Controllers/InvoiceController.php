<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceLine;
use Illuminate\Http\Request;
use App\Models\TotalInvoiceAmount;
use App\Models\SalesItemLineDetailInvoice;

class InvoiceController extends Controller
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
        //$msg = "";
        $status = 400;
        $cpt = 0;
        $msg ="";
        $data = json_decode($request->getContent());
        foreach ($data as $dt) {
            $check_id = Invoice::find($dt->Id);
            $check = Invoice::where("InvoiceId",$dt->Id)->get();
            if($check_id == null){
                $msg ="arrivederci";
                if(count($check) == 0){
                    Invoice::create([
                        'InvoiceId' => $dt->Id, //
                        'Balance'=> $dt->Balance, //
                        'DocNumber'=> $dt->DocNumber, //
                        'DueDate'=> $dt->DueDate, //
                        'TotalAmt'=> $dt->TotalAmt, //
                        'PrintStatus'=> $dt->PrintStatus,
                        'Domain'=> $dt->domain, //
                        'TxnDate'=> $dt->TxnDate, //
                        'Sparse'=> $dt->sparse, //
                        'SyncToken'=> $dt->SyncToken, //
                        'EmailStatus'=> $dt->EmailStatus,
                        "AllowIPNPayment"=> $dt->AllowIPNPayment,
                        "AllowOnlinePayment"=> $dt->AllowOnlinePayment,
                        "AllowOnlineCreditCardPayment"=> $dt->AllowOnlineCreditCardPayment,
                        "AllowOnlineACHPayment"=> $dt->AllowOnlineACHPayment,
                        "EInvoiceStatus"=> $dt->EInvoiceStatus,
                        "GlobalTaxCalculation"=> $dt->GlobalTaxCalculation
                    ]);
                    $msg = "Enregistrement réussie";
                    foreach ($dt->Line as $line) {
                        if(count($dt->Line) - 1 == $cpt){
                            TotalInvoiceAmount::create([
                                "Amount" => $line->Amount,
                                "InvoiceFId" => $dt->Id
                            ]);
                            $cpt = 0;
                        }
                        else{
                            InvoiceLine::create([
                                "InvoiceLineId" => $line->Id ,
                                "InvoiceFId" => $dt->Id,
                                "Amount" =>$line->Amount,
                                "LineNum" =>$line->LineNum,
                                "DetailType" =>$line->DetailType,
                            ]);
                            SalesItemLineDetailInvoice::create([
                                'InvoiceFId' => $dt->Id ,
                                'LineFId' =>$line->Id ,
                                'Quantity' => $line->SalesItemLineDetail->Qty,
                                'UnitPrice' => $line->SalesItemLineDetail->UnitPrice, 
                                'ItemFId' => $line->SalesItemLineDetail->ItemRef->value
                            ]);
                            $cpt++;
                        }   
                    }
                    $status = 200;
                }
            }
            else{
                $check = Invoice::where("InvoiceId",$dt->Id)->get();
                    $check_id->update([
                        'Balance'=> $dt->Balance, //
                        'DocNumber'=> $dt->DocNumber, //
                        'DueDate'=> $dt->DueDate, //
                        'TotalAmt'=> $dt->TotalAmt, //
                        'PrintStatus'=> $dt->PrintStatus,
                        'Domain'=> $dt->domain, //
                        'TxnDate'=> $dt->TxnDate, //
                        'Sparse'=> $dt->sparse, //
                        'SyncToken'=> $dt->SyncToken, //
                        'EmailStatus'=> $dt->EmailStatus,
                        "AllowIPNPayment"=> $dt->AllowIPNPayment,
                        "AllowOnlinePayment"=> $dt->AllowOnlinePayment,
                        "AllowOnlineCreditCardPayment"=> $dt->AllowOnlineCreditCardPayment,
                        "AllowOnlineACHPayment"=> $dt->AllowOnlineACHPayment,
                        "EInvoiceStatus"=> $dt->EInvoiceStatus,
                        "GlobalTaxCalculation"=> $dt->GlobalTaxCalculation
                    ]);
                    
                    foreach ($dt->Line as $line) {
                        if(count($dt->Line) - 1 == $cpt){
                            $invoice_amount = TotalInvoiceAmount::where("InvoiceFId",$dt->Id)->first();
                            if($invoice_amount != null){
                                $invoice_amount->update([
                                    "Amount" => $line->Amount
                                ]);
                            }
                            $cpt = 0;
                        }
                        else{
                            $invoice_line = InvoiceLine::where("InvoiceLineId",$line->Id)->where("InvoiceFId",$dt->Id)->first();
                            if($invoice_line != null){
                                $invoice_line->update([
                                    "Amount" =>$line->Amount,
                                    "LineNum" =>$line->LineNum,
                                    "DetailType" =>$line->DetailType,
                                ]);
                            }
                            $sales_item = SalesItemLineDetailInvoice::where("LineFId",$line->Id)->where("InvoiceFId",$dt->Id)->first();
                            if($sales_item != null){
                                $sales_item->update([
                                    'Quantity' => $line->SalesItemLineDetail->Qty,
                                    'UnitPrice' => $line->SalesItemLineDetail->UnitPrice, 
                                    'ItemFId' => $line->SalesItemLineDetail->ItemRef->value
                                ]);
                            }
                            $cpt++;
                        }   
                    }
                    $status = 200;
                    $msg = "Mises à jours";
                }
        }
        return response()->json([
            "msg" => $msg,
        ],$status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}