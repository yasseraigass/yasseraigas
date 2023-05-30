@extends('layouts.app')

@section('title', 'liste')
@section('content')

    <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Start_date</th>
            <th>End_date</th>
            <th>Price</th>
        </tr>

        @foreach ($lists as $list)
            <tr class="table-primary">
                <td>{{ $list->id }}</td>
                <td>{{ $list->title }}</td>
                <td>{{ $list->description }}</td>
                <td>{{ $list->start_date }}</td>
                <td>{{ $list->end_date }}</td>
                <td>
                    <a class="btn btn-dark" href="{{ route('edit_product', $list->id) }}" role="button">Modifer</a>
                    <form action="{{ route('delete_product', $list->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#confirmDeleteModal{{ $list->id }}">
                            Delete
                        </button>

                        <!-- Confirm Delete Modal -->
                        <div class="modal fade" id="confirmDeleteModal{{ $list->id }}" tabindex="-1"
                            aria-labelledby="confirmDeleteModalLabel{{ $list->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel{{ $list->id }}">
                                            Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this product?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

@endsection
