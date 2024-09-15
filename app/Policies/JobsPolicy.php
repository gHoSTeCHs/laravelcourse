<?php

namespace App\Policies;

use App\Models\Jobs;
use App\Models\User;

class JobsPolicy
{
   public function edit(User $user, Jobs $job): bool
   {
       return $job->employer->user->is($user);
   }
}
