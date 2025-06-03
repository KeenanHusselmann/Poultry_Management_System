<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeedManagmentRequest;
use App\Http\Requests\StoreFeedManagmentRequest;
use App\Http\Requests\UpdateFeedManagmentRequest;
use App\Models\FeedManagment;
use App\Models\LifeStock;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FeedManagmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('feed_managment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedManagments = FeedManagment::with(['livestock'])->get();

        return view('admin.feedManagments.index', compact('feedManagments'));
    }

    public function create()
    {
        abort_if(Gate::denies('feed_managment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $livestocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.feedManagments.create', compact('livestocks'));
    }

    public function store(StoreFeedManagmentRequest $request)
    {
        $feedManagment = FeedManagment::create($request->all());

        return redirect()->route('admin.feed-managments.index');
    }

    public function edit(FeedManagment $feedManagment)
    {
        abort_if(Gate::denies('feed_managment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $livestocks = LifeStock::pluck('breed', 'id')->prepend(trans('global.pleaseSelect'), '');

        $feedManagment->load('livestock');

        return view('admin.feedManagments.edit', compact('feedManagment', 'livestocks'));
    }

    public function update(UpdateFeedManagmentRequest $request, FeedManagment $feedManagment)
    {
        $feedManagment->update($request->all());

        return redirect()->route('admin.feed-managments.index');
    }

    public function show(FeedManagment $feedManagment)
    {
        abort_if(Gate::denies('feed_managment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedManagment->load('livestock');

        return view('admin.feedManagments.show', compact('feedManagment'));
    }

    public function destroy(FeedManagment $feedManagment)
    {
        abort_if(Gate::denies('feed_managment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedManagment->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeedManagmentRequest $request)
    {
        $feedManagments = FeedManagment::find(request('ids'));

        foreach ($feedManagments as $feedManagment) {
            $feedManagment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
