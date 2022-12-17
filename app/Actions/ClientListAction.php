<?php

namespace App\Actions;

use App\Models\Proposal;
use Illuminate\Support\Facades\DB;

class ClientListAction
{

    public function __invoke($query)
    {
        $itemOnPage = $query['itemOnPage'] ?? 20;
        $sortBy = $query['filterStatus'] ?? NULL;
        $rand = $query['rand'] ?? NULL;
//        $proposals = DB::select('
//        select  user_id as user,
//        (select text from proposals where user_id = user ORDER BY RAND() limit 1) as text
//        from proposals p
//        group by user_id ')
//        ;

        $proposals = (new Proposal())

            ->where('user_id', '=', auth()->id())
            ->when($sortBy, function ($query, $sortBy) {
                $query->where('status', '=', $sortBy);
            })
            ->with('category')
            ->with('user')
            ->paginate($itemOnPage)
            ->withQueryString();

        return $proposals;
    }

}
