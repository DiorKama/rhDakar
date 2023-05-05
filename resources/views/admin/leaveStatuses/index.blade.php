<x-master-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="">
<div class="container-xl mt-4">
	<div class="table-responsive py-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="ml-3">
						<h2 class="">Liste <b>Type de Status</b></h2>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover"> 
				<thead>
					<tr>
                    <th>{{ __('ID') }}</th>
                      <th>{{ __('Titre Statut') }}</th>

                      <th>{{ __('Description') }}</th>

                      <th>{{ __('Active') }}</th>
					  <th>{{ __('Créé le') }}</th>
					  <th>{{ __('Updated') }}</th>
					  <th>{{ __('Actions') }}</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($leaveStatuses as $leaveStatus)
					<tr>	
                        <td><a href="{{ route('admin.leaveStatus.show', ['leaveStatus' => $leaveStatus->id]) }}" class="">
                            {{$leaveStatus->id}}
                         </a></td>
                        <td>{{$leaveStatus->title}}</td>
                        <td>{{$leaveStatus->description}}</td>
                        <td>{{ $leaveStatus->active ? 'oui' : 'non' }}</td>
						<td>{{ $leaveStatus->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td>{{ $leaveStatus->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
						<td class="text-nowrap">
                        <button type="button" class="btn btn-primary"><a href="{{ route('admin.leaveStatus.edit', ['leaveStatus' => $leaveStatus->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                        <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce Status?')) { window.location.href = '{{url('admin/leaveStatus/delete/'.$leaveStatus->id)}}' }">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-success"><a href="{{ route('admin.leaveStatus.show', ['leaveStatus' => $leaveStatus->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-eye" aria-hidden="true"></i></a></button>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $leaveStatuses->links() }}
     </div>
</div>
</div>
</div>
</x-master-layout>