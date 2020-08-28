<?php


namespace App\Services\General\Contact;


use App\Entities\Contact;
use App\Services\BaseService;

class ContactService extends BaseService
{
    public function model()
    {
        return Contact::class;
    }
}
