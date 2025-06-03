<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductionReportRequest;
use App\Http\Requests\StoreProductionReportRequest;
use App\Http\Requests\UpdateProductionReportRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductionReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('production_report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productionReports.index');
    }

    public function create()
    {
        abort_if(Gate::denies('production_report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productionReports.create');
    }

    public function store(StoreProductionReportRequest $request)
    {
        $productionReport = ProductionReport::create($request->all());

        return redirect()->route('admin.production-reports.index');
    }

    public function edit(ProductionReport $productionReport)
    {
        abort_if(Gate::denies('production_report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productionReports.edit', compact('productionReport'));
    }

    public function update(UpdateProductionReportRequest $request, ProductionReport $productionReport)
    {
        $productionReport->update($request->all());

        return redirect()->route('admin.production-reports.index');
    }

    public function show(ProductionReport $productionReport)
    {
        abort_if(Gate::denies('production_report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productionReports.show', compact('productionReport'));
    }

    public function destroy(ProductionReport $productionReport)
    {
        abort_if(Gate::denies('production_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productionReport->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductionReportRequest $request)
    {
        $productionReports = ProductionReport::find(request('ids'));

        foreach ($productionReports as $productionReport) {
            $productionReport->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
