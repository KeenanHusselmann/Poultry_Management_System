<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPesticideRequest;
use App\Http\Requests\StorePesticideRequest;
use App\Http\Requests\UpdatePesticideRequest;
use App\Models\LifeStock;
use App\Models\Pesticide;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PesticideController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pesticide_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesticides = Pesticide::with(['life_stock'])->get();

        return view('admin.pesticides.index', compact('pesticides'));
    }

    public function create()
    {
        abort_if(Gate::denies('pesticide_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $life_stocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pesticides.create', compact('life_stocks'));
    }

    public function store(StorePesticideRequest $request)
    {
        $pesticide = Pesticide::create($request->all());

        return redirect()->route('admin.pesticides.index');
    }

    public function edit(Pesticide $pesticide)
    {
        abort_if(Gate::denies('pesticide_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $life_stocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pesticide->load('life_stock');

        return view('admin.pesticides.edit', compact('life_stocks', 'pesticide'));
    }

    public function update(UpdatePesticideRequest $request, Pesticide $pesticide)
    {
        $pesticide->update($request->all());

        return redirect()->route('admin.pesticides.index');
    }

    public function show(Pesticide $pesticide)
    {
        abort_if(Gate::denies('pesticide_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesticide->load('life_stock');

        return view('admin.pesticides.show', compact('pesticide'));
    }

    public function destroy(Pesticide $pesticide)
    {
        abort_if(Gate::denies('pesticide_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pesticide->delete();

        return back();
    }

    public function massDestroy(MassDestroyPesticideRequest $request)
    {
        $pesticides = Pesticide::find(request('ids'));

        foreach ($pesticides as $pesticide) {
            $pesticide->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
