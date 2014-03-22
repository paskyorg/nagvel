<?php

class ContactsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
            $data['contacts'] = Contact::all();
            return View::make('contacts.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
            $data['title'] = 'Create a Contact';
            $data['hno'] = array (
                'd' => 'Down', 
                'u' => 'Unreachable', 
                'r' => 'Recovery', 
                'f' => 'Flapping', 
                's' => 'Scheduled Downtime', 
                'n' => 'None'
                );
            $data['sno'] = array (
                'w' => 'Warning', 
                'u' => 'Unknown', 
                'c' => 'Critical', 
                'r' => 'Recovery', 
                'f' => 'Flapping', 
                'n' => 'None'
                );
            return View::make('contacts.form', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
            $c = new Contact;
            $c->contact_name = Input::get('contact_name');
            $c->alias = Input::get('alias');
            $c->host_notifications_enabled = Input::get('host_notifications_enabled');
            $c->service_notifications_enabled = Input::get('service_notifications_enabled');
            $c->host_notification_period = Input::get('host_notification_period');
            $c->service_notification_period = Input::get('service_notification_period');
            $c->host_notification_options = implode(",", Input::get('host_notification_options'));
            $c->service_notification_options = implode(",", Input::get('service_notification_options'));
            $c->host_notification_commands = Input::get('host_notification_commands');
            $c->service_notification_commands = Input::get('service_notification_commands');
            $c->email = Input::get('email');
            if ($c->save()) {
                Session::flash('message', 'Successfully created contact!');
                return Redirect::to('contacts');
            } else {
                return Redirect::route('contacts.create')
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
            $data['contact'] = Contact::find($id);
            return View::make('contacts.show', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
            $data['title'] = 'Edit a Contact';
            $c = Contact::find($id);
            $c->host_notification_options = explode(',', $c->host_notification_options);
            $c->service_notification_options = explode(',', $c->service_notification_options);
            $data['contact'] = $c;
            $data['hno'] = array (
                'd' => 'Down', 
                'u' => 'Unreachable', 
                'r' => 'Recovery', 
                'f' => 'Flapping', 
                's' => 'Scheduled Downtime', 
                'n' => 'None'
                );
            $data['sno'] = array (
                'w' => 'Warning', 
                'u' => 'Unknown', 
                'c' => 'Critical', 
                'r' => 'Recovery', 
                'f' => 'Flapping', 
                'n' => 'None'
                );
            return View::make('contacts.form', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
            $c = Contact::find($id);
            $c->contact_name = Input::get('contact_name');
            $c->alias = Input::get('alias');
            $c->host_notifications_enabled = Input::get('host_notifications_enabled');
            $c->service_notifications_enabled = Input::get('service_notifications_enabled');
            $c->host_notification_period = Input::get('host_notification_period');
            $c->service_notification_period = Input::get('service_notification_period');
            $c->host_notification_options = implode(",", Input::get('host_notification_options'));
            $c->service_notification_options = implode(",", Input::get('service_notification_options'));
            $c->host_notification_commands = Input::get('host_notification_commands');
            $c->service_notification_commands = Input::get('service_notification_commands');
            $c->email = Input::get('email');
            if ($c->save()) {
                Session::flash('message', 'Successfully updated contact!');
                return Redirect::to('contacts');
            } else {
                return Redirect::route('contacts.edit')
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
            Contact::find($id)->delete();
            Session::flash('message', 'Successfully deleted the contact!');
            return Redirect::to('contacts');
	}

}