<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactRequest;
use App\Services\General\Contact\ContactService;
use App\Services\General\Setting\SettingService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @var ContactService
     */
    private $contactService;
    /**
     * @var SettingService
     */
    private $settingService;

    /**
     * ContactController constructor.
     * @param ContactService $contactService
     * @param SettingService $settingService
     */
    public function __construct(
        ContactService $contactService,
        SettingService $settingService
    )
    {
        $this->contactService = $contactService;
        $this->settingService = $settingService;
    }

    public function index(){
        $setting = $this->settingService->firstOrFail();

        return view('front.contact.contact', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $this->contactService->create($request->all());

        return redirect()->route('contact.index');

    }
}
