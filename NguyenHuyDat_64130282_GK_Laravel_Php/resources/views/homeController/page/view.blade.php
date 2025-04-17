@extends('homeController.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>View page</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('pages.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="post" id="topicForm" name="topicForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Page Name</label>
                                    <input type="text" name="pageName" id="pageName" class="form-control"
                                        placeholder="Page Name" value="{{ $page->pageName }}" disabled>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Keyword</label>
                                    <input type="text" name="keyword" id="keyword" class="form-control"
                                        placeholder="Keyword" value="{{ $page->keyword }}" disabled>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Page Content</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="summernote" placeholder="Page Content"
                                        disabled>{{ $page->content }}</textarea>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Parent Page ID</label>
                                    <select name="parentPageId" id="parentPageId" class="form-control" disabled>
                                        <option {{ $page->parentPageId == 1 ? 'selected' : '' }} value="1">Có</option>
                                        <option {{ $page->parentPageId == 0 ? 'selected' : '' }} value="0">Không
                                        </option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection

@section('customJs')
    <script>
        $('#content').summernote('disable');
    </script>
@endsection
