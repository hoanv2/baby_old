@extends('admin.dashboad')
@section('head')

@endsection

@section('content')
    <div id="page-wrapper">
        <div class="box-body">
            {!! Form::open(['route' => ['products.update',$products->id], 'class' => 'form-horizontal', 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}

            <div class="row" style="width: 70%; margin-left: 200px; margin-top: 50px">
                <div class="form-group">
                    <label for="title-post">Tên Sản Phẩm(<span style="color: red;">*</span>)</label>
                    @if ($errors->has('name'))
                        <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                    {!! Form::text('name', $products->name, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    <label for="title-post">Giá Bán(<span style="color: red;">*</span>)</label>
                    @if ($errors->has('price'))
                        <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                    @endif
                    {!! Form::number('price',$products->price, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    @if ($errors->has('description'))
                        <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                    @endif
                    {!! Form::textarea('description', $products->description, ['class' => 'form-control']) !!}

                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    @if ($errors->has('content'))
                        <span class="help-block" style="color: red;">
                            <strong>{{ $errors->first('content') }}</strong>
                        </span>
                    @endif
                    {!! Form::textarea('content', $products->content, ['class' => 'form-control']) !!}
                </div>


                <div class="widget-box" style="height: 310px;">
                    <div class="widget-header">
                        <h4 class="widget-title">Ảnh sản phẩm</h4>
                    </div>
                    <div class="widget-body">
                        <div class="widget-main"  style="height: 180px;">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <img src='{{ asset("image/".$products->image) }}' style="max-width: 350px;height: 240px" class="col-md-3">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-1"><h5>Thay đổi Ảnh</h5></div>
                                    <label class="ace-file-input ace-file-multiple col-md-5">

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
    <script type="text/javascript">

        $('#image').ace_file_input({
            style: 'well',
            btn_choose: 'Drop files here or click to choose',
            btn_change: null,
            no_icon: 'ace-icon fa fa-cloud-upload',
            droppable: true,
            thumbnail: 'large'//large | fit
            ,
            preview_error : function(filename, error_code) {
            }
        }).on('change', function(){
        });
    </script>
@endsection