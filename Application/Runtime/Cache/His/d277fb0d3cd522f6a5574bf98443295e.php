<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <link href="/Public/home/favicon.ico" rel="shortcut icon">
    <title><?php echo C('TITLE');?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="/Public/his/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/his/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/his/vendor/linearicons/style.css">
    <link rel="stylesheet" href="/Public/his/vendor/chartist/css/chartist-custom.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/Public/his/css/main.css?<?php echo time();?>">
    <!-- <link rel="stylesheet" type="text/css" href="http://www.zzw0527.com/testlist/main.css?<?php echo time();?>"> -->
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="/Public/his/css/demo.css?<?php echo time();?>">
    <!-- public -->
    <link rel="stylesheet" href="/Public/his/css/public.css?<?php echo time();?>">

    <!-- ICONS >
    <link rel="apple-touch-icon" sizes="76x76" href="/Public/his/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="__PUBLIC_ROBOT__/img/favicon.png"-->
    <link rel="stylesheet" type="text/css" href="/Public/his/vendor/datetimepicker/jquery.datetimepicker.css"/>

    <script src="/Public/his/vendor/jquery/jquery.min.js"></script>
    <script src="/Public/his/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/his/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/Public/his/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="/Public/his/vendor/chartist/js/chartist.min.js"></script>
    <script src="/Public/his/scripts/klorofil-common.js"></script>
    <script src="/Public/his/vendor/datetimepicker/jquery.datetimepicker.js"></script>
    <script src="/Public/his/js/public.js?<?php echo time();?>"></script>
    <script src="/Public/his/js/check.form.js?<?php echo time();?>"></script>
    <script src="/Public/his/vendor/layer/layer.js"></script>
    <!--<script src="/Public/his/js/echarts.min.js"></script>-->


</head>
<body>


<!-- WRAPPER -->
    <!-- MAIN -->
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="pd10 panel mb10 clearfix ftr">
                <button type="button" class="btn btn-primary addDrugsBtn">添加药品</button>
                <button type="button" class="btn btn-primary addSupplierBtn ml10">批量设置</button>
                <button type="button" class="btn btn-primary ml10 review_warehousing" status="1">提交审核</button>
                <button type="button" class="btn btn-primary ml10 review_warehousing" status="2">直接入库</button>
            </div>
            <div class="pd10 panel mb10 clearfix">
                <div class="fublBox flh34 l">
                    <span class="mr10">单据号：<i><?php echo ($batches_of_inventory_number); ?></i></span>
                    <span class="">制单人：<?php echo ($vouching_name); ?></span>
                </div>
                <div class="fublBox r"><span>制单日期： </span><input type="text" name="batches_of_inventory_date"
                                                                 class="form-control form-itmeB dateTime"
                                                                 placeholder=""><i class="fa fa-calendar"></i></div>
                <div class="fublBox r mr10"><span>供应商：</span>
                    <select class="form-control form-itmeB" name="supplier_id">
                        <option value="">全部供应商</option>
                        <?php if(is_array($supplier)): foreach($supplier as $key=>$vo): ?><option value="<?php echo ($vo["sid"]); ?>"><?php echo ($vo["supplier_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="flh34 mb10 ftr">
                <span class="mr20">批发总金额：<span class="red purchase_trade_total_amount">0</span></span> <span
                    class="mr20">处方总金额：<span
                    class="red purchase_prescription_total_amount">0</span></span>
                <button type="button" class="btn btn-danger r empty_the_numerical">清空数值</button>
            </div>
            <div class="panel">
                <div class="pd10">
                    <table class="table drugsTable ftc">
                        <thead>
                        <tr>
                            <th>
                                <label class="fancy-checkbox checkAllBtn">
                                    <input type="checkbox">
                                    <span>序号</span>
                                </label>
                            </th>
                            <th>药品名称</th>
                            <th>规格</th>
                            <th>生产厂家</th>
                            <th>数量</th>
                            <th>单位</th>
                            <th>批发价</th>
                            <th>处方价</th>
                            <th>批发额</th>
                            <th>处方额</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody class="addMedicinesBox">
                        <?php if($again_info): if(is_array($again_info)): foreach($again_info as $k=>$vo): ?><tr>
                                    <td>
                                        <label class="fancy-checkbox">
                                            <input type="checkbox" name="hmr_id" value="<?php echo ($vo["hmr_id"]); ?>">
                                            <span><?php echo ($k+1); ?></span>
                                        </label>
                                    </td>
                                    <td class="medicines_name"><?php echo ($vo["medicines_name"]); ?></td>
                                    <td><?php echo ($vo["conversion"]); echo ($vo["unit"]); ?></td>
                                    <td><?php echo ($vo["producter"]); ?></td>
                                    <td>
                                        <div class="fublBox"><input type="number"
                                                                    oninput="if(value.length>3)value = value.slice(0,3) ;if(value < 0)value=0"
                                                                    class="form-control form-itmeB formNumber"
                                                                    placeholder="" name="purchase_num"
                                                                    value="<?php echo ($vo["purchase_num"]); ?>"></div>
                                    </td>
                                    <td>g</td>
                                    <td>
                                        <div class="fublBox"><input type="number"
                                                                    oninput="if(value.length>3)value = value.slice(0,3);if(value < 0)value=0"
                                                                    class="form-control form-itmeB formNumber "
                                                                    placeholder="" name="purchase_trade_price"
                                                                    value="<?php echo ($vo["purchase_trade_price"]); ?>"></div>
                                    </td>
                                    <td>
                                        <div class="fublBox"><input type="number"
                                                                    oninput="if(value.length>3)value = value.slice(0,3);if(value < 0)value=0"
                                                                    class="form-control form-itmeB formNumber "
                                                                    placeholder="" name="purchase_prescription_price"
                                                                    value="<?php echo ($vo["purchase_prescription_price"]); ?>"></div>
                                    </td>
                                    <td class="this_purchase_trade_total_amount"><?php echo ($vo["purchase_trade_total_amount"]); ?></td>
                                    <td class="this_purchase_prescription_total_amount"><?php echo ($vo["purchase_prescription_total_amount"]); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-sm delete_info">删除</button>
                                    </td>
                                </tr><?php endforeach; endif; ?>
                            <?php else: ?>
                            <tr class="empty_box"><td colspan="11" height="30" align="center" class="f_red" >无数据</td></tr><?php endif; ?>

                        </tbody>
                    </table>
                </div>
                <div class="paging mt20 mb20 ftc">
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- 选择药品弹框 start -->
<div class="bombBox" id="addDrugsBomb" style="display: none;">
    <div class="bombContent whiteBg addDrugsBomb" style="min-width: 800px;">
        <div class="bombTit ftc">选择药品<i class="fa fa-remove"></i></div>
        <div class="pd10">
            <div class="clearfix">
                <div class="fublBox mr10"><span>药品名称：</span>
                    <input type="text" class="form-control form-itmeB" name="medicinesName" id="medicinesName"
                           placeholder="输入药品名称">
                </div>
                <div class="fublBox mr10"><span>药品分类：</span>
                    <select class="form-control form-itmeB" name="medicines_class_id">
                        <option value="">全部</option>
                        <?php if(is_array($medicines_class)): foreach($medicines_class as $key=>$vo): ?><option value="<?php echo ($vo["did"]); ?>"><?php echo ($vo["dictionary_name"]); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <table class="table drugsTable ftc mt10">
                <thead>
                <tr>
                    <th>
                        <label class="fancy-checkbox checkAllBtn">
                            <input type="checkbox">
                            <span>全选</span>
                        </label>
                    </th>
                    <th>药品编号</th>
                    <th>药品名称</th>
                    <th>规格</th>
                    <th>生产厂家</th>
                </tr>
                </thead>
                <tbody class="medicinesBox">

                </tbody>
            </table>
            <div class="clearfix">
                <div class="paging l medicines_page_box">

                </div>
                <button type="button" class="btn btn-primary btn-sm r submitMedicines">确定</button>
            </div>
        </div>
    </div>
    <div class="bombMask"></div>
</div>
<!-- 选择药品弹框 end -->
<!-- 添加供应商弹框 start -->
<div class="bombBox" id="addSupplierBomb" style="display: none;">
    <div class="bombContent whiteBg addSupplierBomb" style="min-width: 400px;">
        <div class="bombTit">批量设置<i class="fa fa-remove"></i></div>
        <div class="ftc pd10">
            <div class="ftc gray2">勾选要设置的药品后，再进行批量设置</div>
            <div class="input-group listSeaForm wb100 mt10">
				<span class="input-group-btn">
					<span class="btn">药品数量：</span>
				</span>
                <input class="form-control" type="number" name="add_numeber" value="" placeholder="输入药品数量">
            </div>
            <div class="input-group listSeaForm wb100 mt10">
				<span class="input-group-btn">
					<span class="btn">批发价：</span>
				</span>
                <input class="form-control" type="number" value="" name="add_trade_price" placeholder="批发价金额">
            </div>
            <div class="clearfix mt10">
                <div class="input-group listSeaForm l" style=" width: 70%;">
					<span class="input-group-btn">
						<span class="btn mr10">处方价：</span>
					</span>
                    <input class="form-control" type="text" value="" name="prescription" placeholder="批发价:比例或金额">
                </div>
                <div class="input-group listSeaForm l" style=" width: 30%;">
                    <select class="form-control" name="prescription_way">
                        <option value="1">+（金额）</option>
                        <option value="2">*（%比例）</option>
                    </select>
                </div>
            </div>
            <a class="btn btn-primary determine wb100 mt20">应用</a>
        </div>
    </div>
    <a>
        <div class="bombMask"></div>
    </a>
</div>
<!-- 添加供应商弹框 end -->
<!-- END MAIN -->
<script>
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $('.dateTime').datetimepicker({
        lang: 'ch',
        timepicker: false,
        format: 'Y-m-d',
        validateOnBlur: false,
        maxDate:today
    });
    $(function () {
        var _medicinesPage = 1, _medicinesPagesize = 10, _medicinesName = '', _medicines_class = '';
        var numericalOrder = '';
        gross_wholesale_amount();
        all_prescription_price();
        //选择药品弹框
        $(document).on('click', '.addDrugsBtn', function () {
            getMedicinesList(_medicinesPage, _medicinesPagesize, _medicinesName, _medicines_class);
            $('#addDrugsBomb').show();
            // 取消或者关闭
            $('#addDrugsBomb .bombMask, #addDrugsBomb .fa-remove').one('click', function (event) {
                $(this).closest('#addDrugsBomb').hide();
                $('body').removeAttr('style');
            });
        });
        //药品名称搜索
        $(document).on('input onpropertychange', 'input[name=medicinesName]', function () {
            var medicinesName_search = $(this).val();
            if (medicinesName_search.length > 0) {
                _medicinesName = medicinesName_search;
                _medicinesPage = 1;
            } else {
                _medicinesName = '';
            }
            _medicines_class = $("select[name=medicines_class_id] option:selected").val();
            getMedicinesList(_medicinesPage, _medicinesPagesize, _medicinesName, _medicines_class);
        })
        //药品分类搜索
        $(document).on('change', 'select[name=medicines_class_id]', function () {
            var medicines_class_id = $(this).find('option:selected').val();
            if (medicines_class_id) {
                _medicines_class = medicines_class_id;
                _medicinesPage = 1;
            } else {
                _medicines_class = '';
            }
            _medicinesName = $("input[name=medicinesName]").val();
            getMedicinesList(_medicinesPage, _medicinesPagesize, _medicinesName, _medicines_class);
        })
        //诊所已添加药品列表分页
        $(".medicines_page_box").on('click', '.item', function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if (tag == 'i') {
                if ($(this).hasClass('next')) {
                    _medicinesPage = parseInt(_medicinesPage) + 1;
                } else {
                    _medicinesPage = parseInt(_medicinesPage) - 1;
                }
            } else {
                _medicinesPage = parseInt($(this).html());
            }
            _medicinesName = $("input[name=medicinesName]").val();
            _medicines_class = $("select[name=medicines_class_id] option:selected").val();
            getMedicinesList(_medicinesPage, _medicinesPagesize, _medicinesName, _medicines_class);
        });

        function getMedicinesList(medicinesPage, medicinesPagesize, medicinesName, medicines_class) {
            $.post('<?php echo U("/Inventory/getMedicinesList");?>', {
                p: medicinesPage,
                pagesize: medicinesPagesize,
                medicinesName: medicinesName,
                medicines_class_id: medicines_class
            }, function (res) {
                if (res.status == 'success') {
                    if (res.data.count > 0) {
                        var str = '';
                        $.each(res.data.list, function (i, n) {
                            str += '<tr>';
                            str += '<td>';
                            str += '<label class="fancy-checkbox">';
                            str += '<input type="checkbox" name="hmr_id" value="' + n.hmr_id + '">';
                            str += '<span></span>';
                            str += '</label>';
                            str += '</td>';
                            str += '<td>' + n.medicines_number + '</td>';
                            str += '<td>' + n.medicines_name + '</td>';
                            str += '<td>' + n.conversion + n.unit + '</td>';
                            str += '<td>' + n.producter + '</td>';
                            str += '</tr> ';
                        })
                        $('.medicinesBox').html(str);
                        _medicinesPage = res.data.page;
                        if (res.data.pager_str.length > 0) {
                            $(".medicines_page_box").html(res.data.pager_str);
                        } else {
                            $(".medicines_page_box").html('');
                        }
                    } else {
                        $(".medicinesBox").html('<tr><td colspan="10" height="30" align="center" class="f_red" >无数据</td></tr>');
                        $(".medicines_page_box").html('');
                    }
                } else {
                    remindBox(res.msg);
                }
            }, 'json')
        }

        //添加药品
        //function submitMedicines() {
        $(document).on('click', '.submitMedicines', function () {
            var add_after_hmr_id = $('.addMedicinesBox tr').find("input[name=hmr_id]"), medicines_name = '', add_after_hmr_id_arr = new Array();
            var _self = $(this);
            var hmr_id_len = $(".medicinesBox input[name=hmr_id]:checked").length;
            if (hmr_id_len > 0) {
                var hmr_id_arr = new Array();
                $.each($(".medicinesBox input[name=hmr_id]:checked"), function () {
                    hmr_id_arr.push($(this).val());
                });
                $.post("<?php echo U('/Inventory/submitMedicines');?>", {hmr_id_arr: hmr_id_arr}, function (res) {
                    if (res.status == 'success') {
                        if (res.data.length > 0) {
                            var data = res.data;
                            numericalOrder = $(".addMedicinesBox tr").length > 0 ? (Number($(".addMedicinesBox tr").length)-1) : 0;
                            //循环res,data,list获取信息，与添加后列表中的hrm_id进行对比，并将名称赋值到数组中，进行提示，如果确定res,data.list信息不变，如果取消将对应信息删除
                            if ($('.addMedicinesBox tr').find("input[name=hmr_id]").length > 0) {
                                $.each(add_after_hmr_id, function () {
                                    add_after_hmr_id_arr.push($(this).val());
                                })
                                add_after_hmr_id_arr = $.unique(add_after_hmr_id_arr);
                                for (var n = 0; n < add_after_hmr_id_arr.length; n++) {
                                    for (var i = 0; i < data.length; i++) {
                                        if (add_after_hmr_id_arr[n] == data[i]['hmr_id']) {
                                            medicines_name += data[i]['medicines_name'] + ',';
                                        }
                                    }
                                }
                                medicines_name = medicines_name.substring(0, medicines_name.length - 1);
                                if (medicines_name) {
                                    if (confirm(medicines_name + '已经添加是否追加')) {

                                    } else {
                                        for (var n = 0; n < add_after_hmr_id_arr.length; n++) {
                                            for (var i = 0; i < data.length; i++) {
                                                if (add_after_hmr_id_arr[n] == data[i]['hmr_id']) {
                                                    data.splice(i, 1);
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            var str = '';
                            $.each(data, function (i, n) {
                                numericalOrder++;
                                str += '<tr>';
                                str += '<td>';
                                str += '<label class="fancy-checkbox">';
                                str += '<input type="checkbox" name="hmr_id" value="' + n.hmr_id + '" >';
                                str += '<span>' + numericalOrder + '</span>';
                                str += '</label>';
                                str += '</td>';
                                str += '<td class="medicines_name">' + n.medicines_name + '</td>';
                                str += '<td>' + n.conversion + n.unit + '</td>';
                                str += '<td>' + n.producter + '</td>';
                                str += '<td>';
                                str += '<div class="fublBox"><input type="number" oninput="if(value.length>3)value = value.slice(0,3);if(value < 0)value=0" class="form-control form-itmeB formNumber" name="purchase_num" value="0" placeholder="">';
                                str += '</div>';
                                str += '</td>';
                                str += '<td class="purchase_unit">' + n.unit + '</td>';
                                str += '<td>';
                                str += '<div class="fublBox"><input type="number" oninput="if(value.length>3)value = value.slice(0,3);if(value < 0)value=0" class="form-control form-itmeB formNumber" placeholder="" name="purchase_trade_price" value="0">';
                                str += '</div>';
                                str += '</td>';
                                str += '<td>';
                                str += '<div class="fublBox"><input type="number" oninput="if(value.length>3)value = value.slice(0,3);if(value < 0)value=0" class="form-control form-itmeB formNumber" placeholder="" name="purchase_prescription_price" value="0">';
                                str += '</div>';
                                str += '</td>';
                                str += '<td class="this_purchase_trade_total_amount">0</td>';
                                str += '<td class="this_purchase_prescription_total_amount">0</td>';
                                str += '<td>';
                                str += '<button type="button" hmr_id="' + n.hmr_id + '" class="btn btn-default btn-sm delete_info">删除</button>';
                                str += '</td>';
                                str += '</tr>';
                            })
                            $('.addMedicinesBox .empty_box').remove();
                            $(".addMedicinesBox").append(str);
                            gross_wholesale_amount();
                            all_prescription_price();
                            _self.closest('#addDrugsBomb').hide();
                            $('body').removeAttr('style');
                        } else {
                            $(".addMedicinesBox").html('<tr class="empty_box"><td colspan="10" height="30" align="center" class="f_red" >无数据</td></tr>');
                        }
                    } else {
                        remindBox(res.msg);
                    }
                }, 'json');
            } else {
                remindBox('选择药品');
            }
        })
        $('.addMedicinesBox').on('click','.delete_info',function(){
            var _self = $(this);
            _self.parent().parent().remove();
            $(".addMedicinesBox tr").each(function(i,n){
                 $(this).find('td').find('label').find('span').text((Number(i)+1));
            })
           if($(".addMedicinesBox tr").length <= 0){
               $(".addMedicinesBox").html('<tr class="empty_box"><td colspan="11" height="30" align="center" class="f_red" >无数据</td></tr>');
           }
            gross_wholesale_amount();
            all_prescription_price();
        })
        //}
        //计算批发总金额
        function gross_wholesale_amount() {
            var amount_info = $('.addMedicinesBox tr input[name="purchase_trade_price"]'), amount = 0;
            $.each(amount_info, function () {
                var price = $(this).val();
                var num = $(this).parent('div').parent('td').siblings('td').find('input[name=purchase_num]').val();
                amount += price * num;
            })
            $('.purchase_trade_total_amount').text(Number(amount).toFixed(2));
        }

        //计算处方总金额
        function all_prescription_price() {
            var amount_info = $('.addMedicinesBox tr input[name="purchase_prescription_price"]'), amount = 0;
            $.each(amount_info, function () {
                var price = $(this).val();
                var num = $(this).parent('div').parent('td').siblings('td').find('input[name=purchase_num]').val();
                amount += price * num;
            })
            $('.purchase_prescription_total_amount').text(Number(amount).toFixed(2));
        }

        //数量变化
        $(document).on("input propertychange", 'input[name=purchase_num]', function () {
            change_purchase_num($(this));
            gross_wholesale_amount();
            all_prescription_price();
        })
        function change_purchase_num(_self) {
            var num = _self.val();
            var purchase_trade_price = _self.parent('div').parent('td').siblings('td').find('input[name=purchase_trade_price]').val();
            var purchase_trade_total_amount = purchase_trade_price * num;
            _self.parent('div').parent('td').siblings('.this_purchase_trade_total_amount').text(purchase_trade_total_amount);
            var purchase_prescription_price = _self.parent('div').parent('td').siblings('td').find('input[name=purchase_prescription_price]').val();
            var purchase_prescription_total_amount = purchase_prescription_price * num;
            _self.parent('div').parent('td').siblings('.this_purchase_prescription_total_amount').text(purchase_prescription_total_amount);
        }

        //批发价变化
        $(document).on("input propertychange", 'input[name=purchase_trade_price]', function () {
            change_purchase_trade_price($(this));
            gross_wholesale_amount();
        })
        function change_purchase_trade_price(_self) {
            var purchase_trade_price = _self.val();
            var num = _self.parent('div').parent('td').siblings('td').find('input[name=purchase_num]').val();
            var purchase_trade_total_amount = Number(purchase_trade_price) * Number(num);
            _self.parent('div').parent('td').siblings('.this_purchase_trade_total_amount').text(Number(purchase_trade_total_amount).toFixed(2));
        }

        //处方价变化
        $(document).on("input propertychange", 'input[name=purchase_prescription_price]', function () {
            change_purchase_prescription_price($(this));
            all_prescription_price();
        })
        function change_purchase_prescription_price(_self) {
            var purchase_prescription_price = _self.val();
            var num = _self.parent('div').parent('td').siblings('td').find('input[name=purchase_num]').val();
            var purchase_prescription_total_amount = Number(purchase_prescription_price) * Number(num);
            _self.parent('div').parent('td').siblings('.this_purchase_prescription_total_amount').text(Number(purchase_prescription_total_amount).toFixed(2));
        }

        //批量设置,
        $(document).on('click', '.addSupplierBtn', function () {
            if ($('.addMedicinesBox input[name=hmr_id]:checked').length > 0) {
                $('#addSupplierBomb').show();
            } else {
                remindBox('勾选要设置的药品后，再进行批量设置');
                return false;
            }
            // 取消或者关闭
            $('#addSupplierBomb .bombMask, #addSupplierBomb .fa-remove').one('click', function (event) {
                $(this).closest('#addSupplierBomb').hide();
                $('body').removeAttr('style');
            });
        });
        //批量设置应用
        $(document).on('click', '.determine', function () {
            var add_numeber = $("input[name=add_numeber]").val(), add_trade_price = $("input[name=add_trade_price]").val(), prescription = $("input[name=prescription]").val(), prescription_way = $("select[name=prescription_way] option:selected").val(), prescription_price = 0;
            if (!isDigits(add_numeber)) {
                remindBox("请输入正整数");
                return false;
            }
            if (!isNumber(add_trade_price)) {
                remindBox("输入整数或者小数");
                return false;
            }
            if (!isNumber(prescription)) {
                remindBox("输入整数或者小数");
                return false;
            }
            if (prescription_way == 1) {
                prescription_price = Number(prescription) + Number(add_trade_price);
            } else if (prescription_way == 2) {
                prescription_price = (Number(add_trade_price) * ((Number(prescription) / 100)).toFixed(2));
            }

            $.each($('.addMedicinesBox input[name=hmr_id]:checked'), function () {
                $(this).parent('label').parent('td').siblings('td').find('input[name=purchase_num]').val(add_numeber);
                change_purchase_num($(this).parent('label').parent('td').siblings('td').find('input[name=purchase_num]'));
                $(this).parent('label').parent('td').siblings('td').find('input[name=purchase_trade_price]').val(add_trade_price);
                change_purchase_trade_price($(this).parent('label').parent('td').siblings('td').find('input[name=purchase_trade_price]'));
                $(this).parent('label').parent('td').siblings('td').find('input[name=purchase_prescription_price]').val(prescription_price);
                change_purchase_prescription_price($(this).parent('label').parent('td').siblings('td').find('input[name=purchase_prescription_price]'));
            })
            gross_wholesale_amount();
            all_prescription_price();
            $(this).closest('#addSupplierBomb').fadeOut();
            $('body').removeAttr('style');
        })
        //清空数值
        $(document).on('click', '.empty_the_numerical', function () {
            if ($('.addMedicinesBox input[name=hmr_id]').length > 0) {
                $("input[name=purchase_num]").val(0);
                $("input[name=purchase_trade_price]").val(0);
                $("input[name=purchase_prescription_price]").val(0);
                $(".this_purchase_trade_total_amount").text(0);
                $(".this_purchase_prescription_total_amount").text(0);
                $('.purchase_trade_total_amount').text(0);
                $('.purchase_prescription_total_amount').text(0);
            }
        })
        //全选
        $(document).on('click', '.checkAllBtn', function (e) {
            if ($(e.target).is('input')) {
                return;
            }
            if ($(this).find('input').is(':checked')) {
                $(this).closest('table').find('tbody input[type="checkbox"]').click().attr('checked', false);
            } else {
                $(this).closest('table').find('tbody input[type="checkbox"]').click().attr('checked', true);
            }
        });
        $(document).on('click', '.review_warehousing', function () {
            var _self = $(this), hmr_id_arr = [], hmr_id = $('.addMedicinesBox input[name=hmr_id]'), purchase_num_arr = [], purchase_num = $(".addMedicinesBox input[name=purchase_num]"), purchase_trade_price_arr = [], purchase_trade_price = $(".addMedicinesBox input[name=purchase_trade_price]"), purchase_prescription_price_arr = [], purchase_prescription_price = $(".addMedicinesBox input[name=purchase_prescription_price]"), purchase_unit_arr = [];
            var n = 0;
            $.each(hmr_id, function () {
                if (!$(this).val()) {
                    remindBox($(this).parent('label').parent('td').siblings('.medicines_name').text() + '发生错误，无法提交');
                    n = 1;
                    return false;
                }
                hmr_id_arr.push($(this).val());
            })
            if (n == 1) {
                return false;
            }
            var p = 0;
            $.each(purchase_num, function () {
                var medicines_name = $(this).parent('div').parent('td').siblings('.medicines_name').text();
                if ($(this).val() == 0) {
                    remindBox(medicines_name + '数量不能为空');
                    p = 1;
                    return false;
                }
                if (!isNumber($(this).val())) {
                    remindBox(medicines_name + '必须为整数或小数');
                    p = 1;
                    return false;
                }
                purchase_num_arr.push($(this).val());
            })
            if (p == 1) {
                return false;
            }
            var tr = 0;
            $.each(purchase_trade_price, function () {
                var medicines_name = $(this).parent('div').parent('td').siblings('.medicines_name').text();
                if ($(this).val() == 0) {
                    remindBox(medicines_name + '批发价不能为空');
                    tr = 1;
                    return false;
                }
                if (!isNumber($(this).val())) {
                    remindBox(medicines_name + '批发价必须为整数或小数');
                    tr = 1;
                    return false;
                }
                purchase_trade_price_arr.push($(this).val());
            })
            if (tr == 1) {
                return false;
            }
            var pr = 0;
            $.each(purchase_prescription_price, function () {
                var medicines_name = $(this).parent('div').parent('td').siblings('.medicines_name').text();
                purchase_unit_arr.push($(this).parent('div').parent('td').siblings('.purchase_unit').text());
                if ($(this).val() == 0) {
                    remindBox(medicines_name + '处方价不能为空');
                    pr = 1;
                    return false;
                }
                if (!isNumber($(this).val())) {
                    remindBox(medicines_name + '处方价必须为整数或小数');
                    pr = 1;
                    return false;
                }
                purchase_prescription_price_arr.push($(this).val());
            })
            if (pr == 1) {
                return false;
            }
            var supplier_id = $("select[name=supplier_id] option:selected").val();
            if (!supplier_id) {
                remindBox('供应商不能为空');
                return false;
            }
            var batches_of_inventory_date = $("input[name=batches_of_inventory_date]").val();
            if (!batches_of_inventory_date) {
                remindBox('制单日期不能为空');
                return false;
            }
            var status = _self.attr('status');
            $.post('<?php echo U("/Inventory/submit_purchasing_information");?>/status/' + status, {
                hmr_id: hmr_id_arr,
                purchase_num: purchase_num_arr,
                purchase_trade_price: purchase_trade_price_arr,
                purchase_prescription_price: purchase_prescription_price_arr,
                supplier_id: supplier_id,
                batches_of_inventory_date: batches_of_inventory_date,
                purchase_unit: purchase_unit_arr
            }, function (res) {
                if(res.status == 'success'){
                    window.location=res.data;
                }
            }, 'json');
        })
    })
</script>
<!-- END WRAPPER -->

<script type="text/javascript">
    if(parent.endLoad){
        parent.endLoad();
    }
</script>
</body>
</html>