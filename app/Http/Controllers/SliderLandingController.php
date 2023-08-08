<?php

use App\Models\Slider; // Asegúrate de importar el modelo Slider

public function index()
{
    $sliders = Slider::all();
    return view('sliders.index', compact('sliders'));
}
