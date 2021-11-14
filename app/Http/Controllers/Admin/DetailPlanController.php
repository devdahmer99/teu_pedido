<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class DetailPlanController extends Controller
{
    protected Plan $plan;
    protected DetailPlan $repository;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository  = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
       if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
           return redirect()->back();
       }

       $details = $plan->details()->paginate();
       return view('admin.pages.plans.details.index', compact('plan', 'details'));
    }

    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create', compact('plan'));
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan): RedirectResponse
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plans.index', $plan->url);
    }

    public function edit($urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.edit', compact('plan', 'detail'));
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $id): RedirectResponse
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->update($request->all());

        return redirect()->route('details.plans.index', $plan->url);
    }

    public function show($urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.show', compact('plan', 'detail'));
    }

    public function destroy($urlPlan, $id): RedirectResponse
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);

        if (!$plan || !$detail) {
            return redirect()->back();
        }

        $detail->delete();

        return redirect()
            ->route('details.plans.index', $plan->url)
            ->with('message', 'Detalhe removido com sucesso');
    }
}
