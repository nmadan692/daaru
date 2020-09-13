<?php


namespace App\Services\General\CmsPage;


use App\Services\BaseService;
use App\Entities\CmsPage;


class CmsPageService extends BaseService
{
    public function model()
    {
        return CmsPage::class;
    }

}
