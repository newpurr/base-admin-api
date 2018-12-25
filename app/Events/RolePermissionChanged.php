<?php

namespace App\Events;

use App\Models\Role;
use Illuminate\Queue\SerializesModels;

class RolePermissionChanged
{
    use SerializesModels;
    
    /**
     * role model
     *
     * @var \App\Models\Role
     */
    private $role;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
        echo 2;
    }
}
