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

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="row">
        <div class="col-6 ">
            <label class="form-label" for="current_password">{{ __('update_pass.current') }}</label>
            <input  id="current_password" class="form-control" type="password" name="current_password" required autofocus autocomplete="current_password" />
            <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
        </div>
        </div>

        <div class="row">
        <div class="col-6 ">
            <label class="form-label" for="password">{{ __('update_pass.new') }}</label>
            <input  id="password" class="form-control" type="password" name="password" required autofocus autocomplete="password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        </div>

        <div class="row">
        <div class="col-6 ">
            <label class="form-label" for="password_confirmation">{{ __('update_pass.confirm') }}</label>
            <input  id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autofocus autocomplete="password_confirmation" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        </div>

        <div class="flex items-center gap-4">
            <!-- <x-primary-button>{{ __('update_pass.save') }}</x-primary-button> -->
            <button class=" btn btn-warning text-white mt-3">{{ __('update_pass.save') }}</button>

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
