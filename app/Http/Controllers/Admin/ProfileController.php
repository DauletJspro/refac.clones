<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\City;
use App\Models\UserGender;
use App\Models\UserInfo;
use App\User;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
        $listOfCities = City::all()->pluck('name_ru', 'id')->toArray();
        $listOfGender = UserGender::all()->pluck('name_ru', 'id')->toArray();
        return view('admin.profile.settings', (compact('user', 'listOfGender', 'listOfCities')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->input();
        $user  = User::find($id)->update($data);
        $userInfo = User::with('Info')->find($id);
        $result = $userInfo->info->update($data);
        if ($result || $user) {
            return redirect()->route('profile.index')
                ->with('success', 'Вы успешно изменили данные');
        } else {
            return back()
                ->with('errors', 'Что-то пошло не так');
        }
    }

    public function editPassword ($id){
        $user = User::find($id);
         return view('admin.profile.edit-password', compact('user'));
    }

    public function updatePassword(ProfileRequest $request){
        $user = Auth::user()->update([
          'password' => Hash::make($request->password)
        ]);
        if ($user){
            return redirect()->route('profile.index')
                ->with('success', 'Вы успешно изменили пароль');
        }
        else{
            return back()->with('errors', 'При изменение пароля произошло ошибка');
        }


    }
}
