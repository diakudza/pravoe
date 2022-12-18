<?php

namespace App\Http\Controllers;

use App\Actions\ClientListAction;
use App\Actions\ImageAction;
use App\Actions\LawyerListAction;
use App\Http\Requests\ProposalSortRequest;
use App\Http\Requests\ProposalStoreRequest;
use App\Http\Requests\ProposalUpdateRequest;
use App\Models\Category;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{

    public function index(LawyerListAction $proposals, ClientListAction $clientListAction, ProposalSortRequest $request)
    {
        $validated = $request->validated();

        if (auth()->user()->role->title == 'Юрист') {
            $proposals = $proposals($validated);
            return view('lawyer.proposalAll', compact('proposals'));
        }
        $view = (empty($validated['rand'])) ? 'client.proposalMy' : 'client.proposalAll';
        $proposals = $clientListAction($validated);
        return view($view, compact('proposals'));

    }

    public function store(ProposalStoreRequest $request, Proposal $proposal, ImageAction $imageAction)
    {
        $validated = $request->validated();

        $proposal = $proposal->fill($validated);
        $proposal->save();

        if (isset($validated['filename'])) {
            $validated['filename'] = $imageAction($validated['filename']);
            $proposal->image()->create($validated);
        }

        if ($proposal->save()) {
            $validated['proposal_id'] = $proposal->id;
            auth()->user()->proposalInWork()->create($validated);
            return redirect()->route('proposal.index')->with('success', 'Ваше обращение отправлено');
        }
        return redirect()->back()->with('fail', 'Ошибка отправления');

    }

    public function create()
    {
        $categories = Category::all();
        return view('client.proposalForm', compact('categories'));
    }

    public function show($id)
    {
        $proposal = Proposal::find($id);
        return view('proposalSingle', compact('proposal'));
    }

    public function update(ProposalUpdateRequest $request, int $id)
    {
        $proposal = Proposal::find($id);
        $validated = $request->validated();
        if ($validated['status'] == 'inwork') {

            auth()->user()->proposalInWork()->create($validated);
            $proposal->comments()->create($validated);
            $proposal->status = 'inwork';
            $message = 'Заявка обработана';
        } elseif ($validated['status'] == 'completed') {
            $proposal->comments()->create($validated);
            $proposal->status = 'completed';
            $message = 'Заявка закрыта!';
        }

        $proposal->save();
        return redirect()->route('proposal.index')->with('success', $message);
    }

    public function destroy()
    {
        return view('loginForm');
    }

    public function randomProposals()
    {
        return view('loginForm');
    }

    public function clientProposals()
    {
        return view('loginForm');
    }
}
