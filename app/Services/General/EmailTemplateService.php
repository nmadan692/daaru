<?php


namespace App\Services\General;


use App\Entities\EmailTemplate;
use App\Services\BaseService;

class EmailTemplateService extends BaseService
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @inheritDoc
     */
    public function model()
    {
        return EmailTemplate::class;
    }

    /**
     * Return all the email templates
     * @param  bool  $dataTable
     * @param  array  $columns
     * @return Builder|Builder[]|Collection|Model|Model[]
     */
    public function getAll($dataTable = false, $columns = ['*'])
    {
        if ($dataTable) {
            return $this->model->select($columns);
        }

        return $this->model->all($columns);
    }

    /**
     * Creates a new Email Template
     * @param  array  $inputData
     * @return void
     */
    public function createEmailTemplate(array $inputData)
    {
        $this->model->create($inputData);
    }

    /**
     * Get a particular email template from id
     *
     * @param $emailTemplateId
     * @return Builder|Builder[]|Collection|Model|Model[]
     */
    public function getEmailTemplateById(int $emailTemplateId)
    {
        return $this->model->findOrFail($emailTemplateId);
    }

    /**
     * Deletes the email template
     *
     * @param $emailTemplateToBeDeleted
     * @return mixed
     * @throws \Exception
     */
    public function destroyEmailTemplate(EmailTemplate $emailTemplateToBeDeleted)
    {
        return $emailTemplateToBeDeleted->delete();
    }

    /**
     * Delete multiple email template from storage
     * @param  array  $selectedIds
     * @return bool
     * @internal param array $selectedData
     */
    public function multiDelete(array $selectedIds)
    {
        return $this->model->destroy($selectedIds);
    }

    /**
     * @param  string  $slug
     * @return Builder|Model
     */
    public function getBySlug($slug)
    {
        return $this->model->whereRaw("LOWER(slug)=LOWER('$slug')")->firstOrFail();
    }
    /**
     * @param  string  $content
     * @param  array  $data
     * @return bool|Builder|Builder[]|Collection|Model|Model[]|int|null
     * @throws \Exception
     */
    public function parseContent($content, $data = [])
    {

        foreach ($data as $key => $val) {
            $content = str_replace('['.strtoupper($key).']', $val, $content);
        }

        return $content;
    }

    /**
     * @param  string  $slug
     * @param  array  $data
     * @return string
     * @throws \Exception
     */
    public function getContent($slug, $data = [])
    {

        $template          = $this->getBySlug($slug);
        $template->content = $this->parseContent($template->content, $data);
        $template->title   = $this->parseContent($template->title, $data);

        return $template;
    }
}
