<?php

namespace App\Http\Controllers;

use App\Models\ActivityEffectiveRelation;
use App\Models\ActivityEffective;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestsController extends Controller
{
    public function test()
    {
        DB::beginTransaction();
        try {
            //插入活动有效关系记录
            $activity_effective_relation = new ActivityEffectiveRelation();
            $activity_effective_relation->user_id = 101;
            $activity_effective_relation->master_id = 1;
            $activity_effective_relation->save();

            //活动师傅有效徒弟统计表
            DB::insert(
                'INSERT INTO activity_effectives (user_id,name,uid,effective_count,created_at,updated_at) VALUES (:user_id, :name, :uid, :effective_count, :created_at, :updated_at) ON DUPLICATE KEY UPDATE effective_count = effective_count + 1, updated_at = :update_time',
                [
                    'user_id' => 1,
                    'name'    => 'master',
                    'uid'     => 10086,
                    'effective_count' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'update_time' => Carbon::now(),
                ]);

            DB::commit();

            return 'success';
        } catch (\Exception $e) {
            DB::rollBack();
            $msg = '[test] ' . 'reason:' . $e->getMessage();
            Log::info($msg);

            return 'fail';
        }
    }
}
