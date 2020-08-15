<?php

use App\Services\General\EmailTemplateService;
use Illuminate\Database\Seeder;

class EmailTemplateTableSeeder extends Seeder
{
    /**
     * @var EmailTemplateService
     */
    private $emailTemplateService;

    /**
     * EmailTemplateSeeder constructor.
     * @param  EmailTemplateService  $emailTemplateService
     */
    public function __construct(EmailTemplateService $emailTemplateService)
    {
        $this->emailTemplateService = $emailTemplateService;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'slug'       => 'password_reset',
                'title'      => 'Reset Password Notification',
                'subject'    => 'Reset Password Notification',
                'email_from' => config('mail.from.address'),
                'content'    => '<p>Hello!</p><p><br>You are receiving this email because we received a password reset request for your account.</p><p> [BUTTON]</p><p> If you did not request a password reset, no further action is required.</p><p><br>The MJM Team<br></p>',
            ],
        ];

        foreach ($templates as $template) {

            $this->emailTemplateService->updateOrCreate(['slug' => $template['slug']], $template);
        }
    }
}
