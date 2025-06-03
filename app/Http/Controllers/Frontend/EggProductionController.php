<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEggProductionRequest;
use App\Http\Requests\StoreEggProductionRequest;
use App\Http\Requests\UpdateEggProductionRequest;
use App\Models\EggProduction;
use App\Models\LifeStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EggProductionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('egg_production_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eggProductions = EggProduction::with(['eggs'])->get();

        return view('frontend.eggProductions.index', compact('eggProductions'));
    }

    public function create()
    {
        abort_if(Gate::denies('egg_production_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eggs = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.eggProductions.create', compact('eggs'));
    }

    public function store(StoreEggProductionRequest $request)
    {
        $eggProduction = EggProduction::create($request->all());

        return redirect()->route('frontend.egg-productions.index');
    }

    public function edit(EggProduction $eggProduction)
    {
        abort_if(Gate::denies('egg_production_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eggs = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eggProduction->load('eggs');

        return view('frontend.eggProductions.edit', compact('eggProduction', 'eggs'));
    }

    public function update(UpdateEggProductionRequest $request, EggProduction $eggProduction)
    {
        $eggProduction->update($request->all());

        return redirect()->route('frontend.egg-productions.index');
    }

    public function show(EggProduction $eggProduction)
    {
        abort_if(Gate::denies('egg_production_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eggProduction->load('eggs');

        return view('frontend.eggProductions.show', compact('eggProduction'));
    }

    public function destroy(EggProduction $eggProduction)
    {
        abort_if(Gate::denies('egg_production_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eggProduction->delete();

        return back();
    }

    public function massDestroy(MassDestroyEggProductionRequest $request)
    {
        $eggProductions = EggProduction::find(request('ids'));

        foreach ($eggProductions as $eggProduction) {
            $eggProduction->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
