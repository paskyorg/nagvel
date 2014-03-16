<?php

class TimeperiodsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
            return View::make('timeperiods.index')
                ->with('timeperiods', Timeperiod::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
            $data['title'] = 'Create a Timeperiod';
            return View::make('timeperiods.form')
                    ->with('data', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
            $t = new Timeperiod;
            $t->timeperiod_name = Input::get('timeperiod_name');
            $t->alias = Input::get('alias');
            if ($t->save()) {
                Session::flash('message', 'Successfully created timeperiod!');
                return Redirect::to('timeperiods');
            } else {
                return Redirect::route('timeperiods.create')
                        ->withErrors($c->errors());
            }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
            return View::make('timeperiods.show')
                    ->with('timeperiod', Timeperiod::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
            $data['title'] = 'Edit a Timeperiod';
            return View::make('timeperiods.form')
                    ->with('timeperiod', Timeperiod::find($id))
                    ->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
            $t = Timeperiod::find($id);
            $t->timeperiod_name = Input::get('timeperiod_name');
            $t->alias = Input::get('alias');
            if ($t->save()) {
                Session::flash('message', 'Successfully updated timeperiod!');
                return Redirect::to('timeperiods');
            } else {
                return Redirect::route('timeperiods.create')
                        ->withErrors($c->errors());
            }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
            Timeperiod::find($id)->delete();
            Session::flash('message', 'Successfully deleted the timeperiod!');
            return Redirect::to('timeperiods');
	}

}