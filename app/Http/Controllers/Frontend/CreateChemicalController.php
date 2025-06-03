<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCreateChemicalRequest;
use App\Http\Requests\StoreCreateChemicalRequest;
use App\Http\Requests\UpdateCreateChemicalRequest;
use App\Models\CreateChemical;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateChemicalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('create_chemical_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createChemicals = CreateChemical::all();

        return view('frontend.createChemicals.index', compact('createChemicals'));
    }

    public function create()
    {
        abort_if(Gate::denies('create_chemical_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.createChemicals.create');
    }

    public function store(StoreCreateChemicalRequest $request)
    {
        $createChemical = CreateChemical::create($request->all());

        return redirect()->route('frontend.create-chemicals.index');
    }

    public function edit(CreateChemical $createChemical)
    {
        abort_if(Gate::denies('create_chemical_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.createChemicals.edit', compact('createChemical'));
    }

    public function update(UpdateCreateChemicalRequest $request, CreateChemical $createChemical)
    {
        $createChemical->update($request->all());

        return redirect()->route('frontend.create-chemicals.index');
    }

    public function show(CreateChemical $createChemical)
    {
        abort_if(Gate::denies('create_chemical_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.createChemicals.show', compact('createChemical'));
    }

    public function destroy(CreateChemical $createChemical)
    {
        abort_if(Gate::denies('create_chemical_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createChemical->delete();

        return back();
    }

    public function massDestroy(MassDestroyCreateChemicalRequest $request)
    {
        $createChemicals = CreateChemical::find(request('ids'));

        foreach ($createChemicals as $createChemical) {
            $createChemical->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
