<?php

namespace App\Repositories\Admin;

use App\Models\Admin\NewsInfo;
use App\Repositories\BaseRepository;

/**
 * Class NewsInfoRepository
 * @package App\Repositories\Admin
 * @version January 8, 2025, 4:16 am UTC
*/

class NewsInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cover_front_image',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NewsInfo::class;
    }

    /**
     * 取得所有資料並載入翻譯
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        return $this->model->with('translations')->get($columns);
    }

    /**
     * 分頁查詢並載入翻譯，可自行設定語系，未設定依照系統語系
     */
    public function paginate($perPage, $columns = ['*'], $locale = null)
    {
        $query = $this->model->with('translations');

        if ($locale) {
            $query->whereTranslation('locale', $locale);
        }

        return $query->paginate($perPage, $columns);
    }

    /**
     * 依 ID 查詢並載入翻譯
     */
    public function find($id, $columns = ['*'], $locale = null)
    {
        if ($locale) {
            return $this->model->with('translations')->whereTranslation('locale', $locale)->find($id, $columns);
        }

        // 若未指定語系，則載入所有語系的翻譯
        // 這樣可以確保即使沒有指定語系，也能取得所有翻譯資料
        return $this->model->with('translations')->find($id, $columns);
    }

    /**
     * 依語系搜尋標題或內容
     */
    public function searchByTranslation($keyword, $locale = null)
    {
        $locale = $locale ?: app()->getLocale();

        return $this->model
            ->whereTranslationLike('title', "%{$keyword}%", $locale)
            ->orWhereTranslationLike('content', "%{$keyword}%", $locale)
            ->with('translations')
            ->get();
    }
}
