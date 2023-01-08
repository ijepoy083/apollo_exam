<?php

namespace App\Http\Controllers;

use App\Models\Breakdown;
use App\Models\Random;
use Faker\Factory as Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RandomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Random $random, Breakdown $breakdown)
    {
        return view('apollo_exam');
    }
    public function getBreakdown(Random $random, Breakdown $breakdown)
    {
        return Breakdown::whereIn('random_id', Random::where('flag', 0)->get(['id']))->get();
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
        DB::beginTransaction();
        Random::where('flag', 0)->update(['flag' => '1']);
        $first_random_number = rand(5, 10);
        $faker = Faker::create();
        for ($x = 0; $x < $first_random_number; $x++) {
            $random_table = new Random();
            $random_table->values = $faker->name;
            $random_table->save();

            $second_random_number =   rand(5, 10);

            for ($i = 0; $i < $second_random_number; $i++) {
                $fake_name = $faker->regexify('[A-Z0-9]{5}');
                $breakdown_table = new Breakdown();
                $breakdown_table->values = $fake_name;
                $breakdown_table->random_id = $random_table->id;
                $breakdown_table->save();
            }
        }
        DB::commit();
        return response()->json(['message' => 'Successfully Generated']);
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
