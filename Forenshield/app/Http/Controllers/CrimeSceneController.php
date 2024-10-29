<?php

namespace App\Http\Controllers;

use App\Models\CrimeScene;
use App\Models\CrimeSceneInvestigator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrimeSceneController extends Controller
{
    public function index()
    {
        $investigators = User::where('is_admin', false)->get();
        $data = CrimeScene::orderByDesc('id')->paginate(10);
        return view('pages.crime-scenes', compact(['data', 'investigators']));
    }

    public function find(Request $request)
    {
        $data = [];

        foreach (
            CrimeScene::select('id', 'name', 'nic')->where('nic', 'LIKE', '%' . $request->term . '%')
                ->get() as $key => $value
        ) {
            $data[] = ['id' => $value->id, 'text' => $value->name . ' (' . $value->nic  . ')'];
        }

        return $data;
    }

    public function enroll(Request $request)
    {
        $request->validate([
            'isnew' => 'required|in:1,2',
            'investigator' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|min:1|max:400000',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->isnew == 1) {
            $id = CrimeScene::create($data);
            CrimeSceneInvestigator::create([
                'crime_scene' => $id->id,
                'investigator' => $request->investigator
            ]);
        } else {

            $rec = CrimeScene::where('id', $request->record)->first();
            CrimeScene::where('id', $request->record)->update($data);
            if ($request->investigator != $rec->investigator) {
                CrimeSceneInvestigator::create([
                    'crime_scene' => $request->record,
                    'investigator' => $request->investigator
                ]);
            }
        }
        return redirect()->back()->with(['code' => 1, 'color' => 'success', 'msg' => 'Successfully ' . (($request->isnew == 1) ? 'Registered' : 'Updated')]);
    }

    public function deleteOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:crime_scenes,id'
        ]);
        CrimeScene::where('id', $request->id)->delete();

        return redirect()->back()->with(['code' => 1, 'color' => 'danger', 'msg' => 'Successfully Removed']);
    }

    public function getOne(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:crime_scenes,id'
        ]);
        return CrimeScene::where('id', $request->id)->with(['investigatorsData', 'history'])->first();
    }
}
