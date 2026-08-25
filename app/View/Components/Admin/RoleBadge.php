<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoleBadge extends Component
{
    public function __construct(
        public string|null $role
    ) {}


    public function render(): View|Closure|string
    {
        return view('components.admin.role-badge');
    }
}
