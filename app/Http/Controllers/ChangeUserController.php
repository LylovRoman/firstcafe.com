<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeUserStoreRequest;
use App\Models\Change;
use App\Models\ChangeUser;
use App\Models\User;
use Illuminate\Http\Request;

class ChangeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChangeUserStoreRequest $request)
    {
        if (Change::query()->where("id", $request->change["id"])->first()) {
            foreach ($request->users as $user) {
                if (User::query()->where("login", $user["login"])->first()) {
                    ChangeUser::query()->create([
                        'change_id' => $request->change["id"],
                        'user_login' => $user["login"]
                    ]);
                }
            }
        }
        return response()->json([
            "data" => [
                "code" => "QSASE"
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChangeUser  $changeUser
     * @return \Illuminate\Http\Response
     */
    public function show(ChangeUser $changeUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChangeUser  $changeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ChangeUser $changeUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChangeUser  $changeUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChangeUser $changeUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChangeUser  $changeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChangeUser $changeUser)
    {
        //
    }
}
