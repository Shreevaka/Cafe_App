<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use Illuminate\Http\Request;
use domain\Facades\ClientFacade;
use App\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clients = ClientFacade::all();
            return view('pages.clients.index',compact('clients'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        try {

            $is_active = isset($request->is_active) ? 1 : 0;
            $request->merge(['is_active' => $is_active]);

            ClientFacade::store($request->all());

            return redirect()->route('client.index')->with('success', 'Client Added Successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            $client = ClientFacade::get($id);

            return view('pages.clients.edit', compact('client'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // try {

            $is_active = isset($request->is_active) ? 1 : 0;
            $request->merge(['is_active' => $is_active]);

            $client = ClientFacade::update($id, $request->all());

            return redirect()->route('client.index')->with('success', 'Client Updated Successfully');
        // } catch (Throwable $th) {
        //     return redirect()->back()->with('error', 'Something went wrong');
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $client = ClientFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Client Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
