@extends('homeController.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>View post</h1>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('posts.index') }}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <form action="" method="post" id="postForm" name="postForm">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Post Title</label>
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Post Name" value="{{ $post->title }}" disabled>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Post Content</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="summernote" placeholder="Post Content"
                                        disabled>{{ $post->content }}</textarea>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Parent Page ID</label>
                                    <select name="categoryId" id="categoryId" class="form-control" disabled>
                                        <option {{ $post->categoryId == 1 ? 'selected' : '' }} value="1">Có</option>
                                        <option {{ $post->categoryId == 0 ? 'selected' : '' }} value="0">Không
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
