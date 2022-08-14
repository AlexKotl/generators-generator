<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Generator;
use App\Models\GeneratorStep;
use App\Models\GeneratorStepItem;
use App\Models\User;
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

    public function delete($id, Request $request)
    {
        $generator = Generator::findOrFail($id);

        if ($request->header('email') !== $generator->user->email) {
            return response()->json([
                'status' => 403,
                'message' => 'User check failed, generator does not belongs to ' . $request->header('email'),
            ]);
        }

        foreach ($generator->generatorSteps as $step) {
            GeneratorStepItem::where('generator_step_id', $step->id)->delete();
            $step->delete();
        }
        $generator->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Generator deleted',
        ]);
    }

    public function generate($id)
    {
        $generator = Generator::findOrFail($id);
        $generator->rating++;
        $generator->save();

        $words = [];
        foreach ($generator->generatorSteps as $step) {
            $words[] = $step->generatorStepItems->random()->title;
        }

        return response()->json(['words' => $words]);
    }

    public function create(Request $request)
    {
        if (empty($request->get('title'))) {
            return response()->json([
                'error' => 'Empty title',
            ]);
        }

        $user = User::where('email', $request->header('email'))->first();

        if (!$user) {
            return response()->json([
                'status' => 403,
                'message' => 'User auth fail'
            ]);
        }

        $generator = Generator::create([
            'user_id' => $user->id,
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
