<?php

namespace App\Actions;

use App\Models\Proposal;

class lawyerListAction
{
    public function __invoke($query)
    {

        $itemOnPage = $query['itemOnPage'] ?? 20;
        $sortBy = $query['filterStatus'] ?? NULL;

        $proposals = (new Proposal())
            ->where(function ($query) {
                $query->where('status', '=', 'new')
                    ->orWhere(function ($query) {
                        $query->whereRelation('lawyer', 'user_id', '=', auth()->id());
                    });
            })
            ->when($sortBy, function ($query, $sortBy) {
                $query->where('status','=', $sortBy);
            })
            ->with('category')
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate($itemOnPage)
            ->withQueryString();

        return $proposals;
    }
}
