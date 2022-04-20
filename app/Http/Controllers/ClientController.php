<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Models\Measurement;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Clients/Index', [
            'clients' => Client::orderBy('last_name')->paginate(10)->through(function ($client) {
                return [
                    'id' => $client->id,
                    'email' => $client->email,
                    'first_name' => $client->first_name,
                    'last_name' => $client->last_name,
                    'birthday' => $client->birthday,
                    'length_cm' => $client->length_cm,
                    'profile_photo' => asset('storage/' . $client->profile_photo)
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
        return Inertia::render('Clients/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        $image_path = $this->uploadFile($request->file('profile_photo'));
        $data = $request->all();
        $data['profile_photo'] = $image_path;
        $client = Client::create($data);

        return redirect()->route('clients.show', $client)->banner('Client created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $client->profile_photo = asset('storage/' . $client->profile_photo);
        return Inertia::render('Clients/Show', [
            'client' => $client,
            'measurements' => Measurement::where('client_id', $client->id)->orderBy('created_at', 'desc')->paginate(10)->through(function ($measurement) {
                return [
                    'id' => $measurement->id,
                    'weight_kg' => $measurement->weight_kg,
                    'fat_percentage' => $measurement->fat_percentage,
                    'blood_pressure' => $measurement->blood_pressure,
                    'created_at' => $measurement->created_at->format('d/m/Y H:i:s')
                ];
            })
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return Inertia::render('Clients/Edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients.show', $client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }

    private function uploadFile($request)
    {
        return $image_path = $request->store('image', 'public');
    }
}
