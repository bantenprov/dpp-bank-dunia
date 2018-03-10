<?php

namespace Bantenprov\DPPBankDunia\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\DPPBankDunia\Facades\DPPBankDuniaFacade;

/* Models */
use Bantenprov\DPPBankDunia\Models\Bantenprov\DPPBankDunia\DPPBankDunia;

/* Etc */
use Validator;

/**
 * The DPPBankDuniaController class.
 *
 * @package Bantenprov\DPPBankDunia
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DPPBankDuniaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(DPPBankDunia $dpp_bank_dunia)
    {
        $this->dpp_bank_dunia = $dpp_bank_dunia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = $this->dpp_bank_dunia->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->dpp_bank_dunia->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dpp_bank_dunia = $this->dpp_bank_dunia;

        $response['dpp_bank_dunia'] = $dpp_bank_dunia;
        $response['status'] = true;

        return response()->json($dpp_bank_dunia);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DPPBankDunia  $dpp_bank_dunia
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dpp_bank_dunia = $this->dpp_bank_dunia;

        $validator = Validator::make($request->all(), [
            'label' => 'required|max:16|unique:dpp_bank_dunias,label',
            'description' => 'max:255',
        ]);

        if($validator->fails()){
            $check = $dpp_bank_dunia->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $dpp_bank_dunia->label = $request->input('label');
                $dpp_bank_dunia->description = $request->input('description');
                $dpp_bank_dunia->save();

                $response['message'] = 'success';
            }
        } else {
            $dpp_bank_dunia->label = $request->input('label');
            $dpp_bank_dunia->description = $request->input('description');
            $dpp_bank_dunia->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dpp_bank_dunia = $this->dpp_bank_dunia->findOrFail($id);

        $response['dpp_bank_dunia'] = $dpp_bank_dunia;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DPPBankDunia  $dpp_bank_dunia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dpp_bank_dunia = $this->dpp_bank_dunia->findOrFail($id);

        $response['dpp_bank_dunia'] = $dpp_bank_dunia;
        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DPPBankDunia  $dpp_bank_dunia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dpp_bank_dunia = $this->dpp_bank_dunia->findOrFail($id);

        if ($request->input('old_label') == $request->input('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:dpp_bank_dunias,label',
                'description' => 'max:255',
            ]);
        }

        if ($validator->fails()) {
            $check = $dpp_bank_dunia->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $dpp_bank_dunia->label = $request->input('label');
                $dpp_bank_dunia->description = $request->input('description');
                $dpp_bank_dunia->save();

                $response['message'] = 'success';
            }
        } else {
            $dpp_bank_dunia->label = $request->input('label');
            $dpp_bank_dunia->description = $request->input('description');
            $dpp_bank_dunia->save();

            $response['message'] = 'success';
        }

        $response['status'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DPPBankDunia  $dpp_bank_dunia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dpp_bank_dunia = $this->dpp_bank_dunia->findOrFail($id);

        if ($dpp_bank_dunia->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}
