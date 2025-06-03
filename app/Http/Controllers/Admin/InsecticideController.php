<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInsecticideRequest;
use App\Http\Requests\StoreInsecticideRequest;
use App\Http\Requests\UpdateInsecticideRequest;
use App\Models\Insecticide;
use App\Models\LifeStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InsecticideController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('insecticide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insecticides = Insecticide::with(['life_stock'])->get();

        return view('admin.insecticides.index', compact('insecticides'));
    }

    public function create()
    {
        abort_if(Gate::denies('insecticide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $life_stocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.insecticides.create', compact('life_stocks'));
    }

    public function store(StoreInsecticideRequest $request)
    {
        $insecticide = Insecticide::create($request->all());

        return redirect()->route('admin.insecticides.index');
    }

    public function edit(Insecticide $insecticide)
    {
        abort_if(Gate::denies('insecticide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $life_stocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $insecticide->load('life_stock');

        return view('admin.insecticides.edit', compact('insecticide', 'life_stocks'));
    }

    public function update(UpdateInsecticideRequest $request, Insecticide $insecticide)
    {
        $insecticide->update($request->all());

        return redirect()->route('admin.insecticides.index');
    }

    public function show(Insecticide $insecticide)
    {
        abort_if(Gate::denies('insecticide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insecticide->load('life_stock');

        return view('admin.insecticides.show', compact('insecticide'));
    }

    public function destroy(Insecticide $insecticide)
    {
        abort_if(Gate::denies('insecticide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $insecticide->delete();

        return back();
    }

    public function massDestroy(MassDestroyInsecticideRequest $request)
    {
        $insecticides = Insecticide::find(request('ids'));

        foreach ($insecticides as $insecticide) {
            $insecticide->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
