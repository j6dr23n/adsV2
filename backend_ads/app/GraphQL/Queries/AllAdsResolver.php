<?php

namespace App\GraphQL\Queries;

use App\Models\Ads;
use Illuminate\Support\Facades\DB;

final class AllAdsResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $ads = Ads::join('users', 'users.id', '=', 'ads.user_id')->select(DB::raw("(sum(revenue)) as revenue"), DB::raw("(sum(imperssions)) as imperssions"), DB::raw("(sum(clicks)) as clicks"), DB::raw("(sum(eCPM)) as eCPM"))->latest('ads.created_at')->get();

        return $ads;
    }
}
