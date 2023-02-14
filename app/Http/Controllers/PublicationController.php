<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Jobs\PublicationFormJob;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function create()
    {
        return view('/profile.create');
    }

    public function createStore(PublicationRequest $request)
    {
        $request->validated();
        $file = $request->file('img');
        $name = time().$file->getClientOriginalName();
        $publication = Publication::create([
            'user_id' => $request->user()->id,
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'pet' => $request->input('pet'),
            'img' => $file->move('image', $name),
            'add_inf' => $request->input('add_inf')
        ]);
        PublicationFormJob::dispatch($publication);
        return redirect(route('publication.create'))->with('message', 'success');
    }

    public function pets()
    {
        return view('/layouts.pets', ['publications' => Publication::where(['status' => 'confirm'])->get()]);
    }

    public function pet($id)
    {
        return view('/layouts.pet', ['publication' => Publication::findOrFail($id)]);
    }
}
