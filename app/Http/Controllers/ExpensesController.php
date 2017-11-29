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

use App\Expenses;
use App\FinanceLogs;


class ExpensesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $expenses = Expenses::paginate('10');
    // dd($agencycategories);
    return view('expenses.index')->with('expenses', $expenses);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('expenses.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $expenses = new Expenses;
    $expenses->id = Uuid::generate();
    $expenses->date = date("Y-m-d", strtotime($request->date));
    $expenses->info = encrypt($request->info);
    $expenses->value = encrypt($request->value);
    if ($request->hasFile('file')) {
      $data = $request->file('file');
      $destinationPath = public_path('expensefile');
      $fileName = $expenses->id.'-'.$data->getClientOriginalName();
      $data->move($destinationPath, $fileName);
      $path = $destinationPath.'/'.$fileName;
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $imgData = file_get_contents($path);
      $base64images = 'data:image/' . $type . ';base64,' . base64_encode($imgData);
      $expenses->file = $base64images;
    }

    try {
      $expenses->save();
    } catch (Exception $e) {
      return Redirect::to($request->url().'/create')
          ->withErrors(['Error'])->withInput();
    }

    try {
      $financelogs = new FinanceLogs;
      $financelogs->id = Uuid::generate();
      $financelogs->balance = encrypt($request->value);
      $financelogs->expenses_id = $expenses->id;
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
    $expense = Expenses::find($id);
    return view('expenses.show')->with('expense', $expense);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $expense = Expenses::find($id);
      return view('expenses.edit')->with('expense', $expense);
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
    $expense = Expenses::find($id);
    if(!$expense)
        return abort(404);
    $expense->date = date("Y-m-d", strtotime($request->date));
    $expense->info = encrypt($request->info);
    $expense->value = encrypt($request->value);
    if ($request->hasFile('file')) {
      $data = $request->file('file');
      $destinationPath = public_path('incomefile');
      $fileName = $income->id.'-'.$data->getClientOriginalName();
      $data->move($destinationPath, $fileName);
      $path = $destinationPath.'/'.$fileName;
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $imgData = file_get_contents($path);
      $base64images = 'data:image/' . $type . ';base64,' . base64_encode($imgData);
      $expense->file = $base64images;
    }

    if($expense->save())
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
    $expense = Expenses::find($id);
    if(!$expense)
        return abort(404);

    if($expense->delete())
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
