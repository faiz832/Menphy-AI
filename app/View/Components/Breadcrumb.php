<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Breadcrumb extends Component
{
    public array $segments;

    private array $urlMapping = [];

    public function __construct()
    {
        // Get the current URL path segments
        $path = request()->path();

        // Split the path into segments and get the first 3
        $allSegments = array_filter(explode('/', $path));
        $firstThreeSegments = array_slice($allSegments, 0, 3);

        // Decode URL-encoded segments (like: delete %20)
        $decodedSegments = array_map('urldecode', $firstThreeSegments);

        // Map the segments to their friendly names
        $this->segments = array_map(function ($segment) {
            return $this->urlMapping[$segment] ?? ucfirst($segment);
        }, $decodedSegments);
    }

    public function render(): View
    {
        return view('components.breadcrumb');
    }
}
