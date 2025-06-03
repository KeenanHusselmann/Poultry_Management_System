<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFarmRequest;
use App\Http\Requests\StoreFarmRequest;
use App\Http\Requests\UpdateFarmRequest;
use App\Models\Farm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FarmController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('farm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farms = Farm::all();

        return view('admin.farms.index', compact('farms'));
    }

    public function create()
    {
        abort_if(Gate::denies('farm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.farms.create');
    }

    public function store(StoreFarmRequest $request)
    {
        $farm = Farm::create($request->all());

        return redirect()->route('admin.farms.index');
    }

    public function edit(Farm $farm)
    {
        abort_if(Gate::denies('farm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.farms.edit', compact('farm'));
    }

    public function update(UpdateFarmRequest $request, Farm $farm)
    {
        $farm->update($request->all());

        return redirect()->route('admin.farms.index');
    }

    public function show(Farm $farm)
    {
        abort_if(Gate::denies('farm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm->load('poultryHousePoultryHouses');

        return view('admin.farms.show', compact('farm'));
    }

    public function destroy(Farm $farm)
    {
        abort_if(Gate::denies('farm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $farm->delete();

        return back();
    }

    public function massDestroy(MassDestroyFarmRequest $request)
    {
        $farms = Farm::find(request('ids'));

        foreach ($farms as $farm) {
            $farm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
