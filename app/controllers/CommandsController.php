<?php

class CommandsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
            return View::make('commands.index')
                ->with('commands', Command::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
            $data['title'] = 'Create a Command';
            return View::make('commands.form')
                    ->with('data', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
            $c = new Command;
            $c->command_name = Input::get('command_name');
            $c->command_line = Input::get('command_line');
            if ($c->save()) {
                Session::flash('message', 'Successfully created command!');
                return Redirect::to('commands');
            } else {
                return Redirect::route('commands.create')
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
            return View::make('commands.show')
                    ->with('command', Command::find($id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
            $data['title'] = 'Edit a Command';
            return View::make('commands.form')
                    ->with('command', Command::find($id))
                    ->with('data', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
            $c = Command::find($id);
            $c->command_name = Input::get('command_name');
            $c->command_line = Input::get('command_line');
            if ($c->save()) {
                Session::flash('message', 'Successfully updated command!');
                return Redirect::to('commands');
            } else {
                return Redirect::route('commands.create')
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
            Command::find($id)->delete();
            Session::flash('message', 'Successfully deleted the command!');
            return Redirect::to('commands');
	}

}