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

        if ($rand) {
            $proposals = DB::select('
                select `sub`.user_id, count(`sub`.`user_id`),
                `sub`.text, name, status, `sub`.created_at, `sub`.id
                from (select text, user_id, `p`.created_at, status, `p`.id
                           , `u`.name
                      from `proposals` `p`
                               left join users `u` on `u`.`id` = `p`.user_id
                      ORDER BY RAND() ) `sub`
                group by `sub`.`user_id`
                ORDER BY `sub`.created_at DESC');

            return $proposals;

        }


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
