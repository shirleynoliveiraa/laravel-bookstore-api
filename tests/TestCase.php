<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        // Disable authentication for testing
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);
    }
}
