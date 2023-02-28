<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Genero;
use Illuminate\Http\Request;

/**
 * Class PeliculaController
 * @package App\Http\Controllers
 */
class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas = Pelicula::paginate();

        return view('pelicula.index', compact('peliculas'))
            ->with('i', (request()->input('page', 1) - 1) * $peliculas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
  {
    $pelicula = new Pelicula();
    $genero = Genero::pluck('nombre','id');
    return view('pelicula.create', compact('pelicula','genero'));
  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pelicula::$rules);

        $pelicula = Pelicula::create($request->all());

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula se creó correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelicula = Pelicula::find($id);

        return view('pelicula.show', compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
      $pelicula = new Pelicula();
      $genero = Genero::pluck('nombre','id');
      return view('pelicula.create', compact('pelicula','genero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pelicula $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        request()->validate(Pelicula::$rules);

        $pelicula->update($request->all());

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula se actualizó correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pelicula = Pelicula::find($id)->delete();

        return redirect()->route('peliculas.index')
            ->with('success', 'Pelicula se borró correctamente');
    }
}
