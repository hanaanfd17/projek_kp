<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\DataMasuk;
use App\Models\Petani;
use App\Models\DataHutang;
use App\Models\Konstanta;
use App\Models\Bodys1;
use App\Models\Bodys2;
use App\Models\Bodys3;
use App\Models\Bodys4;
use App\Models\HalamanRelated;
use App\Models\Anggota;
use Hashids\Hashids;

class DocumentController extends Controller
{
    public function showReport(Request $request)
{
    try {
        $encryptedId = $request->input('Id');
        $id = Crypt::decryptString($encryptedId);
        
        return view('report', compact('id'));
    } catch (\Exception $e) {
        return abort(404); 
    }
}

    public function showDataMasuk()
    {
        return view('hasil_ph.dataMasuk');
    }

    public function getReportData($id)
    {
        $dataMasuk = DataMasuk::find($id);
        $petani = Petani::find($dataMasuk->idPetani);
        $dataHutang = DataHutang::find($dataMasuk->idHutang);
        $konstata = Konstanta::find(1);
    
        $body1s = Bodys1::all();
        $body2s = Bodys2::all();
        $body3s = Bodys3::all();
        $body4s = Bodys4::all();
        $anggotas = Anggota::all();
        $halamanRelated = HalamanRelated::find(1);
    
        return response()->json([
            'petani' => $petani,
            'dataMasuk' => $dataMasuk,
            'dataHutang' => $dataHutang,
            'konstata' => $konstata,
            'body1s' => $body1s,
            'body2s' => $body2s,
            'body3s' => $body3s,
            'body4s' => $body4s,
            'anggotas' => $anggotas,
            'halamanRelated' => $halamanRelated,
        ]);
    }

    public function getDataMasuk()
    {
        $dataMasuk = DataMasuk::all()->map(function($item) {
            $item->encrypted_id = Crypt::encryptString($item->id);
            return $item;
        });
    
        return response()->json(['dataMasuk' => $dataMasuk]);
    }
    
}
