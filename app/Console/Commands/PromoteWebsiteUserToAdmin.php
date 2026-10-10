<?php

namespace App\Console\Commands;

use App\Models\WebsiteUser;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:promote-website-user-to-admin {email : The registered email address to promote}')]
#[Description('Grant admin access to an existing website user')]
class PromoteWebsiteUserToAdmin extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $websiteUser = WebsiteUser::where('email', $this->argument('email'))->first();

        if (! $websiteUser) {
            $this->error('No registered account exists for that email. Register it first.');

            return self::FAILURE;
        }

        $websiteUser->forceFill(['is_admin' => true])->save();

        $this->info("Admin access granted to {$websiteUser->email}.");

        return self::SUCCESS;
    }
}
