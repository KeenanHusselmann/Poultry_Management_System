<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHealthRecordRequest;
use App\Http\Requests\StoreHealthRecordRequest;
use App\Http\Requests\UpdateHealthRecordRequest;
use App\Models\Disease;
use App\Models\HealthRecord;
use App\Models\LifeStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HealthRecordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('health_record_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healthRecords = HealthRecord::with(['live_stock', 'disease'])->get();

        return view('frontend.healthRecords.index', compact('healthRecords'));
    }

    public function create()
    {
        abort_if(Gate::denies('health_record_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $live_stocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diseases = Disease::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.healthRecords.create', compact('diseases', 'live_stocks'));
    }

    public function store(StoreHealthRecordRequest $request)
    {
        $healthRecord = HealthRecord::create($request->all());

        return redirect()->route('frontend.health-records.index');
    }

    public function edit(HealthRecord $healthRecord)
    {
        abort_if(Gate::denies('health_record_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $live_stocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $diseases = Disease::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $healthRecord->load('live_stock', 'disease');

        return view('frontend.healthRecords.edit', compact('diseases', 'healthRecord', 'live_stocks'));
    }

    public function update(UpdateHealthRecordRequest $request, HealthRecord $healthRecord)
    {
        $healthRecord->update($request->all());

        return redirect()->route('frontend.health-records.index');
    }

    public function show(HealthRecord $healthRecord)
    {
        abort_if(Gate::denies('health_record_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healthRecord->load('live_stock', 'disease');

        return view('frontend.healthRecords.show', compact('healthRecord'));
    }

    public function destroy(HealthRecord $healthRecord)
    {
        abort_if(Gate::denies('health_record_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healthRecord->delete();

        return back();
    }

    public function massDestroy(MassDestroyHealthRecordRequest $request)
    {
        $healthRecords = HealthRecord::find(request('ids'));

        foreach ($healthRecords as $healthRecord) {
            $healthRecord->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
