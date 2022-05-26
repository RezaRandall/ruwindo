<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function getBarang()
    {
    	$barang = Barang::all();
    	return view('barang', ['barang' => $barang]);
    }

    // insert data method in to table barang
    public function storeBarang(Request $request){
        DB::table('barangs')->insert([
            'nama_barang' => $request -> nameItem,
            'stok' => $request -> stockItem,
            'harga_jual' => $request -> hargaItem,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('barang');
    }

    public function edit($id){
        // take data from table barang by selected id
        $items = DB::table('barangs')->where('id_barang', $id)->get();

        // parsing data item get obtained from selected item
        return view('edit', ['editBarang' => $items]);
    }

    public function update(Request $request){
        $add = $request -> input('addQty');
        if($add == null || $add == ""){
            DB::table('barangs')->where('id_barang', $request -> id)->update([
                'nama_barang' => $request -> namaItem,
                'stok' => $request -> QtyItem,
                'harga_jual' => $request -> HargaItem,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }else{
            DB::table('barangs')->where('id_barang', $request -> id)->update([
                'nama_barang' => $request -> namaItem,
                'stok' => $request -> qtyTotal,
                'harga_jual' => $request -> HargaItem,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect('/barang');
    }

        // delete data method from table barang
        public function deleteBarang($id){
            DB::table('barangs')->where('id_barang', $id)->delete();

            // switch page back to index
            return redirect('barang');
        }

}
