<x-master-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<form  method="POST" class="bg-white" action=" {{url('admin/user/update/'.$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')          
  <div class="card card-primary mt-5 py-2">
  @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show p-3" role="alert">
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ session('status') }}
    </div>
    @endif
  <div class="card-header">
   <h3 class="card-title">Modification Employer</h3>

  </div>
       <div class="card-body">
             <div class="form-group">
                 <div class="col-12">
                 <label class="form-label" for="form3Example1n">{{ __('register.title') }}</label>
                     <select class="form-control" aria-label="Default select example" name="title">
                     <option value="">Sélectionnez</option>
                        @foreach(config('employees.titles') as $k => $v)
                            @if($k == $user->title)
                            <option value="{{ $k }}" selected>{{ $v }}</option>
                            @else
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endif
                        @endforeach
                    </select>
                 <x-input-error :messages="$errors->get('title')" class="mt-2" />
                 </div>
                </div>
             <div class="row mt-4">
             <div class="col-md-6 mb-4">
             <div class="form-group">
            <x-input-label for="firstName" :value="__('register.firstName')" />
            <x-text-input id="firstName" name="firstName" type="text" class="mt-1 block w-full" :value="old('firstName', $user->firstName)" required autofocus autocomplete="firstName" />
            <x-input-error class="mt-2" :messages="$errors->get('firstName')" />
             </div>
            </div>
            <div class="col-md-6 mb-4">
            <div class="form-group">
            <x-input-label for="lasttName" :value="__('register.lastName')" />
            <x-text-input id="lastName" name="lastName" type="text" class="mt-1 block w-full" :value="old('lastName', $user->lastName)" required autofocus autocomplete="lastName" />
            <x-input-error class="mt-2" :messages="$errors->get('lastName')" />
             </div>
            </div>
           </div>

           <div class="row">
            <div class="col-md-6 mb-4">
            <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            </div>
            <div class="col-md-6 mb-4">
            <div class="form-group">
            <x-input-label for="number" :value="__('register.phone')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number', $user->phone_number)" required autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
            </div>
            </div>
            </div>

            <div class="row">
            <div class="col-md-6 mb-4">
            <div class="form-group">
            <x-input-label for="position" :value="__('register.position')" />
            <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" :value="old('position', $user->position)" required autocomplete="position" />
            <x-input-error class="mt-2" :messages="$errors->get('position')" />
            </div>
            </div>
            <div class="col-md-6 mb-4">
            <div class="form-group">
            <x-input-label for="number" :value="__('Manager')" />
            <select class="form-control" id="manager" aria-label="Default select example" name="manager">
            @foreach($managers as $manager)
            <option value="{{ $manager->id }}" @if ($user->manager_id == $manager->id) selected="selected" @endif>{{ $manager->firstName . ' ' . $manager->lastName }}</option>
            @endforeach
                </select>
            <x-input-error class="mt-2" :messages="$errors->get('manager_id')" />
            </div>
            </div>
            </div>       
          </div>
      <div class="card-footer">
        <x-primary-button>{{ __('register.save') }}</x-primary-button>
        @if (session('status') === 'register-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"
            >{{ __('register.saved') }}</p>
        @endif
    </div>
    </div>
</x-master-layout>