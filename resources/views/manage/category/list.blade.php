@extends('manage.layouts.app')

@section('title', '分类管理')

@section('style')
    @parent
@endsection

@section('breadcrumb')
    <li navValue="nav_0"><a href="#">管理专区</a></li>
    <li navValue="nav_0_1"><a href="#">分类管理</a></li>
@endsection

@section('body')
<div class="row">
    <div class="col-md-12">
		<section class="panel">
            <div class="panel-body">
                {{--<form class="form-inline" id="search_form">--}}
                    {{--<div class="form-group">--}}
                        {{--<label class="sr-only" for="search"></label>--}}
                        {{--<input type="text" class="form-control" id="search" name="keyword"--}}
                               {{--value="{{ Request::get('keyword') }}" placeholder="输入分类" required>--}}
                    {{--</div>--}}
                    {{--<button type="submit" class="btn btn-primary" id="salesman_search">搜索</button>--}}
                {{--</form>--}}
            <header class="panel-heading">
                服务列表
            </header>
            	<table class="table table-striped table-hover">
		            <thead>
		                <tr>
		                    <th>ID</th>
		                    <th>名称</th>
		                    <th>父级</th>
                            <th>添加时间</th>
							<th>操作</th>
		                </tr>
		            </thead>

		            <tbody id="target">
                        @foreach($lists as $list)
                        <tr>
                            <td>{{ $list['id'] }}</td>
                            <td>{{ $list['name'] }}</td>
                            <td>
                                @if ($list['parent_id'] == 0)
                                    顶级栏目
                                    @else
                                    {{ App\Category::find($list['parent_id'])->name }}
                                @endif
                            </td>
                            <td>{{ $list['created_at'] }}</td>
                            <td>
                                <button class="btn btn-info" type="button" onclick="location='{{ route('attribute_list', ['category_id' => $list['id'] ]) }}'">商品属性</button>
                                <button class="btn btn-info" type="button" onclick="location='{{ route('category_update', ['id' => $list['id'] ]) }}'">编辑</button>
                                <button class="btn btn-danger" type="button" onclick="javascript:if(confirm('确实要删除吗?'))location='{{ route('category_destroy', ['id' => $list['id'] ]) }}'">删除</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
		        </table>

               {{ $lists->links() }}
            </div>
    	</section>
    </div>
</div>
@endsection

@section('script')
    @parent
    {{--转换搜索链接--}}
    <script type="text/javascript">
        $(document).ready(function () {

            $('#search_form').submit(function () {

                var keyword = $('#search').val();

                if (stripscript(keyword) == '') {
                    $('#search').val('');
                    return false;
                }

                window.location = '{{ route('category_search', ['keyword' => '']) }}/' + stripscript(keyword);

                return false;
            });

        });

        function stripscript(s)
        {
            var pattern = new RegExp("[`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]");
            var rs = "";
            for (var i = 0; i < s.length; i++) {
                rs = rs+s.substr(i, 1).replace(pattern, '');
            }
            return rs;
        }
    </script>
@endsection
