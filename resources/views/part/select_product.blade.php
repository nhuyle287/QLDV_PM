<div id="list-product" @if (isset($flag)) style="display: none" @endif>
    <div id="product-info" class="form-group product-info">
        <div class="row">
            <div class="col-md-5">
                <select name="select-product" class="form-control select-product" onchange="selectProduct(this)">
                    <option value="0">Chọn Sản Phẩm</option>
                    @for($i = 1; $i < 5; $i ++)
                        @php $cost = 100000 * $i @endphp
                        <option name="" id="{{$i}}" data-cost={{$cost}} value="{{$i}}">Vovlo {{$i}} (cái)</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control qty" oninput="changeQty(this)" value="0" min="0">
            </div>
            <div class="col-md-3">
                <input id="cost" type="text" class="form-control cost" readonly value=""/>
            </div>
            <div class="col-md-2">
                <button class="btn btn-danger" onclick="removeProduct(this)">Xóa</button>
            </div>
        </div>
    </div>
</div>
