<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function publications()
    {
        $publications = Publication::orderBy('created_at', 'asc')->paginate(10);
        return view('.admin.publications', compact('publications'));
    }

    public function publications_fetch(Request $request)
    {
        if ($request->ajax()) {
            $per_page = $request->get('choose');
            $sort_by = $request->get('sort');
            if(!$sort_by)
                $sort_by = 'asc';
            if(!$per_page)
                $per_page = 10;
            $publications = Publication::orderBy('created_at', $sort_by)->paginate($per_page);
            return view('/admin.publications-fetch', compact('publications'))->render();
        }
    }

    public function requests()
    {
        return view('/admin.requests', ['publications' => Publication::where(['status' => 'pending'])->get()]);
    }

    public function requestConfirm($id)
    {
        Publication::where(['id' => Publication::findOrFail($id)->id])->update([
            'status' => 'confirm'
        ]);
        return redirect(route('requests'));
    }

    public function requestReject($id)
    {
        Publication::where(['id' => Publication::findOrFail($id)->id])->update([
            'status' => 'reject'
        ]);
        return view('/message.create-message', ['publication' => Publication::findOrFail($id)]);
    }


    public function users()
    {
        $users = User::orderBy('created_at', 'asc')->paginate(10);
        return view('/admin.users', compact('users'));
    }

    public function users_fetch(Request $request)
    {
        if ($request->ajax()) {
            $per_page = $request->get('choose');
            $sort_by = $request->get('sort');
            if(!$sort_by)
                $sort_by = 'asc';
            if(!$per_page)
                $per_page = 10;
            $users = User::orderBy('created_at', $sort_by)->paginate($per_page);
            return view('/admin.users-fetch', compact('users'))->render();
        }
    }

    public function userBan($id)
    {
        User::where(['id' => User::findOrFail($id)->id])->update([
            'status' => 'banned'
        ]);
        return redirect(route('users'));
    }

    public function userUnban($id)
    {
        User::where(['id' => User::findOrFail($id)->id])->update([
            'status' => 'active'
        ]);
        return redirect(route('users'));
    }
}
