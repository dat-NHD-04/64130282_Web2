@extends('homeController.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-6">
                    <h1>Add post</h1>
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
                                        placeholder="Post Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="description">Post Content</label>
                                    <textarea name="content" id="content" cols="30" rows="10" class="summernote" placeholder="Post Content"></textarea>
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">Parent Post ID</label>
                                    <select name="categoryId" id="categoryId" class="form-control">
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="pt-1">
                                <button type="submit" class="btn btn-success ml-2"><i
                                        class="fas fa-plus-circle"></i>&nbsp;Create</button>
                                <a href="{{ route('posts.create') }}" class="btn btn-outline-dark ml-3"><i
                                        class="fas fa-ban"></i>&nbsp;Cancel</a>
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
        $("#postForm").submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $("button[type=submit]").prop('disabled', true);
            $.ajax({
                url: '{{ route('posts.store') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $("button[type=submit]").prop('disabled', false);

                    if (response["status"] == true) {

                        window.location.href = "{{ route('posts.index') }}";

                        $("#title").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $("#content").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                        $("#categoryId").removeClass('is-invalid')
                            .siblings('p')
                            .removeClass('invalid-feedback').html("");

                    } else {

                        var errors = response['errors'];
                        if (errors['title']) {
                            $("#title").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['title']);
                        } else {
                            $("#title").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['content']) {
                            $("#content").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['content']);
                        } else {
                            $("#content").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                        if (errors['categoryId']) {
                            $("#categoryId").addClass('is-invalid')
                                .siblings('p')
                                .addClass('invalid-feedback').html(errors['categoryId']);
                        } else {
                            $("#categoryId").removeClass('is-invalid')
                                .siblings('p')
                                .removeClass('invalid-feedback').html("");
                        }

                    }
                },
                error: function(jqXHR, exception) {
                    console.log("Đã xảy ra lỗi!");
                }
            });
        });
    </script>
@endsection
