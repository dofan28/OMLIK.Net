<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_pembayaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class pembayaranController extends Controller
{
       public function index()
    {

        $pembayarans = tb_pembayaran::latest()->paginate(5);

        return view('pembayaran.index', compact('pembayarans'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('pembayaran.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */

      public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
              'nama' => 'required|max:255',
            'bulan' => 'required',
            'tahun' => 'required',
            'nominal' => 'required',
            'tgl_bayar' => 'required',
            'status' => 'required',
        ]);

        tb_pembayaran::create([
            'nama' => $request->nama,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nominal' =>$request->nominal,
            'tgl_bayar' => $request->tgl_bayar,
            'status' =>$request->status,

        ]);

        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

   /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(tb_pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, tb_pembayaran $pembayaran)
    {

        //validate form
        $this->validate($request, [
                'nama' => 'required|max:255',
            'bulan' => 'required',
            'tahun' => 'required',
            'nominal' => 'required',
            'tgl_bayar' => 'required',
            'status' => 'required',
        ]);

            //update post without image
            $pembayaran->update([
            'nama' => $request->nama,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
            'nominal' =>$request->nominal,
            'tgl_bayar' => $request->tgl_bayar,
            'status' =>$request->status,
            ]);


        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

     public function destroy(tb_pembayaran $pembayaran)
    {
        //delete post
        $pembayaran->delete();
        //redirect to index
        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
