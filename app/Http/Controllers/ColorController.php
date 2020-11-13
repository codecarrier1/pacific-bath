<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Requests\CreateColorRequest;

class ColorController extends Controller
{
    public function index()
    {
        return response()->json(Color::all());
    }

    public function store(CreateColorRequest $request)
    {
        $data = $request->validated();
        $colors = $data['colors'];
        $models = collect();
        foreach ($colors as $color) {
            if (isset($color['id'])) {
                $model = Color::findOrFail($color['id']);
                $model->update(['name' => $color['name']]);
                if (isset($color['swatch'])) {
                    $model->getFirstMedia()->delete();
                    $model->addMedia($color['swatch'])->toMediaCollection('swatch');
                }
                $models->push($model);
                continue;
            }
            $model = Color::create(['name' => $color['name']])->addMedia($color['swatch'])->toMediaCollection('swatch');
            $models->push($model);
        }

        return response()->json($models->toArray());
    }
}
