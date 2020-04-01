<?php

namespace App\Http\Controllers;
use App\Daily;
use Illuminate\Http\Request;
use Auth;

class DailyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Daily::all();
        return response($data);
    }
    
    public function show($id)
    {
        $data = Daily::where('id',$id)->get();
        return response ($data);

    }
    public function store (Request $request)
    {
        try {
            $data = new Daily();
            $data->id_user              = $request->input('id_user');
            $data->team                 = $request->input('team');
            $data->activity_yesterday   = $request->input('activity_yesterday');
            $data->activity_today       = $request->input('activity_today');
            $data->problem_yesterday    = $request->input('problem_yesterday');
            $data->solution             = $request->input('solution');
            $data->save();
            return response()->json([
                'status'  => '1',
                'message' => 'Tambah Data Daily Scrum Berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'  => '0',
                'message' => 'Tambah Data Daily Scrum Gagal'
            ]);
        }
    }
    public function update(Request $request, $id){
        try {
            $data = Daily::where('id',$id)->first();
            $data->id_user              = $request->input('id_user');
            $data->team                 = $request->input('team');
            $data->activity_yesterday   = $request->input('activity_yesterday');
            $data->activity_today       = $request->input('activity_today');
            $data->problem_yesterday    = $request->input('problem_yesterday');
            $data->solution             = $request->input('solution');
            $data->save();

            return response()->json([
                'status'  => '1',
                'message' => 'Ubah Data Daily Scrum Berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'  => '0',
                'message' => 'Ubah Data Daily Scrum Gagal'
            ]);
        }
    }

    public function destroy($id){
        try {
            $data = Daily::where('id',$id)->first();
            $data->delete();

            return response()->json([
                'status'  => '1',
                'message' => 'Hapus Data Daily Scrum Berhasil'
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status'  => '0',
                'message' => 'Hapus Data Daily Scrum Gagal'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
