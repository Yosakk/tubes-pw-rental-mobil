<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use Storage;

class MobilController extends Controller
{
    public function indexMobil()
    {
        $mobil = Mobil::latest()->paginate(6);
        return view('User.mobil.list-mobil', compact('mobil'));
    }

    public function indexMobilAdmin()
    {
        $mobil = Mobil::latest()->paginate(6);
        return view('Admin.dataMobil.data-mobil', compact('mobil'));
    }

    public function cariMobil(Request $request)
    {
        $cari = $request->cari;
        if ($cari == null) {
            return redirect()->route('list-mobil');
        }
        $mobil = Mobil::where('model', 'like', "%$cari%")
            ->orWhere('bahan_bakar', 'like', "%$cari%")
            ->orWhere('transmisi', 'like', "%$cari%")
            ->orWhere('jumlah_kursi', 'like', "%$cari%")
            ->orWhere('tahun_produksi', 'like', "%$cari%")
            ->orWhere('warna', 'like', "%$cari%")
            ->orWhere('tarif', 'like', "%$cari%")
            ->paginate(6);
        return view('User.mobil.list-mobil', compact('mobil'));
    }

    public function create()
    {
        return view('Admin.dataMobil.input-mobil');
    }

    public function store(Request $request)
    {

        $request->validate([
            'registerFoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'registerModel' => 'required',
            'registerBahanBakar' => 'required',
            'registerTransmisi' => 'required',
            'registerKursi' => 'required',
            'registerTahun' => 'required',
            'registerWarna' => 'required',
            'registerTarif' => 'required',
            'registerStatus' => 'required',
        ]);


        $image = time() . '.' . $request->registerFoto->extension();
        Storage::put('public/' . $image,
            file_get_contents($request->registerFoto->getRealPath()));
        $imageUrl = Storage::url($image);

        Mobil::create([
            'gambar' => env('APP_URL') . $imageUrl,
            'model' => $request->registerModel,
            'bahan_bakar' => $request->registerBahanBakar,
            'transmisi' => $request->registerTransmisi,
            'jumlah_kursi' => $request->registerKursi,
            'tahun_produksi' => $request->registerTahun,
            'warna' => $request->registerWarna,
            'tarif' => $request->registerTarif,
            'status' => $request->registerStatus
        ]);
        return redirect()->route('data-mobil');

    }

    public function update(string $id)
    {
        $mobil = Mobil::findOrfail($id);
        return view('Admin.dataMobil.edit-mobil', compact('mobil'));
    }

    public function edit(Request $request, $id)
    {
        
        $request->validate([
            'registerModel' => 'required',
            'registerBahanBakar' => 'required',
            'registerTransmisi' => 'required',
            'registerKursi' => 'required',
            'registerTahun' => 'required',
            'registerWarna' => 'required',
            'registerTarif' => 'required',
        ]);
        
        $mobil = Mobil::findOrfail($id);
        
        if (!$request->registerFoto) {
            
            $mobil->update([
                'model' => $request->registerModel,
                'bahan_bakar' => $request->registerBahanBakar,
                'transmisi' => $request->registerTransmisi,
                'jumlah_kursi' => $request->registerKursi,
                'tahun_produksi' => $request->registerTahun,
                'warna' => $request->registerWarna,
                'tarif' => $request->registerTarif,
                'status' => $request->registerStatus
            ]);
            
        } else {
            $image = time() . '.' . $request->registerFoto->extension();
            Storage::put('public/' . $image,
                file_get_contents($request->registerFoto->getRealPath()));
            $imageUrl = Storage::url($image);

            $mobil->update([
                'gambar' => env('APP_URL') . $imageUrl,
                'model' => $request->registerModel,
                'bahan_bakar' => $request->registerBahanBakar,
                'transmisi' => $request->registerTransmisi,
                'jumlah_kursi' => $request->registerKursi,
                'tahun_produksi' => $request->registerTahun,
                'warna' => $request->registerWarna,
                'tarif' => $request->registerTarif,
                'status' => $request->registerStatus
            ]);
        }
        return redirect()->route('data-mobil');
    }

    public function destroy($id)
    {
        $mobil = Mobil::findOrfail($id);
        $mobil->delete();
        return redirect()->route('data-mobil');
    }

    //fungsi freestyle
    // public function cariMobilSelect(Request $request)
    // {
    //     $data = json_decode($request->input('data'), true);
    //     $cari = $request->cari;
    //     if ($cari == null) {
    //         return redirect()->back();
    //     }
    //     $mobil = Mobil::where('model', 'like', "%$cari%")
    //         ->orWhere('bahan_bakar', 'like', "%$cari%")
    //         ->orWhere('transmisi', 'like', "%$cari%")
    //         ->orWhere('jumlah_kursi', 'like', "%$cari%")
    //         ->orWhere('tahun_produksi', 'like', "%$cari%")
    //         ->orWhere('warna', 'like', "%$cari%")
    //         ->orWhere('tarif', 'like', "%$cari%")
    //         ->paginate(6);
    //     return view('User.mobil.list-mobil-select', compact('data','mobil'));
    // }
}
