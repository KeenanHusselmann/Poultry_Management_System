<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLifeStockRequest;
use App\Http\Requests\StoreLifeStockRequest;
use App\Http\Requests\UpdateLifeStockRequest;
use App\Models\LifeStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LifeStockController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('life_stock_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lifeStocks = LifeStock::all();

        return view('admin.lifeStocks.index', compact('lifeStocks'));
    }

    public function create()
    {
        abort_if(Gate::denies('life_stock_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lifeStocks.create');
    }

    public function store(StoreLifeStockRequest $request)
    {
        $lifeStock = LifeStock::create($request->all());

        return redirect()->route('admin.life-stocks.index');
    }

    public function edit(LifeStock $lifeStock)
    {
        abort_if(Gate::denies('life_stock_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lifeStocks.edit', compact('lifeStock'));
    }

    public function update(UpdateLifeStockRequest $request, LifeStock $lifeStock)
    {
        $lifeStock->update($request->all());

        return redirect()->route('admin.life-stocks.index');
    }

    public function show(LifeStock $lifeStock)
    {
        abort_if(Gate::denies('life_stock_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lifeStock->load('eggsEggProductions', 'lifeStockPesticides');

        return view('admin.lifeStocks.show', compact('lifeStock'));
    }

    public function destroy(LifeStock $lifeStock)
    {
        abort_if(Gate::denies('life_stock_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lifeStock->delete();

        return back();
    }

    public function massDestroy(MassDestroyLifeStockRequest $request)
    {
        $lifeStocks = LifeStock::find(request('ids'));

        foreach ($lifeStocks as $lifeStock) {
            $lifeStock->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
