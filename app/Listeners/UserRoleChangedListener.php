<?php

namespace App\Listeners;

use App\Events\UserRoleChanged;

class UserRoleChangedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    /**
     * Handle the event.
     *
     * @param \App\Events\UserRoleChanged $userRoleChanged
     *
     * @return void
     */
    public function handle(UserRoleChanged $userRoleChanged)
    {
        
    }
}
