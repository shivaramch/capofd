<?php

namespace App\Http\Controllers;
use App\Fmla;
use App\Attachment;
use App\Http\Requests\UpdateFmlasRequest;
use App\Http\Requests\StoreFmlasRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FmlaController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
        $fmlas = Fmla::all();
        if (Auth::user()->roleid == 1) {
            return view('fmlas.index', compact('fmlas'));
        }
        else {
            return view('errors.access');
        }
    }

    public function create()
    {
        if (Auth::user()->roleid == 1) {
            return view('fmlas.create');
        }
        else {
            return view('errors.access');
        }
    }

    public function store(StoreFmlasRequest $request)
    {
        $request = $this->saveFiles($request);
        Fmla::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->FmlaUpload($request, $last_insert_id);

        return redirect()->route('fmlas.index')->with('message', 'Form Submitted Successfully');
    }

    public function edit($id)
    {
        $attachments = Attachment::where('fmlaid', $id)->get();
        $fmla = Fmla::findOrFail($id);
        if (Auth::user()->roleid == 1) {
            return view('fmlas.edit', compact('fmla', 'attachments'));
        }
        else {
            return view('errors.access');
        }
    }

    public function show($id)
    {
        $fmla = Fmla::findOrFail($id);
        $attachments = Attachment::where('fmlaid', $id)->get();

        if (Auth::user()->roleid == 1) {
            return view('fmlas.show', compact('fmla', 'attachments'));
        }
        else {
            return view('errors.access');
        }
    }

    public function update(UpdateFmlasRequest $request, $id)
    {
        $fmla = Fmla::findOrFail($id);
        \DB::table('fmlas')->where('fmlaid', $fmla->fmlaid)->update([
                'employeename' => $fmla->employeename,
                'employeeid' => $fmla->employeeid,
                'fromdate' => $fmla->fromdate,
                'todate' => $fmla->todate,
                'comments' => $fmla->comments]
        );
        $request = $this->saveFiles($request);
        $fmla->update($request->all());
        $this->FmlaUpload($request, $id);

        return redirect()->route('fmlas.index');
    }
}
