<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Html\FormFacade;
use Illuminate\Support\Facades\Validator;

use Response;
use Redirect;
use Uuid;
use Session;
use DB;

use App\Incomes;
use App\FinanceLogs;

class IncomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $incomes = Incomes::paginate('10');
      // dd($agencycategories);
      return view('incomes.index')->with('incomes', $incomes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // dd(FinanceLogs::);
        return view('incomes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $incomes = new Incomes;
      $incomes->id = Uuid::generate();
      $incomes->date = date("Y-m-d", strtotime($request->date));
      $incomes->info = encrypt($request->info);
      $incomes->value = encrypt($request->value);
      if ($request->hasFile('file')) {
        $data = $request->file('file');
        $destinationPath = public_path('incomefile');
        $fileName = $incomes->id.'-'.$data->getClientOriginalName();
        $data->move($destinationPath, $fileName);
        $path = $destinationPath.'/'.$fileName;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $imgData = file_get_contents($path);
        $base64images = 'data:image/' . $type . ';base64,' . base64_encode($imgData);
        $incomes->file = $base64images;
      }

      try {
        $incomes->save();
      } catch (Exception $e) {
        return Redirect::to($request->url().'/create')
            ->withErrors(['Error'])->withInput();
      }

      try {
        $financelogs = new FinanceLogs;
        $financelogs->id = Uuid::generate();
        if (is_null(FinanceLogs::orderBy('created_at', 'desc')->first())) {
          $financelogs->balance = encrypt(0+(int)$request->value);
        }
        else {
          $lastBalance = decrypt(FinanceLogs::orderBy('created_at', 'desc')->first()->balance);
          $financelogs->balance = encrypt((int)$lastBalance+(int)$request->value);
        }
        $financelogs->incomes_id = $incomes->id;
        $financelogs->save();
      } catch (Exception $e) {
        return Redirect::to($request->url().'/create')
            ->withErrors(['Error'])->withInput();
      }

      try {
        return Redirect::to($request->url())
        ->with('message','Success')->withInput();
      } catch (Exception $e) {
        return Redirect::to($request->url().'/create')
            ->withErrors(['Error'])->withInput();
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $income = Incomes::find($id);
      return view('incomes.show')->with('income', $income);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $income = Incomes::find($id);
        return view('incomes.edit')->with('income', $income);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $income = Incomes::find($id);
      if(!$income)
          return abort(404);
      $income->date = date("Y-m-d", strtotime($request->date));
      $income->info = encrypt($request->info);
      $income->value = encrypt($request->value);
      if ($request->hasFile('file')) {
        $data = $request->file('file');
        $destinationPath = public_path('incomefile');
        $fileName = $income->id.'-'.$data->getClientOriginalName();
        $data->move($destinationPath, $fileName);
        $path = $destinationPath.'/'.$fileName;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $imgData = file_get_contents($path);
        $base64images = 'data:image/' . $type . ';base64,' . base64_encode($imgData);
        $income->file = $base64images;
      }

      if($income->save())
      {
          return Redirect::to($request->url())
          ->with('message','Sukses menyimpan perubahan data')->withInput();
      }
      else
      {
          return Redirect::to($request->url())
              ->withErrors(['Gagal menyimpan perubahan data'])->withInput();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
      $income = Incomes::find($id);
      if(!$income)
          return abort(404);

      if($income->delete())
      {
          return Redirect::to(str_replace($id, '', $request->url()))
                      ->with('message','Sukses menghapus data')->withInput();
      }
      else{
          return Redirect::to(str_replace($id, '', $request->url()))
                      ->withErrors(['Gagal menghapus data'])->withInput();
      }
    }
}
