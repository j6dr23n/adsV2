<?php

namespace App\GraphQL\Queries;

use App\Models\Ads;
use Illuminate\Support\Facades\DB;

final class DateRangeResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (array_key_exists('domain_id', $args)) {
            $ads = Ads::whereDate('ads.created_at', '>=', $args['startDate'])->whereDate('ads.created_at', '<=', $args['endDate'])->where('ads.domain_id', $args['domain_id'])->join('users', 'users.id', '=', 'ads.user_id')->where('ads.user_id', $args['user_id'])->select(DB::raw("(sum(revenue)) as revenue"), DB::raw("(sum(imperssions)) as imperssions"), DB::raw("(sum(clicks)) as clicks"), DB::raw("(sum(eCPM)) as eCPM"))->latest('ads.created_at')->get();
        } else {
            $ads = Ads::whereDate('ads.created_at', '>=', $args['startDate'])->whereDate('ads.created_at', '<=', $args['endDate'])->join('users', 'users.id', '=', 'ads.user_id')->where('ads.user_id', $args['user_id'])->select(DB::raw("(sum(revenue)) as revenue"), DB::raw("(sum(imperssions)) as imperssions"), DB::raw("(sum(clicks)) as clicks"), DB::raw("(sum(eCPM)) as eCPM"))->latest('ads.created_at')->get();
        }

        return $ads;
    }
}
