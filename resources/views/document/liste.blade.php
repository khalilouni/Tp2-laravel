@extends('layouts.app')
@section('content') 

<div class="container ">


<h3 class="card-header text-white mt-5">@lang('lang.liste-document')</h3>
<table class="table align-middle mb-0 bg-white mt-5">
  <thead class="bg-light">
    <tr>
      <th>@lang('lang.titre-fichier')</th>
      <th>@lang('lang.nom-fichier')</th>
      <th>Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  @forelse($documents as $document)
    <tr>
      <td>
        <div class="d-flex align-items-center">
            <div class="ms-3">
            <p class="text-muted mb-0">{{ ucfirst($document->titre) }}</p>
          </div>
        </div>
      </td>
      
      <td>
        <div class="d-flex align-items-center">
         
          
            <div class="ms-3">
            
            <p class="text-muted mb-0">{{ ucfirst($document->document) }}</p>
          </div>
        </div>
      </td>
      <td>
        <div class="d-flex align-items-center">
         
          
            <div class="ms-3">
            
            <p class="text-muted mb-0">{{ $document->created_at }}</p>
          </div>
        </div>
      </td>
      
      <td>
        <a class="btn btn-outline-success" href="/download-document/{{ $document->document }}">@lang('lang.download')</a>
       @if(Auth::user()->id == $document->user_id)
        <a class="btn btn-outline-primary" href="/edit-document/{{ $document->id }}">@lang('lang.edit') </a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('lang.delete')</button>
		
		<!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
            
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @lang('lang.supprimer') 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form action="{{route('delete.document', $document->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary">@lang('lang.delete')</button>
                                </form>
                            </div>
                        </div> 
                    </div> 
                </div>

       @endif
      </td>
    </tr>
    @empty
        <p class="text-warning ">@lang('lang.empty-document') </p>
    @endforelse
    
</tbody>
</table>
<p>{{ $documents }}</p>

<a href="{{ route('create.document') }}" class="btn btn-primary">@lang('lang.add-document')</a> 
</div>



@endsection