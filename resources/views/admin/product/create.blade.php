@extends('admin.dashboad')
@section('head')
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">

@endsection

@section('content')
    <div id="page-wrapper">
        <div class="box-body">
                {!! Form::open(['route' => ['products.store'], 'class' => 'form-horizontal', 'method' => 'post', 'enctype'=>'multipart/form-data']) !!}
                <div class="row" style="width: 70%; margin-left: 200px; margin-top: 50px">
                    <div class="form-group">
                        <label for="title-post">Tên Sản Phẩm(<span style="color: red;">*</span>)</label>
                        @if ($errors->has('name'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        {!! Form::text('name', '', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label for="title-post">Giá Bán(<span style="color: red;">*</span>)</label>
                        @if ($errors->has('price'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                        @endif
                        {!! Form::number('price', '', ['class' => 'form-control']) !!}

                    </div>

                    <div class="form-group">
                        <label for="description">description</label>
                        @if ($errors->has('description'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                        {!! Form::textarea('description', '', ['class' => 'form-control']) !!}

                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        @if ($errors->has('category_id'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif

                        <select name="category_id" multiple class="form-control">
                            <option>---</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        @if ($errors->has('content'))
                            <span class="help-block" style="color: red;">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                        @endif
                        {!! Form::textarea('content', '', ['class' => 'form-control']) !!}
                    </div>


                    <div class="widget-box">
                        <div class="widget-header">
                            <h4 class="widget-title">Ảnh sản phẩm</h4>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main"  style="height: 180px;">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <label class="ace-file-input ace-file-multiple">
                                            <input type="file" id="image" name="image">
                                            @if ($errors->has('image'))
                                                <p style="color: blue;">{{ $errors->first('image') }}</p>
                                            @endif
                                            <a class="remove" href="#">
                                                <i class=" ace-icon fa fa-times"> </i>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary">Đăng bài </button>
            {!! Form::close() !!}
        </div>
        <hr>
    </div>
@endsection
@section('footer')
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.select2').select2({
            placeholder : 'Please select user',
            multiple: true,
            tags: true,
            tokenSeparators: [',', ' '],
        });


        $('#image').ace_file_input({
            style: 'well',
            btn_choose: 'Drop files here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-cloud-upload',
            droppable: true,
            thumbnail: 'small'//large | fit
            ,
            preview_error : function(filename, error_code) {
                //name of the file that failed
                //error_code values
                //1 = 'FILE_LOAD_FAILED',
                //2 = 'IMAGE_LOAD_FAILED',
                //3 = 'THUMBNAIL_FAILED'
                //alert(error_code);
            }

        }).on('change', function(){
            //console.log($(this).data('ace_input_files'));
            //console.log($(this).data('ace_input_method'));
        });
    </script>
@endsection
