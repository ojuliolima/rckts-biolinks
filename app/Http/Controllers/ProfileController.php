<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            'user' => auth()->user(),
        ]);
    }

    public function update(ProfileRequest $request)
    {
        /** @var User $user*/
        $user = auth()->user();

        $data = $request->validated();
        if($file = $request->photo) {
            /** @var UploadedFile $file*/ //para o vscode ler as opções de métodos da classe (autocomplete)
            $data['photo'] =  $file->store('photos'); //TODO:   $file->store('photos', 'public'); estudar sobre o padrão de disco do laravel, FILESYSTEM_DISK
        }

        $user->fill($data)->save();

        return back()
            ->with('message', 'Profile atualizado com sucesso!');
    }
}
