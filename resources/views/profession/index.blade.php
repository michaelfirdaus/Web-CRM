@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card card-header">
            <th><strong>All Professions</strong></th>
        </div>
        <div class="card card-body">

            <table class="table table-hover">
                <thead>
                    <th>
                        Profession Name
                    </th>
                    <th>
                        Editing
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>
        
                <tbody>
                    @if($professions->count() > 0)
                        @foreach ($professions as $profession)
                            <tr>
                                <td>
                                    {{ $profession->name }}
                                </td>
                                <td>
                                    <a href="{{ route('profession.edit', ['id' => $profession ->id]) }}" class="btn btn-xs btn-info">
                                        <span class="fas fa-pencil-alt"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('profession.delete', ['id' => $profession ->id]) }}" class="btn btn-xs btn-danger">
                                        <span class="fas fa-trash-alt"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="3" class="text-center">No data available, try add some new profession.</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection