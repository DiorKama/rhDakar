<section>
@if (session('status'))
        <div class="alert alert-success p-3">
            {{ session('status') }}
        </div>
    @endif
    <x-monheader>

    </x-monheader>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('update_pass.update') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('update_pass.text1') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.admin.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        
        <div>
            <x-input-label for="current_password" :value="__('update_pass.current')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('update_pass.new')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('update_pass.confirm')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('update_pass.save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('update_pass.saved') }}</p>
            @endif
        </div>
    </form>
    <x-monbody>
        
    </x-monbody>
</section>
