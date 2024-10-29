<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use Cloutier\PhpIpfsApi\IPFS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EvidenceController extends Controller
{
    public function index($id)
    {
        $data = Attachments::where('crime_scene', $id)->orderByDesc('id')->paginate(10);
        return view('pages.attachments', compact('data', 'id'));
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:crime_scenes,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|min:1|max:400000',
            'attachment' => 'required|max:20000'
        ]);

        // $path = Storage::disk('public')->putFile('attachments', $request->file('attachment'));

        //using IPFS
        $ipfs = new IPFS("localhost", "8080", "5001");

        $hash = $ipfs->add(file_get_contents($request->file('attachment')->getPathname()));

        $data = [
            'crime_scene' => $request->id,
            'name' => $request->name,
            'description' => $request->description,
            'path' => $hash
        ];

        Attachments::create($data);

        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Successfully Registered']);
    }

    public function deleteOne(Request $request)
    {
        Attachments::where('id', $request->id)->delete();
        return Redirect::to(route('admin.attachments.index', ['id' => $request->cid]));
    }

    public function show($hash)
    {
        //using IPFS
        $ipfs = new IPFS("localhost", "8080", "5001");
        return $ipfs->cat($hash);
    }
}
