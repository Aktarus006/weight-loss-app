<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Measurement;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMeasurementRequest;
use App\Models\Client;

class MeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Measurements/Index', [
            'measurements' => Measurement::orderBy('created_at', 'desc')->with('client')->paginate(10)->through(function ($measurement) {
                return [
                    'id' => $measurement->id,
                    'weight_kg' => $measurement->weight_kg,
                    'fat_percentage' => $measurement->fat_percentage,
                    'blood_pressure' => $measurement->blood_pressure,
                    'client_id' => $measurement->client_id,
                    'client_first_name' => $measurement->client->first_name,
                    'client_last_name' => $measurement->client->last_name,
                    'client_birthday' => $measurement->client->birthday,
                    'client_email' => $measurement->client->email,
                    'client_length_cm' => $measurement->client->length_cm,
                    'client_profile_photo' => asset('storage/' . $measurement->client->profile_photo),
                    'created_at' => $measurement->created_at->format('d.m.Y H:i'),
                ];
            })
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Measurements/Create', [
            'clients' => Client::orderBy('last_name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMeasurementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeasurementRequest $request)
    {
        $measurement = Measurement::create($request->all());

        return redirect()->route('measurements.show', $measurement)->banner('Measurement created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function show(Measurement $measurement)
    {
        $client = Client::find($measurement->client_id);
        $client->profile_photo = asset('storage/' . $client->profile_photo);
        $measurement->created_at = $measurement->created_at->format('d.m.Y');
        return Inertia::render('Measurements/Show', [
            'measurement' => $measurement,
            'client' => $client
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function edit(Measurement $measurement)
    {
        return Inertia::render('Measurements/Edit', [
            'measurement' => $measurement,
            'clients' => Client::orderBy('last_name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreMeasurementRequest  $request
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMeasurementRequest $request, Measurement $measurement)
    {
        $measurement->update($request->all());

        return redirect()->route('measurements.show', $measurement)->banner('Measurement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Measurement  $measurement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measurement $measurement)
    {
        $measurement->delete();

        return redirect()->route('measurements.index')->banner('Measurement deleted successfully');
    }
}
