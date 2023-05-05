<x-master-layout>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="">

<div class="container-xl mt-4">
	<div class="table-responsive py-5">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="ml-3">
						<h2 class="">Liste <b>Type de Congés</b></h2>
					</div>
				</div>
			</div>
            <table class="table table-striped table-hover"> 
				<thead>
					<tr>
                    <th>{{ __('ID') }}</th>
                      <th>{{ __('Titre Congés') }}</th>

                      <th>{{ __('Description') }}</th>

                      <th>{{ __('Active') }}</th>
                      <th>{{ __('Créé le') }}</th>
                      <th>{{ __('Updated') }}</th>
                      <th>{{ __('Actions') }}</th>
					</tr>
				</thead>
				<tbody>
                    @foreach($leaveTypes as $leaveType)
					<tr>	
                        <td><a href="{{ route('admin.leaveType.show', ['leaveType' => $leaveType->id]) }}" class="">
                            {{$leaveType->id}}
                         </a></td>
                        <td>{{$leaveType->title}}</td>
                        <td>{{$leaveType->description}}</td>
                        <td>{{ $leaveType->active ? 'Oui' : 'Non' }}</td>
                        <td>{{ $leaveType->created_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
                        <td>{{ $leaveType->updated_at->locale('fr_FR')->isoFormat('DD MMM YYYY à HH:mm:ss', 'Do MMM YYYY à HH:mm:ss') }}</td>
						<td class="text-nowrap">
                        <button type="button" class="btn btn-primary"><a href="{{ route('admin.leaveType.edit', ['leaveType' => $leaveType->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-pencil" aria-hidden="true"></i></a></button>
                        <button type="button" class="btn btn-danger" onclick="if(confirm('Êtes-vous sûr de vouloir supprimer ce type de congés?')) { window.location.href = '{{url('admin/leaveType/delete/'.$leaveType->id)}}' }">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-success"><a href="{{ route('admin.leaveType.show', ['leaveType' => $leaveType->id]) }}" class="text-white" style="text-decoration: none;"><i class="fa fa-eye" aria-hidden="true"></i></a></button>
					</tr>
					@endforeach
				</tbody>
			</table>

                {{ $leaveTypes->links() }}  
     </div>
</div>
</div>
</div>
</x-master-layout>