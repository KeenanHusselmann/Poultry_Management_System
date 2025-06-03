<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDiseaseRequest;
use App\Http\Requests\StoreDiseaseRequest;
use App\Http\Requests\UpdateDiseaseRequest;
use App\Models\Disease;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DiseaseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('disease_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $diseases = Disease::all();

        return view('frontend.diseases.index', compact('diseases'));
    }

    public function create()
    {
        abort_if(Gate::denies('disease_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.diseases.create');
    }

    public function store(StoreDiseaseRequest $request)
    {
        $disease = Disease::create($request->all());

        return redirect()->route('frontend.diseases.index');
    }

    public function edit(Disease $disease)
    {
        abort_if(Gate::denies('disease_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.diseases.edit', compact('disease'));
    }

    public function update(UpdateDiseaseRequest $request, Disease $disease)
    {
        $disease->update($request->all());

        return redirect()->route('frontend.diseases.index');
    }

    public function show(Disease $disease)
    {
        abort_if(Gate::denies('disease_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.diseases.show', compact('disease'));
    }

    public function destroy(Disease $disease)
    {
        abort_if(Gate::denies('disease_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $disease->delete();

        return back();
    }

    public function massDestroy(MassDestroyDiseaseRequest $request)
    {
        $diseases = Disease::find(request('ids'));

        foreach ($diseases as $disease) {
            $disease->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
