<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Array of Static Data
    /*private static function getData(){
       return [
            ['id' => 1, 'name' => 'LG', 'Price' => 500],
            ['id' => 2, 'name' => 'Samsung', 'Price' => 500],
            ['id' => 3, 'name' => 'Toshiba', 'Price' => 500],
        ];
    }*/

    public function index()
    {
        return view('computers.index', [
            // 'computers' => self::getData()
            'computers' => Computer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('computers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
            'origin' => "required",
            'price' => "required|integer",
        ]);
        $computer = new Computer();
        $computer->name = $request->input('name');
        $computer->origin = $request->input('origin');
        $computer->price = $request->input('price');
        $computer->save();
        return redirect()->route('computers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($computer)
    {
        /*
        $computers = self::getData();
        $index = array_search($computer, array_column($computers,'id'));

        if($index === false ){
            return abort(404);
        }
        */
        $index = Computer::findOrFail($computer);
        return view('computers.show', [
            'computer' => $index
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('computers.edit', [
            'computer' => Computer::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $computer)
    {
          $request->validate([
            'name' => "required",
            'origin' => "required",
            'price' => "required|integer",
        ]);
        $to_update = Computer::findOrFail($computer);
        $to_update->name = strip_tags($request->input('name'));
        $to_update->origin = strip_tags($request->input('origin'));
        $to_update->price = strip_tags($request->input('price'));
        $to_update->save();
        return redirect()->route('computers.show', $computer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($computer)
    {
        $to_delete = Computer::findOrFail($computer);
        $to_delete->delete();
        return redirect()->route('computers.index');
    }
}
