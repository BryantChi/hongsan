<?php

namespace App\Repositories\Admin;

use App\Models\Admin\HeroSlide;
use App\Repositories\BaseRepository;

class HeroSlideRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'link',
        'image_624',
        'image_1024',
        'image_1280',
        'image_1920'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return HeroSlide::class;
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
}
