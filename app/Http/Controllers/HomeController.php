<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Decimal;
use stdClass;

class HomeController extends Controller
{
    public function home(){
        $data = Product::all();
        return view('home',compact('data'));
    }

    public function allProducts($id){
        $data = Product::find($id);
        return compact('data');
    }

    public function checkout(Request $request){

        if($request->input('id') == null && $request->input('quantity') == null){
            return redirect('/home');
        }

        $data = [
            "id" => $request->input('id'),
            "quantity" => $request->input('quantity')
        ];
        
        $result = [];
        for ($i = 0; $i < count($data['id']); $i++) {
            $result[] = [
                'id' => $data['id'][$i],
                'quantity' => $data['quantity'][$i]
            ];
        }

        $items = Product::whereIn('id', $request->input('id'))->get();
        if(count($items) != 3){
            return redirect('/home');
        }
        
        $loop = 0;
        $total = 0;
        foreach ($items as $item){
            if($item->id == $result[$loop]['id'] && $result[$loop]['quantity'] != 0){
                if($item->discount !=0 ){
                    $diskon = ($item->price * $item->discount) / 100;
                    $price_diskon = ($item->price - $diskon);
                    $price = (int)$item->price* $result[$loop]['quantity'];
                } else {
                    $price = (int)$item->price* $result[$loop]['quantity'];
                    $price_diskon = $item->price;
                }
                $data_result[] = [
                    "id" => $item->id,
                    "product_code" => $item->product_code,
                    "currency" => $item->currency,
                    "unit" => $item->unit,
                    "dimension" => $item->dimension,
                    "product_name" => $item->product_name,
                    "price_normal" => $item->price,
                    "price_diskon" => $price_diskon,
                    "discount" => $item->discount,
                    "subtotal" => ($price_diskon * $result[$loop]['quantity']),
                    "quantity" => $result[$loop]['quantity'],
                    "images" => $item->images,
                ];

                $total += ($price_diskon * $result[$loop]['quantity']);
            }
            $loop++;
        }
        return view('checkout', ['data'=>$data_result, 'total'=>$total]);
    }

    public function create (Request $request){
        if($request->input() == null){
            return redirect('/home');
        }

        $data = [
            "id" => $request->input('id'),
            "product_code" => $request->input('product_code'),
            "currency" => $request->input('currency'),
            "unit" => $request->input('unit'),
            "dimension" => $request->input('dimension'),
            "product_name" => $request->input('product_name'),
            "price_normal" => $request->input('price_normal'),
            "price_diskon" => $request->input('price_diskon'),
            "discount" => $request->input('discount'),
            "subtotal" => $request->input('subtotal'),
            "quantity" => $request->input('quantity'),
        ];
        
        $result = [];
        for ($i = 0; $i < count($data['id']); $i++) {
            $result[] = [
                'id' => $data['id'][$i],
                'product_code' => $data['id'][$i],
                "currency" => $data['currency'][$i],
                "unit" => $data['unit'][$i],
                "dimension" => $data['dimension'][$i],
                "product_name" => $data['product_name'][$i],
                "price_normal" => $data['price_normal'][$i],
                "price_diskon" => $data['price_diskon'][$i],
                "discount" => $data['discount'][$i],
                "subtotal" => $data['subtotal'][$i],
                "quantity" => $data['quantity'][$i],
            ];
        }

        $transaction = TransactionHeader::where('id',auth()->user()->id)->get();
    
        foreach ($result as $data) {
            $last_id = TransactionDetail::max('id');
            if($last_id == null){
                $document_number = 001;
                TransactionDetail::create([
                    'document_code' => $transaction[0]['document_code'],
                    'document_number' => $document_number,
                    'product_code' => $data['product_code'],
                    'price' => $data['price_diskon'],
                    'quantity' => $data['quantity'],
                    'unit' => $data['unit'],
                    'sub_total' => $data['subtotal'],
                    'currency' => $data['currency'],
                    'user' => auth()->user()->name,
                ]);
            } else {
                $document_number = $last_id+1;
                TransactionDetail::create([
                    'document_code' => $transaction[0]['document_code'],
                    'document_number' => $document_number,
                    'product_code' => $data['product_code'],
                    'price' => $data['price_diskon'],
                    'quantity' => $data['quantity'],
                    'unit' => $data['unit'],
                    'sub_total' => $data['subtotal'],
                    'currency' => $data['currency'],
                    'user' => auth()->user()->name,
                ]);
            }
        }

        return redirect('/report');
    }

    public function report(){
        $data = TransactionDetail::all();
        if(count($data) == 0){
            return redirect('/');
        }
        foreach($data as $item){
            $data = Product::where('id', $item->product_code)->get();
            $result[] = [
                'transaction' => $item->document_code."-".sprintf("%03d", $item->document_number),
                'user' => $item->user,
                'total' => $item->sub_total,
                'date' => $item->created_at ,
                'item' => $data[0]['product_name']." x".$item->quantity,
            ];
        }

        return view('report', ['data' => $result]);
        
    }
}
