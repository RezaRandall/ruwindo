<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderProcessController extends Controller
{
    public function order(){
        return view('orderProcess');
    }

    // Get Item Master List dropdown
    function getItemMasterList(){
        $itemList = DB::table('barangs')->orderBy('nama_barang', 'ASC')->get();
        return view('orderProcess', ['listItem' => $itemList]);
    }

    public function storeOrder(Request $request){
    // Explode the ID and Name and put them in array respectively.
    $extracted = explode(":", $request -> itemIdSelected);
    $priceToInt = explode("Rp. ", $request -> totalPrice);

        DB::table('transaksis')->insert([
            'id_user' => $request -> userId,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('detail_transaksis')->insert([
            'id_barang' => (int)$extracted[0],
            'jumlah_barang' => $request -> qty,
            'harga' => (int)$priceToInt[1],
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        return redirect('orderProcess');
    }

    public function getItemPrice(Request $request)
    {
        $itemPrice = DB::table('barangs')
                    ->select('harga_jual','stok')
                    ->where('id_barang', $request->id_barang)
                    ->first();
        return response()->json($itemPrice);
    }
}
