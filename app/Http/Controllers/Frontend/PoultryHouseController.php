<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPoultryHouseRequest;
use App\Http\Requests\StorePoultryHouseRequest;
use App\Http\Requests\UpdatePoultryHouseRequest;
use App\Models\Farm;
use App\Models\PoultryHouse;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoultryHouseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('poultry_house_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poultryHouses = PoultryHouse::with(['poultry_house'])->get();

        return view('frontend.poultryHouses.index', compact('poultryHouses'));
    }

    public function create()
    {
        abort_if(Gate::denies('poultry_house_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poultry_houses = Farm::pluck('farm_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.poultryHouses.create', compact('poultry_houses'));
    }

    public function store(StorePoultryHouseRequest $request)
    {
        $poultryHouse = PoultryHouse::create($request->all());

        return redirect()->route('frontend.poultry-houses.index');
    }

    public function edit(PoultryHouse $poultryHouse)
    {
        abort_if(Gate::denies('poultry_house_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poultry_houses = Farm::pluck('farm_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $poultryHouse->load('poultry_house');

        return view('frontend.poultryHouses.edit', compact('poultryHouse', 'poultry_houses'));
    }

    public function update(UpdatePoultryHouseRequest $request, PoultryHouse $poultryHouse)
    {
        $poultryHouse->update($request->all());

        return redirect()->route('frontend.poultry-houses.index');
    }

    public function show(PoultryHouse $poultryHouse)
    {
        abort_if(Gate::denies('poultry_house_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poultryHouse->load('poultry_house');

        return view('frontend.poultryHouses.show', compact('poultryHouse'));
    }

    public function destroy(PoultryHouse $poultryHouse)
    {
        abort_if(Gate::denies('poultry_house_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poultryHouse->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoultryHouseRequest $request)
    {
        $poultryHouses = PoultryHouse::find(request('ids'));

        foreach ($poultryHouses as $poultryHouse) {
            $poultryHouse->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
