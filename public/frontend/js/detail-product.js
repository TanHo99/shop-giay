// XỬ LÝ SIZE & COLOR
var color = $(".color_input:checked").val();
var size = $(".size_input:checked").val();
var colorValue = null;
var sizeValue = null;
// kiểm tra số lượng kho
function bindSelectAttr(type) {
    var product_id = $("input[name='productid_hidden']").val();
    var color_id = $(".color_input:checked").val();
    var size_id = $(".size_input:checked").val();
    console.log("color_id:", color_id, "size_id:", size_id, "product_id:", product_id);
    // ajax load warehouse quantity
    $.ajax({
        type: "GET",
        url: ajaxLoadUrl,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'type': type,
            'sanpham_id': product_id,
            'color_id': color_id,
            'size_id': size_id
        },
        success: function(response) {
            if (!response.error) {
                $(".warehouse_quantity").html(response.warehouse);
                if (type == 'checkedDisabled') {
                    $(".size_option").html(response.html);
                }
            }
        }
    });
}
// kiểm tra màu sắc
function att_color_choose() {
    $('.color_option').on('change', function() {
        var type = 'checkedDisabled';
        bindSelectAttr(type);
    });
}
// kiểm tra size
function att_size_choose() {
    $('.size_option').on('change', function() {
        var type = null;
        bindSelectAttr(type);
    });
}
$(document).ready(function() {
    var type = null;
    bindSelectAttr(type);
    att_color_choose();
    att_size_choose();
    // kiểm tra dữ liệu trước khi thêm vào giỏ hàng
    $('.cart').on('click', function() {
        var color_id = $(".color_input:checked").val();
        var size_id = $(".size_input:checked").val();
        var qty = $("#qty").val();
        console.log('cart', color_id, size_id);
        if (!color_id && !size_id) {
            alert("Bạn chưa chọn Màu sắc và Size!");
            return false;
        } else if (!color_id) {
            alert("Bạn chưa chọn Màu sắc!");
            return false;
        } else if (!size_id) {
            alert("Bạn chưa chọn Size");
            return false;
        }
        if (!qty || qty < 1) {
            alert("Số lượng không hợp lệ!");
            return false;
        }
    });
});