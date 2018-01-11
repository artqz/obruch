<?php

namespace App\Http\Controllers\Admin;

use App\Inbox;
use App\Outbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EdocController extends Controller
{
    public function index()
    {

        return view('admin.edoc.index');
    }

    public function inbox_index()
    {
        $inboxes = Inbox::all();
        return view('admin.edoc.inboxes.index', compact('inboxes'));
    }

    public function inbox_create()
    {
        return view('admin.edoc.inboxes.create');
    }

    public function inbox_store(Request $request)
    {
        $this->validate($request, [
            'reg_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'number' => 'required|string',
            'folder' => 'required|string'
        ]);

        $user = Inbox::create([
            'reg_number' => $request->input('reg_number'),
            'name' => $request->input('name'),
            'reg_date' => $request->input('reg_date'),
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'folder' => $request->input('folder'),
            'organization_id' => 1
        ]);

        return redirect('admin/edoc/inbox/')
        //return redirect('admin/edoc/inbox/'. $user->id)
            ->with([
                'flash_message' => 'Вы успешно добавили входящий документ '.$request->input('name'),
                'flash_message_status' => 'success',
            ]);
    }

    public function outbox_index()
    {
        $outboxes = Outbox::all();
        return view('admin.edoc.outboxes.index', compact('outboxes'));
    }
}
