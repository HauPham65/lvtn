<!-- {{-- <div class="form-serch-pr">
    <form action="{{route('interface.product')}}" method="GET">
        <div class="search_box pull-right">
            <input type="text" name="keyword" placeholder="tìm kiếm" />
            <button type="submit" class="btn btn-warning">tìm kiếm </button>
        </div>
    </form>
</div> --}} -->
<div  class="left-sidebar">
    <div style="background-color: #00FFFF" class="panel-group category-products" id="accordian"><!--category-productsr-->
        <h2 style="font-size: 30px;
        padding-left: 16px;
        margin-top: -9px; ">Danh Mục </h2>
        @foreach ($categories as $citem)
            <div class="panel panel-default">
                <div class="panel-heading"  style="text-align:center; background-color: #000 " >
                    <h4 class="panel-title"><a style="color:#FE980F;" href="">{{ $citem->name }}</a></h4>
                </div>
            </div>
        @endforeach
    </div><!--/category-productsr-->
    <div  style="background-color: #00FFFF;border-radius: 10px" class="brands_products"><!--brands_products-->
        <div class="brands-name" >
            <h2 style="font-size: 30px;
            padding-left: 16px;
            margin-top: -9px;">Hãng Sản Xuất</h2>
            <ul class="nav nav-pills nav-stacked">
                @foreach ($manufacts as $mitem)
                    <li><a  style="text-align:center;background-color: #000; color:#FE980F" href="">{{ $mitem->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div><!--/brands_products-->
</div>
