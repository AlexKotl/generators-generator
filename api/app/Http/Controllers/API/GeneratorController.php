<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Generator;
use App\Models\GeneratorStep;
use App\Models\GeneratorStepItem;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    public function list()
    {
        $generators = Generator::where('flag', 1)->get();

        return response()->json($generators);
    }

    public function details($id)
    {
        $generator = Generator::where('id', $id)->with('generatorSteps')->with('generatorSteps.generatorStepItems')->firstOrFail();
        return response()->json($generator);
    }

    public function create(Request $request)
    {
        if (empty($request->get('title'))) {
            return response()->json([
                'error' => 'Empty title',
            ]);
        }

        $generator = Generator::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);

        foreach ($request->get('variants') as $variants) {

            $variants = explode("\n", $variants);
            $variants = array_filter($variants, function ($item) {
                return strlen(trim($item)) > 1;
            });

            if (count($variants) > 1) {

                $generatorStep = GeneratorStep::create(['generator_id' => $generator->id]);
                foreach ($variants as $variant) {
                    GeneratorStepItem::create([
                        'generator_step_id' => $generatorStep->id,
                        'title' => $variant,
                    ]);
                }
            }
        }

        return response()->json([
            'status' => 200,
        ]);
    }
}
