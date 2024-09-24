<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\ClientRepository;

class PassportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $client_repository = new ClientRepository();

        $clients = $client_repository->forUser(auth()->user()->id);

        return view('passports.index', compact('clients'));
    }

    public function create()
    {
        return view('passports.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'callback' => 'required',
        ]);

        $client_repository = new ClientRepository();

        $client = $client_repository->create(
            auth()->user()->id,
            $request->name,
            $request->callback,
        // $request->provider, // null
        // $request->personal_access, // false
        // $request->password, // false
        // $request->confidential, // true
        );

        // dd($client);

        return redirect()->route('passport:index');
    }

    public function delete($client)
    {
        $client_repository = new ClientRepository();

        $client_repository->find($client)->delete($client);

        return redirect()->route('passport:index');
    }

}
