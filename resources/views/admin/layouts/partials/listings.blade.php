<x-master-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="">
<div class="container-xl mt-4">
	<div class="table-responsive py-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="ml-3">
						<h2 class="">Liste <b>Employées</b></h2>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover">
				<thead>
					<tr>
                      <th>{{ __('register.title') }}</th>

                      {{--<th>{{ __('register.firstName') }}</th>
                      <th>{{ __('register.lastName') }}</th>--}}

                      <th>{{ __('Nom & Prénom') }}</th>

                      <th>Email</th>
                    <th>{{ __('register.phone') }}</th>
                    <th>{{ __('register.position') }}</th>
                    <th>Manager</th>
                    <th>Actions</th>
					</tr>
				</thead>
				<tbody>
                @foreach($users as $user)
					<tr>	
                        <td>{{$user->id}}</td>
                        <td>
                        <a href="{{ route('admin.user.show', [
                            'user' => $user->id
                        ]) }}" class="">
                            {{$user->full_name}}
</a>
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>{{$user->position}}</td>
                         <td>
                            @if(!empty($user->manager))
                                {{ $user->manager->full_name }}
                            @endif
                        </td>
						<td class="text-nowrap">
                        <button type="button" class="btn btn-primary"><a href="{{ route('admin.user.edit', [
                            'user' => $user->id
                        ]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                        <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur?')) { window.location.href = '{{url('admin/user/delete/'.$user->id)}}' }">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-success"><a href="{{ route('admin.user.show', [
                            'user' => $user->id
                        ]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-eye" aria-hidden="true"></i></a></button>
					</tr>
					@endforeach
				</tbody>
			</table>

            {{ $users->links() }}
     </div>
</div>
</div>
</div>
</x-master-layout>