<?php

use App\Services\AuthService;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;

new #[Layout('layouts.guest')] class extends Livewire\Component {
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public function login(AuthService $service): void
    {
        $this->validate();

        $key = 'login:'.request()->ip();

        if (RateLimiter::tooManyAttempts($key, 5)) {
            $this->addError('email', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($key),
            ]));

            return;
        }

        RateLimiter::hit($key, 60);

        try {
            $service->login($this->email, $this->password);
            RateLimiter::clear($key);

            $this->redirect(route('dashboard'), navigate: true);
        } catch (ValidationException $exception) {
            $this->addError('email', $exception->errors()['email'][0] ?? __('auth.failed'));
        }
    }
};
