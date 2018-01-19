<?php

namespace App\Http\Controllers\Admin;

use App\Inbox;
use App\Rules\ValidInboxId;
use App\Outbox;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\InputDefinition;

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

    public function inbox_show($id)
    {
        $inbox = Inbox::where('id', $id)->first();
        return view('admin.edoc.inboxes.edit', compact('inbox'));
    }

    public function inbox_update($id, Request $request)
    {
        dd($request);
        $inbox = Inbox::where('id', $id)->first();
        if (!$inbox) {
            return redirect(url()->previous())
                ->with([
                    'flash_message' => 'Нет такого айди',
                    'flash_message_status' => 'danger',
                ]);
        }

        $this->validate($request, [
            'reg_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'number' => 'required|string',
            'folder' => 'required|string',
            'organization' => 'required',
            'tags' => 'required'
        ]);

        Inbox::where('id', $id)
            ->update([
                'reg_number' => $request->input('reg_number'),
                'name' => $request->input('name'),
                'reg_date' => $request->input('reg_date'),
                'number' => $request->input('number'),
                'date' => $request->input('date'),
                'folder' => $request->input('folder'),
                'organization_id' => $request->input('organization')
            ]);

        $inbox->tags()->sync($request->input('tags'));

        return redirect(url()->previous())
            ->with([
                'flash_message' => 'Вы успешно обновили информацию',
                'flash_message_status' => 'success',
            ]);
    }

    public function inbox_create()
    {
        //Получаем текущий год
        $year_now =  Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->year;
        $inbox_next_number = Inbox::whereYear('reg_date', $year_now)->where('is_hide', 0)->max('reg_number') + 1;
        return view('admin.edoc.inboxes.create', compact('inbox_next_number'));
    }

    public function inbox_store(Request $request)
    {
        //dd($request);

        $this->validate($request, [
            'reg_number' => ['required','string','max:255', new ValidInboxId],
            'name' => 'required|string|max:255',
            'number' => 'required|string',
            'folder' => 'required|string',
            'organization' => 'required',
            'tags' => 'required'
        ]);

        $inbox_get = Inbox::where('reg_number', $request->input('reg_number'))->first();
        if ($inbox_get) {
            return redirect()
                ->back()
                ->with([
                    'flash_message' => 'Такой регистрационный номер уже существует',
                    'flash_message_status' => 'danger',
                ]);
        }

        $inbox = Inbox::create([
            'reg_number' => $request->input('reg_number'),
            'name' => $request->input('name'),
            'reg_date' => $request->input('reg_date'),
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'folder' => $request->input('folder'),
            'organization_id' => $request->input('organization')
        ]);

        /* Автосоздание тегов
        foreach ($request->tags as $tag) {

            if (is_numeric($tag))
            {
                $tagArr[] =  $tag;
            }
            else
            {
                // if the tag not numeric thats meaninig that its new tag and we should create it
                $newTag = Tag::create(['name'=>$tag]);

                // the new Tag id is 3 for exaple
                $tagArr[] = $newTag->id;
            }

            //now we have new array of tags id , example (1,2,3)
        }
        */

        $inbox->tags()->sync($request->input('tags'), false);

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
