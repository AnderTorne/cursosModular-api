<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::all();
        return response()->json($service);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();
        $data = [
            'message' => 'Servicio creado correctamente',
            'service' => $service
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();
        $data = [
            'message' => 'Servicio actualizado correctamente',
            'service' => $service
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        $data = [
            'message' => 'Servicio eliminado correctamente',
            'service' => $service
        ];
        return response()->json($data);
    }

    public function clients(Request $request)
    {
        $service = Service::find($request->service_id);
        $clients = $service->clients;
        $data = [
            'message' => 'Clients of service',
            'clients' => $clients
        ];
        return response()->json($data);
    }
}
