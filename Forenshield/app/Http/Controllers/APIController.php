<?php

namespace App\Http\Controllers;

use App\Models\Data1;
use App\Models\DocumentAnalytics;
use App\Models\RawHistory;
use App\Models\RouterAnalytics;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class APIController extends Controller
{
    public function data1(Request $request)
    {
        try {
            Data1::create([
                'pir' => Crypt::encrypt($request->pir),
                'temperature' => Crypt::encrypt($request->temperature),
                'humidity' => Crypt::encrypt($request->humidity),
                'gas' => Crypt::encrypt($request->gas)
            ]);
            return 1;
        } catch (Exception $e) {
            return 2;
        }
    }

    public function data1Index(Request $request)
    {
        $query = Data1::whereNotNull('created_at');
        if ($request->has('start') && $request->filled('start')) {
            $query->where('created_at', '>=', $request->start);
        }
        if ($request->has('end') && $request->filled('end')) {
            $query->where('created_at', '<', $request->end);
        }
        $data = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.data1', compact(['data']));
    }

    public function data2(Request $request)
    {
        try {
            RawHistory::create([
                'crime_scene' => $request->id,
                'percentage_malicious' => $request->PercentageMalicious,
                'data' => json_encode($request->MaliciousWebSites),
            ]);
            return 1;
        } catch (Exception $e) {
            return 2;
        }
    }

    public function data2Index($id, Request $request)
    {
        $query = RawHistory::where('crime_scene', $id);
        if ($request->has('start') && $request->filled('start')) {
            $query->where('created_at', '>=', $request->start);
        }
        if ($request->has('end') && $request->filled('end')) {
            $query->where('created_at', '<', $request->end);
        }
        $data = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.data2', compact(['data', 'id']));
    }

    public function data3(Request $request)
    {
        try {
            RouterAnalytics::create([
                'crime_scene' => $request->id,
                'ip' => $request->ip,
                'mac' => $request->mac,
                'hostname' => $request->hostname,
                'vendor' => $request->vendor,
                'latency' => $request->latency,
                'open_ports' => $request->open_ports,
                'os_guess' => $request->os_guess,
                'first_seen' => $request->first_seen,
                'result' => $request->result
            ]);
            return 1;
        } catch (Exception $e) {
            return 2;
        }
    }

    public function data3Index($id, Request $request)
    {
        $query = RouterAnalytics::where('crime_scene', $id);
        if ($request->has('start') && $request->filled('start')) {
            $query->where('created_at', '>=', $request->start);
        }
        if ($request->has('end') && $request->filled('end')) {
            $query->where('created_at', '<', $request->end);
        }
        $data = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.data3', compact(['data', 'id']));
    }

    public function data4(Request $request)
    {
        try {
            DocumentAnalytics::create([
                'crime_scene' => $request->id,
                'file' => $request->file,
                'result' => $request->result,
                'percentage' => $request->percentage
            ]);
            return 1;
        } catch (Exception $e) {
            return $e->getMessage();
            return 2;
        }
    }

    public function data4Index($id, Request $request)
    {
        $query = DocumentAnalytics::where('crime_scene', $id);
        if ($request->has('start') && $request->filled('start')) {
            $query->where('created_at', '>=', $request->start);
        }
        if ($request->has('end') && $request->filled('end')) {
            $query->where('created_at', '<', $request->end);
        }
        $data = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('pages.data4', compact(['data', 'id']));
    }

    public function data1Live()
    {
        $labelNames = ['PIR', 'Temperature', 'Humidity', 'Gas'];
        $graphIds = ['pir', 'temperature', 'humidity', 'gas'];
        $resp = [];


        foreach ($graphIds as $keyGraph => $valueGraph) {
            $labels = [];
            $data = [];
            foreach (Data1::orderByDesc('id')->limit(10)->get()->reverse() as $key => $value) {
                $labels[] = $value->created_at;
                $data[] = Crypt::decrypt($value->toArray()[$valueGraph]);
            }
            $resp[] = ['id' => $valueGraph, 'title' => $labelNames[$keyGraph], 'labels' => $labels, 'data' => $data];
        }

        return $resp;
    }
}
