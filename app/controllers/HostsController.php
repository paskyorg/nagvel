<?php

class HostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
            $data['hosts'] = Host::all();
            return View::make('hosts.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
            $data['title'] = 'Create a Host';
            return View::make('hosts.form', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
            $h = new Host;
            $h->host_name = Input::get('host_name');
            $h->alias = Input::get('alias');
            $h->address = Input::get('address');
            $h->max_check_attempts = Input::get('max_check_attempts');
            $h->check_period = Input::get('check_period');
            $h->notification_interval = Input::get('notification_interval');
            $h->notification_period = Input::get('notification_period');
            if ($h->save()) {
                Session::flash('message', 'Successfully created host!');
                return Redirect::to('hosts');
            } else {
                return Redirect::route('hosts.create')
                        ->withErrors($h->errors());
            }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
            $data['host'] = Host::find($id);
            return View::make('hosts.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
            $data['title'] = 'Edit a host';
            $data['host'] = Host::find($id);
            return View::make('hosts.form', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
            $h = Host::find($id);
            $h->host_name = Input::get('host_name');
            $h->alias = Input::get('alias');
            $h->address = Input::get('address');
            $h->max_check_attempts = Input::get('max_check_attempts');
            $h->check_period = Input::get('check_period');
            $h->notification_interval = Input::get('notification_interval');
            $h->notification_period = Input::get('notification_period');
            if ($h->save()) {
                Session::flash('message', 'Successfully created host!');
                return Redirect::to('hosts');
            } else {
                return Redirect::route('hosts.create')
                        ->withErrors($h->errors());
            }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
            Host::find($id)->delete();
            Session::flash('message', 'Successfully deleted the host!');
            return Redirect::to('hosts');
	}

}