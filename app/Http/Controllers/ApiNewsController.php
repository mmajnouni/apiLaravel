<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\apiNews;
class ApiNewsController extends Controller
{
    function getnews() {
        $url = http::get("https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=de9b9f357e0142e38ccab662b9de16ca");
        $converted = $url->json();

        foreach ($converted['articles'] as $data) {
            $save = new apiNews();
            $save->titles = $data['title'];
            $save->images = $data['urlToImage'];
            $save->description = $data['description'];
            $save->save();
        }
        //return $converted;
    }

    function shownews() {
        $data = apiNews::all();
        return view('shownews', compact('data'));
    }
}
