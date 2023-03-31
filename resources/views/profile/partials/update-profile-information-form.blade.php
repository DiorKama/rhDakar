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
            {{ __('update_user.update') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("update_user.text1") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

    <div class="row">
        <div class="col-6 ">
            <label class="form-label" for="form3Example1n">{{ __('update_user.firstName') }}</label>
            <input  id="firstName" class="form-control" type="text" name="firstName" required autofocus autocomplete="firstName" />
            <x-input-error :messages="$errors->get('firstName')" class="mt-2" />
        </div>
    </div>
    <div class="row">
        <div class="col-6 ">
            <label class="form-label" for="form3Example1n">{{ __('update_user.lastName') }}</label>
            <input  id="lastName" class="form-control" type="text" name="lastName" required autofocus autocomplete="lastName" />
            <x-input-error :messages="$errors->get('lastName')" class="mt-2" />
        </div>
    </div>
    
    <div>
        <div class="col-6">
        <label class="form-label" for="form3Example1n">{{ __('Email') }}</label>
        <input  id="email" class="form-control" type="email" name="email" required autofocus autocomplete="email" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
    </div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('update_user.text2') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('update_user.text3') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('update_user.text4') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <!-- <x-primary-button>{{ __('update_user.save') }}</x-primary-button> -->
             <button class=" btn btn-warning text-white">{{ __('update_user.save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('update_user.saved') }}</p>
            @endif
        </div>
    </form>
        <x-monbody>
        
    </x-monbody>
</section>
