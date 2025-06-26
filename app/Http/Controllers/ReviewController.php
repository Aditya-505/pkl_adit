<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validete([
            'point' => 'required|integer|min:1|max:5',
            'coment' => 'required|string',

        ]);
        $review = new Review();
        $review->user_id     = auth()->user()->id;
        $review->product_id  = $request->product_id;
        $review->point       = $request->point;
        $review->comment     = $request->comment;
        $review->seve();

        toats('Terimakasih atas ulasan anda', 'success');
        return back();
    }
}
