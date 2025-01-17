<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Policies\OrderPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante)  
    {
        return view('vacantes.show',[
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante)
    {
        //
        //$this->authorize( 'update', $vacante );
        if( !auth()->check() )
        {
            return redirect()->route( 'welcome' );
        }
        if( auth()->user()->id !== $vacante->user_id )
        {
            return redirect()->route( 'vacantes.index' );
        }
 
        return view( 'vacantes.edit', [
            'vacante' => $vacante
        ] );
    }

    
}
