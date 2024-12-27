<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLinkRequest;

class LinkController extends Controller
{
    public function create()
    {
        return view('links.create');
    }
    public function store(StoreLinkRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        $user->links()->create($request->validated());

        /* Link::query()->create(
            array_merge(
                $request->validated(),
                ['user_id' => auth()->id()]
            )
        ); */

        return to_route('dashboard');
    }
    //passar um model via injeção de dependência, no caso Link $link, o laravel faz um routing model binding
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    public function update(UpdateLinkRequest $request, Link $link) {
        /* $link->link = $request->link;
        $link->name = $request->name;
        $link->save(); */

        $link->fill($request->validated())->save();

        return to_route('dashboard')->with('message', 'Alterado com sucesso');

    }

    public function destroy(Link $link)
    {
        $link->delete();
        return to_route('dashboard')->with('message', 'Deletado com sucesso');
    }

    public function up(Link $link)
    {
        $link->moveUp();

        return back();
    }
    public function down(Link $link)
    {
        $link->moveDown();

        return back();
    }
}
