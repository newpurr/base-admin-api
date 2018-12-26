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
     * @var Role
     */
    private $role;
    
    /**
     * Create a new event instance.
     *
     * @param \App\Models\Role $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    
    /**
     * getRole
     *
     * @return Role
     */
    public function getRole() : Role
    {
        return $this->role;
    }
}
