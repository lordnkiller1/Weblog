<?php

namespace App\View\Components;

use Carbon\CarbonInterface;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Morilog\Jalali\Jalalian;

class JalaliDate extends Component
{
    public function __construct(
        public CarbonInterface $date,
        public string $format = 'Y/m/d',
    ) {}

    public function render(): View
    {
        return view('components.jalali-date');
    }

    public function formatted(): string
    {
        return Jalalian::fromCarbon($this->date)->format($this->format);
    }
}
