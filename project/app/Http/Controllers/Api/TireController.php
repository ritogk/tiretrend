<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
//model
use App\Models\Tire;
// openapi
use App\OpenAPI;
use App\Libs\OpenAPIUtility;

class TireController extends Controller
{
    /**
     * タイヤの一覧情報を取得します。
     *
     * @param Request $request
     * @return void
     */
    public function list(Request $request)
    {
        // oasのリクエストモデルに変換
        $parameters = new OpenAPI\Model\GetTireQuery($request->all());

        // メインロジック
        $period_start = $parameters->getPeriodStart();
        $period_end = $parameters->getPeriodEnd();
        $maker = $parameters->getMaker();
        $type = $parameters->getType();

        $items = Tire::select('series', 'brand', 'maker', 'type', \DB::raw('count(*) as count'))
            ->when(isset($maker), function ($query) use ($maker) {
                return $query->where('maker', 'like', "%$maker%");
            })
            ->when(isset($type), function ($query) use ($type) {
                return $query->where('type', 'like', "%$type%");
            })
            ->when(isset($period_start), function ($query) use ($period_start) {
                return $query->where("posted_at", '>=', $period_start);
            })
            ->when(isset($period_end), function ($query) use ($period_end) {
                return $query->where("posted_at", '<=', $period_end);
            })
            ->groupBy(['series', 'brand', 'maker', 'type'])
            ->orderBy('count', 'desc')->get()->toArray();

        # oasのレスポンスモデルに変換して返す。
        return response()->json(
            OpenAPIUtility::dicstionariesToModelContainers(OpenAPI\Model\Tire::class, $items),
            Response::HTTP_OK
        );
    }
}
