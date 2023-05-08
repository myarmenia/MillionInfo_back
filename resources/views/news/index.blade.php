@extends('layouts.auth-app')
@section('link')
    <link href="{{ asset('assets/css/table.css') }}" rel="stylesheet">
@endsection

@section('content')
{{-- <main id="main" class="main"> --}}
    <div class="pagetitle">
      <h1>News</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">News</li>
        </ol>
      </nav>
    </div>
    <!-- End Page Title -->

    <div class="card pt-4">
      <div class="card-body">
        <!-- Primary Color Bordered Table -->
        <div style="display: flex; justify-content: flex-end">
          <a href="{{route('news.create')}}" class="btn btn-primary">Create News</a>
        </div>

        <div>
            <form action="{{route('news.index')}}" method="get" class="row g-3 mt-2" style="display: flex">
                <div class="mb-3" style="display: flex; gap: 8px">
                <div class="col-2">
                    <!-- <label for="inputNanme4" class="form-label">Title</label> -->
                    <input type="text" class="form-control" id="inputNanme4"  name="title" placeholder="Title" value="{{ request()->input('title') }}" />
                </div>
                <div class="col-2">
                    <select id="inputState" class="form-select" name="status">
                        <option value="new" {{ request()->input('status') == 'new' ? 'selected' : ''}}>New</option>
                        <option value="confirmed" {{ request()->input('status') == 'confirmed' ? 'selected' : ''}}>Confirmed</option>
                        <option value="hidden" {{ request()->input('status') == 'hidden' ? 'selected' : ''}}>Hidden</option>
                        <option value="reditab" {{ request()->input('status') == 'reditab' ? 'selected' : ''}}>Reditab</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 13.01111111111111111111% !important">Search</button>
                </div>
                <!-- </div> -->
            </form>
        </div>
        <table class="table table-bordered border-primary">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Status</th>
              <th scope="col" style="width: 60px !important">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($news as $item )
                <tr>
                <th scope="row">{{++$i}}</th>
                <td>{!!$item->title_en!!}</td>
                <td style="max-width: 300px !important">
                    {!! $item->description_en !!}
                </td>
                <td><img src="{{ route('get-file',['path'=>$item->image])}}" style="height:70px;width:70px"> </td>
                <td>{{ $item->status }}</td>
                <td>
                    <div style="display: flex !important">
                        <a href="{{route('news.edit',$item->id)}}"><i class="bi bi-pencil-square action_i"></i></a>
                        <i class="bi bi-trash action_i" data-bs-toggle="modal" data-bs-target="#disablebackdrop"  onclick="create_request_route(`news`, {{$item->id}})"></i>
                        <a href="{{ route('change_status', [$item->id, 'news', 'confirmed']) }}">
                            <i class="bi bi-check-circle action_i" style="color:{{ $item->status == 'confirmed' ? '#0d6efd' : ''}}" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="{{ $item->status == 'confirmed' ? 'Confirmed' : 'Change status to confirmed'}}"> </i>
                        </a>
                    </div>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        <!-- End Primary Color Bordered Table -->
      </div>
    </div>

    <div class="card-body d-flex justify-content-center">
      <!-- Disabled and active states -->

        {{$news->links()}}
      <!-- End Disabled and active states -->
    </div>
  {{-- </main> --}}

@endsection
@extends('layouts.modal')
@section('js-scripts')
    <script src="{{ asset('assets/back/js/modal.js') }}"></script>
@endsection

