<?php

class ServicesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
            $data['services'] = Service::all();
            return View::make('services.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
            $data['title'] = 'Create a Service';
            return View::make('services.form', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
            $s = new Service;
            $s->host_name = Input::get('host_name');
            $s->service_description = Input::get('service_description');
            $s->check_command = Input::get('check_command');
            $s->max_check_attempts = Input::get('max_check_attempts');
            $s->check_interval = Input::get('check_interval');
            $s->retry_interval = Input::get('retry_interval');
            $s->check_period = Input::get('check_period');
            $s->notification_interval = Input::get('notification_interval');
            $s->notification_period = Input::get('notification_period');
            if ($s->save()) {
                Session::flash('message', 'Successfully created service!');
                return Redirect::to('services');
            } else {
                return Redirect::route('services.create')
                        ->withErrors($s->errors());
            }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
            $data['service'] = Service::find($id);
            return View::make('services.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
            $data['title'] = 'Edit a service';
            $data['service'] = Service::find($id);
            return View::make('services.form', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
            $s = Service::find($id);
            $s->host_name = Input::get('host_name');
            $s->service_description = Input::get('service_description');
            $s->check_command = Input::get('check_command');
            $s->max_check_attempts = Input::get('max_check_attempts');
            $s->check_interval = Input::get('check_interval');
            $s->retry_interval = Input::get('retry_interval');
            $s->check_period = Input::get('check_period');
            $s->notification_interval = Input::get('notification_interval');
            $s->notification_period = Input::get('notification_period');
            if ($s->save()) {
                Session::flash('message', 'Successfully created service!');
                return Redirect::to('services');
            } else {
                return Redirect::route('services.create')
                        ->withErrors($s->errors());
            }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
            Service::find($id)->delete();
            Session::flash('message', 'Successfully deleted the service!');
            return Redirect::to('services');
	}

}