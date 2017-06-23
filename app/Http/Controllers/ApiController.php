<?php

namespace App\Http\Controllers;

use App\Definition;
use App\Emoji;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function all()
    {
        return response()->json(Emoji::get());
    }

    public function show($emoji_id)
    {
        return response()->json(Definition::with('emoji')->where('emoji_id', $emoji_id)->get());
    }

}
