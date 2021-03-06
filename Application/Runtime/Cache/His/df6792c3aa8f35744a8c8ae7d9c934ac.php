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
            <div class="pd10 panel mb20">
                <div class="fublBox mr10"><span>挂号类别：</span>
                    <input type="text" class="form-control form-itmeB" name="search" placeholder="">
                </div>
                <button type="button" class="btn btn-primary search">查询</button>
                <button type="button" class="btn btn-primary r chargeAddBtn">新增</button>
            </div>
            <div class="panel">
                <div class="pd10">
                    <table class="table drugsTable ftc">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>挂号类型</th>
                            <th>子费用项</th>
                            <th>金额（元）</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody class="registeredfee_box">

                        </tbody>
                    </table>
                </div>
                <div class="paging mt20 mb20 ftc registeredfee_page">
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<!-- 添加费用弹框 start -->
<div class="bombBox" id="chargeBomb" style="display: none;">
    <div class="bombContent chargeBomb whiteBg">
        <div class="bombTit">添加挂号类型<i class="fa fa-remove"></i></div>
        <div class="ftc pd10">
            <div class="clearfix">
                <div class="input-group listSeaForm l" style="width: 49%; margin-right: 2%;">
					<span class="input-group-btn">
						<span class="btn">费用名称：</span>
					</span>
                    <input type="hidden" name="reg_id" value="">
                    <input class="form-control" type="text" name="registeredfee_name" value="" placeholder="">
                </div>
                <div class="input-group listSeaForm l" style="width: 49%;">
					<span class="input-group-btn">
						<span class="btn">金额：</span>
					</span>
                    <input class="form-control" type="text" name="registeredfee_fee" value="" placeholder="">
                </div>
            </div>
            <a class="btn btn-default determine wb100 mt10 btn-sm addChargeBtn"><i class="fa fa-plus mr10"></i>添加子费用</a>
            <ul class="chargeChildBox" style="min-height:66px;max-height: 200px; overflow-y: auto;">
            </ul>
            <a class="btn btn-primary determine wb100 mt20 btn_RegisteredFee">保存</a>
        </div>
    </div>
    <a>
        <div class="bombMask"></div>
    </a>
</div>
<!-- 添加费用弹框 end -->
<script>
    var _RegisteredfeePage = 1, pagesize = 10, search = '';
    var s;
    $(function () {
        getRegisteredFeeList(_RegisteredfeePage, pagesize, search);
        $(document).on('click', '.chargeAddBtn', function () {
            var _self = $(this);
            $('#chargeBomb').show();
            var reg_id = _self.attr('reg_id');
            if (reg_id) {
                CostBounced(reg_id);
            }
            // 取消或者关闭
            $('#chargeBomb .bombMask, #chargeBomb .fa-remove').one('click', function (event) {
                $(this).closest('#chargeBomb').hide();
                $('body').removeAttr('style');
            });
            addChargeBtn();
        });
        //选项卡切换
        $(document).on('click', '.tabBtn > li', function () {
            $(this).addClass('on').siblings('li').removeClass('on').closest('.tabBtn');
            $(this).closest('.tabBtn').siblings('.tabBox').find('> li').eq($(this).index()).addClass('on').siblings('li').removeClass('on');
        });
        //添加子费用
        function addChargeBtn() {
            //添加子费用
            $('.addChargeBtn').on('click', function () {
                var registeredfee_name = $("input[name=registeredfee_name]").val();
                if (registeredfee_name.length == 0 || registeredfee_name.length < 0) {
                    remindBox('费用名称不能为空');
                    return false;
                }
                var registeredfee_fee = $("input[name=registeredfee_fee]").val();
                if (registeredfee_fee.length == 0 || registeredfee_fee.length < 0) {
                    remindBox('费用名称不能为空');
                    return false;
                }
                if (!$.isNumeric(registeredfee_fee)) {
                    remindBox('填写正确的金额');
                    return false;
                }
                if ($('.chargeChildBox li').length > 0) {
                    var sub_name = $('.chargeChildBox li:last').find('input[name="sub_registeredfee_name"]').val();
                    var sub_fee = $('.chargeChildBox li:last').find('input[name="sub_registeredfee_fee"]').val();
                    if (sub_name.length == 0 || sub_name.length < 0) {
                        remindBox('子费用名称没有填写');
                        return false;
                    }
                    if (sub_fee.length == 0 || sub_fee.length < 0) {
                        remindBox('子费用金额没有填写');
                        return false;
                    }
                    if (!$.isNumeric(sub_fee)) {
                        remindBox('填写正确的金额');
                        return false;
                    }
                }
                $(this).siblings('.chargeChildBox').append('<li class="mt10 clearfix">\
				<div class="input-group listSeaForm l" style="width: 49%; margin-right: 2%;">\
					<span class="input-group-btn">\
						<span class="btn">子费用名称：</span>\
					</span>\
					<input type="hidden" name="reg_sub_id" value="">\
					<input class="form-control" type="text" value="" name="sub_registeredfee_name"  placeholder="">\
				</div>\
				<div class="input-group listSeaForm l" style="width: 49%;">\
					<span class="input-group-btn">\
						<span class="btn">金额：</span>\
					</span>\
					<input class="form-control" type="text" value="" name="sub_registeredfee_fee" placeholder="">\
					<span class="input-group-btn bc" style="padding:0 8px">\
						<span class="btn deleteChildBtn"><span class="fa fa-trash"></span></span>\
					</span>\
				</div>\
			</li>');
                deleteChildBtn();
            });
            add_RegisteredFee();
        }

        //删除子费用
        function deleteChildBtn() {
            //删除子费用
            $(document).on('click', '.deleteChildBtn', function () {
                $(this).closest('li').remove();
            });
        }

        //获取挂号费用列表
        function getRegisteredFeeList(RegisteredfeePage, pagesize, search) {
            $.post('<?php echo U("/Registeredfee/getRegisteredFeeList");?>', {
                p: RegisteredfeePage,
                pagesize: pagesize,
                search: search
            }, function (res) {
                if (res.status == 'success') {
                    if (res.data.count > 0) {
                        var str = '';
                        $.each(res.data.list, function (i, n) {
                            str += '<tr>';
                            str += '<td>' + n.reg_id + '</td>';
                            if (n.registeredfee_names) {
                                str += '<td>' + n.registeredfee_names + '</td>';
                            } else {
                                str += '<td>' + n.registeredfee_name + '</td>';
                            }
                            str += '<td>' + n.numberofsub + '</td>';
                            str += '<td>' + n.registeredfee_aggregate_amount + '</td>';
                            str += '<td><button type="button" reg_id="' + n.reg_id + '" class="btn btn-primary btn-sm mr10 chargeAddBtn editRegisteredfee">编辑</button><button type="button" reg_id="' + n.reg_id + '" class="btn btn-default btn-sm returnBtn">删除</button></td>';
                            str += '</tr>';
                        })
                        _RegisteredfeePage = res.data.page;
                        $('.registeredfee_box').html(str);
                        if (res.data.pager_str.length > 0) {
                            $(".registeredfee_page").html(res.data.pager_str);
                        } else {
                            $(".registeredfee_page").html('');
                        }
                    } else {
                        $(".registeredfee_box").html('<tr><td colspan="7" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $(".registeredfee_page").html('');
                    }
                } else {
                    remindBox(res.msg);
                }
            }, 'json')
        }

        //搜索
        $(document).on('click', '.search', function () {
            search = $("input[name=search]").val() ? $("input[name=search]").val() : '';
            if (search) {
                _RegisteredfeePage = 1
            }
            getRegisteredFeeList(_RegisteredfeePage, pagesize, search);
        })
        //分页
        $(document).on('click', '.item', function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if (tag == 'i') {
                if ($(this).hasClass('next')) {
                    _RegisteredfeePage = parseInt(_RegisteredfeePage) + 1;
                } else {
                    _RegisteredfeePage = parseInt(_RegisteredfeePage) - 1;
                }
            } else {
                _RegisteredfeePage = parseInt($(this).html());
            }
            search = $("input[name=search]").val() ? $("input[name=search]").val() : '';
            if (search) {
                _RegisteredfeePage = 1;
            }
            getRegisteredFeeList(_RegisteredfeePage, pagesize, search);
        })

        //提交挂号费用
        function add_RegisteredFee() {
            $(document).on('click', '.btn_RegisteredFee', function () {
                var _self = $(this);
                var reg_id = $("input[name=reg_id]").val();
                var registeredfee_name = $("input[name=registeredfee_name]").val();
                if (registeredfee_name.length == 0 || registeredfee_name.length < 0) {
                    remindBox('费用名称不能为空');
                    return false;
                }

                var registeredfee_fee = $("input[name=registeredfee_fee]").val();
                if (registeredfee_fee.length == 0 || registeredfee_fee.length < 0) {
                    remindBox('费用不能为空');
                    return false;
                }
                var parnt = /^([1-9]\d*(\.\d*[1-9])?)|(0\.\d*[1-9])$/;
                if(!parnt.exec(registeredfee_fee)){
                    remindBox("金额不能小于0");return false;
                }
                if (!$.isNumeric(registeredfee_fee)) {
                    remindBox('填写正确的金额');
                    return false;
                }
                var sub_name = $("input[name=sub_registeredfee_name]");
                var subNameArr = new Array();
                var sub_name_result = true;
                $.each(sub_name, function () {
                    if ($(this).val().length > 0) {
                        subNameArr.push($(this).val());
                    } else {
                        remindBox('子费用名称没有填写');
                        sub_name_result = false;
                        return false;
                    }
                })
                if (!sub_name_result) {
                    return false;
                }
                var sub_fee = $("input[name=sub_registeredfee_fee]");
                var subFeeArr = new Array();
                var sub_fee_result = true;
                $.each(sub_fee, function () {
                    if ($(this).val().length > 0) {
                        if(!parnt.exec($(this).val())){
                            remindBox("子费用金额不能小于0");
                            sub_fee_result = false;
                            return false;
                        }
                        if (!$.isNumeric($(this).val())) {
                            remindBox('子费用填写正确的金额');
                            sub_fee_result = false;
                            return false;
                        }
                        subFeeArr.push($(this).val());
                    } else {
                        remindBox('子费用金额没有填写');
                        sub_fee_result = false;
                        return false;
                    }
                })
                if (!sub_fee_result) {
                    return false;
                }
                if (subFeeArr.length != subNameArr.length) {
                    remindBox('子费用数量不一致');
                    return false;
                }
                //存在为编辑，不存在为添加
                if (reg_id) {
                    var regSubIdArr = new Array();
                    var reg_sub_id = $('input[name=reg_sub_id]');
                    var reg_sub_id_result = true;
                    $.each(reg_sub_id, function () {
                        if ($(this).val().length > 0) {
                            regSubIdArr.push($(this).val());
                        }
                    })
                    $.post("<?php echo U('/Registeredfee/Registeredfee_edit');?>", {
                        reg_id: reg_id,
                        registeredfee_name: registeredfee_name,
                        registeredfee_fee: registeredfee_fee,
                        reg_sub_id: regSubIdArr,
                        sub_registeredfee_name: subNameArr,
                        sub_registeredfee_fee: subFeeArr
                    }, function (res) {

                        if (res.status == 'success') {
                            location.reload();
                        } else {
                            remindBox(res.msg);
                        }
                    }, 'json')
                } else {
                    // ajax post 提交
                    $.post("<?php echo U('/Registeredfee/Registeredfee_add');?>", {
                        registeredfee_name: registeredfee_name,
                        registeredfee_fee: registeredfee_fee,
                        sub_registeredfee_name: subNameArr,
                        sub_registeredfee_fee: subFeeArr
                    }, function (res) {
                        if (res.status == 'success') {
                            location.reload();
                        } else {
                            remindBox(res.msg);
                        }
                    }, 'json')
                }
            })
        }

        //费用弹框赋值
        function CostBounced(reg_id) {
            $.post('<?php echo U("/Registeredfee/getRegisteredfeeInfoByReg_id");?>', {reg_id: reg_id}, function (res) {
                if (res.status == 'success') {
                    $('.chargeChildBox').html('');
                    $("input[name=reg_id]").val(res.data.reg_id);
                    $("input[name=registeredfee_name]").val(res.data.registeredfee_name);
                    $("input[name=registeredfee_fee]").val(res.data.registeredfee_fee);
                    if (res.data.sub_info.length > 0) {
                        var str = '';
                        $.each(res.data.sub_info, function (i, n) {
                            str += '<li class="mt10 clearfix"><div class="input-group listSeaForm l" style="width: 49%; margin-right: 2%;"><span class="input-group-btn"><span class="btn">子费用名称：</span></span>';
                            str += '<input type="hidden" name="reg_sub_id" value="' + n.reg_sub_id + '">';
                            str += '<input class="form-control" type="text" name="sub_registeredfee_name" value="' + n.sub_registeredfee_name + '" placeholder="">';
                            str += '</div><div class="input-group listSeaForm l" style="width: 49%;"><span class="input-group-btn"><span class="btn">金额：</span></span>';
                            str += '<input class="form-control" type="text" value="' + n.sub_registeredfee_fee + '" name="sub_registeredfee_fee" placeholder="">';
                            str += '<span class="input-group-btn bc" style="padding:0 8px"><span class="btn deleteChildBtn"><span class="fa fa-trash"></span></span></span></div></li>';
                        })
                        $('.chargeChildBox').html(str);
                        deleteChildBtn()
                    }
                } else {
                    remindBox(res.msg);
                }
            }, 'json')
        }

        //删除挂号费用
        $(document).on('click', '.returnBtn', function () {
            var _self = $(this), reg_id = _self.attr('reg_id');
            promptBox('确认删除吗？', function () {
                $.post("<?php echo U('/Registeredfee/Registeredfee_delete');?>", {reg_id: reg_id}, function (res) {
                    if (res.status == 'success') {
                        location.reload();
                    } else {
                        remindBox(res.msg);
                    }
                }, 'json')
            });

        })

    });
</script>
<!-- END WRAPPER -->

<script type="text/javascript">
    if(parent.endLoad){
        parent.endLoad();
    }
</script>
</body>
</html>