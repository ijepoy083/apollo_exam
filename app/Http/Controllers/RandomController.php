<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\Random;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class RandomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Random $random, Breakdown $breakdown)
    {
        //
        $random = Random::where('flag', 0)->get();
        $breakdown = Breakdown::where('random_id', $random->id->first());
        //return view('ao')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Random $random_table, Breakdown $breakdown_table)
    {
        //
        DB::beginTransaction();
        $random_number = rand(5, 10);
        $faker = Faker\Factory::create();
        for ($i = 0; $i <= $random_number; $i++) {

            $random_table->values = $faker->name; //values for random table
            $random_number = rand(5, 10);

            for ($i = 0; $i <= $random_number; $i++) {

                $breakdown_value = $faker->regexify('[A-Z]{5}[0-4]{3}');

                $breakdown_table->values = $breakdown_value;  //values for breakdown table
                $breakdown_table->random_id = $random_table->id;  //random id from random table
            }
        }
        DB::commit();
        return response()->json(['message' => 'Successfully Generated', 'data' => [$random_table, $breakdown_table]]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Random  $random
     * @return \Illuminate\Http\Response
     */
    public function show(Random $random)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Random  $random
     * @return \Illuminate\Http\Response
     */
    public function edit(Random $random)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Random  $random
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Random $random)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Random  $random
     * @return \Illuminate\Http\Response
     */
    public function destroy(Random $random)
    {
        //
    }
}
