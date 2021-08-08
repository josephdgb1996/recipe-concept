<?php

namespace App\Http\Controllers;
use App\Rating;
use Illuminate\Http\Request;
use App\Http\Resources\Rating as RatingResource;

class CalificacionController extends Controller
{
    public function setrating (Request $request)
    {
            return new RatingResource(Rating::create([
                'receta_id' => $request->get('receta'),
                'user_id' => $request->get('user'),
                'rating' => $request->get('rating')
            ]));
    }

    public function getrating($id){
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
$out->writeln("Hello from Terminal");
$out->writeln($id);

        return RatingResource::collection(Rating::all()->where('receta_id', $id));
    }
}
