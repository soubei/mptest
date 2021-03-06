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
            <div class="panel pd10 mb20 clearfix"><span class="gray2 mr20">挂号编号：<i class="registration_number"><?php echo ($registration_number); ?></i></span><span
                    class="gray2">挂号员：<i><?php echo ($operator_name); ?></i></span>
                <div class="fublBox r"><span class="mr20 amount">应收：<i>0.00</i>元</span>
                    <button type="button" class="btn btn-warning btn4 moneyAdd">收费</button>
                </div>
            </div>
            <div class="panel panel-profile">
                <div class="clearfix">
                    <!-- LEFT COLUMN -->
                    <div class="profile-left">
                        <!-- PROFILE DETAIL -->
                        <div class="profile-detail">
                            <div class="profile-info">
                                <h4 class="heading blue">患者信息</h4>
                                <ul class="list-unstyled list-justify">
                                    <li class="clearfix">
                                        <div class="input-group listSeaForm l " style=" width: 50%;">
											<span class="input-group-btn">
												<span class="btn">姓名：</span>
											</span>
                                            <input type="text" class="form-control form-itmeB" maxlength="10" name="name" placeholder="" onkeyup="value=value.replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,'')"
                                                   onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\a-zA-Z\u4E00-\u9FA5]/g,''))">
                                            <i class="fa fa-user patientAdd"></i>
                                        </div>
                                        <div class="input-group listSeaForm r" style=" width: 30%;">
											<span class="input-group-btn">
												<span class="btn">性别：</span>
											</span>
                                            <select class="form-control form-itmeB" name="sex">
                                                <option value="1">男</option>
                                                <option value="2">女</option>
                                            </select>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <div class="input-group listSeaForm l" style=" width: 50%;">
											<span class="input-group-btn">
												<span class="btn">生日：</span>
											</span>
                                            <input type="text" class="form-control form-itmeB" name="birthday" id="birthday"placeholder="">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="fublBox r" style="padding-right: 15px;"><span id="age_label"></span></div>
                                    </li>
                                    <li>
                                        <div class="input-group listSeaForm">
											<span class="input-group-btn">
												<span class="btn">手机：</span>
											</span>
                                            <input type="text" class="form-control form-itmeB" name="mobile" placeholder="" onkeyup="this.value=this.value.replace(/\D/g,'')"
                                                   onafterpaste="this.value=this.value.replace(/\D/g,'')">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="input-group listSeaForm">
											<span class="input-group-btn">
												<span class="btn">身份证：</span>
											</span>
                                            <input type="text" class="form-control form-itmeB" name="id_card" placeholder="" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')" maxlength="18">
                                        </div>
                                    </li>
                                    <li><span>住址：</span>
                                        <textarea class="form-control mb20" rows="2" maxlength="500" name="address" placeholder="填写本次诊断详情（限500字）"></textarea>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END PROFILE DETAIL -->
                    </div>
                    <!-- END LEFT COLUMN -->
                    <!-- RIGHT COLUMN -->
                    <div class="profile-right" style="min-height: 500px;">
                        <div class="">
                            <div class="fublBox mr10 mb10"><span>科室：</span>
                                <select class="form-control form-itmeB" name="department_id">
                                    <option value="">全部科室</option>
                                    <?php if(is_array($department_info)): foreach($department_info as $key=>$vo): ?><option value="<?php echo ($vo["did"]); ?>"><?php echo ($vo["department_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="fublBox mr10 mb10"><span>医生：</span>
                                <select class="form-control form-itmeB" name="physicianid">
                                    <option value="">全部医生</option>
                                    <?php if(is_array($doctor_info)): foreach($doctor_info as $key=>$vo): ?><option value="<?php echo ($vo["uid"]); ?>"><?php echo ($vo["user_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="fublBox mr10 mb10"><span>挂号类别：</span>
                                <select class="form-control form-itmeB" name="registeredfee_id">
                                    <option value="">全部号</option>
                                    <?php if(is_array($registeredfee_info)): foreach($registeredfee_info as $key=>$vo): ?><option value="<?php echo ($vo["reg_id"]); ?>"><?php echo ($vo["registeredfee_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                            <div class="fublBox mr10 mb10">
                                <span>挂号日期：</span>
                                <input type="text" class="form-control form-itmeB dateTime startTime" placeholder=""
                                       name="dates"><i class="fa fa-calendar"></i>
                            </div>
                            <div class="fublBox mb10 mr10"><span>时间：</span>
                                <select class="form-control form-itmeB" name="subsection_type">
                                    <option value="">全部</option>
                                    <option value="1"

                                    >上午
                                    </option>
                                    <option value="2"

                                    >下午
                                    </option>
                                    <option value="3"

                                    >晚上
                                    </option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-primary mb10 search">查询</button>
                        </div>
                        <div class="">
                            <table class="table ftc">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>日期</th>
                                    <th>时间</th>
                                    <th>科室名称</th>
                                    <th>医生姓名</th>
                                    <th>挂号类型</th>
                                    <th>挂号费</th>
                                </tr>
                                </thead>
                                <tbody class="scheduling_box">
                                <!--排班列表-->
                                </tbody>
                            </table>
                            <div class="paging ftc mt10 scheduling_page"></div>
                        </div>
                    </div>
                    <!-- END RIGHT COLUMN -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->
<!--选择患者弹框 start-->
<div class="bombBox" id="patientBomb" style="display: none;">
    <div class="bombContent whiteBg patientBomb">
        <div class="bombTit ftc">选择患者<i class="fa fa-remove"></i></div>
        <ul class="pd20">
            <li style="width:500px; height: 420px">
                <div class="input-group drugSeach mb10">
					<span class="input-group-btn">
						<button class="btn btn-primary patient_search" type="button">搜索</button>
					</span>
                    <input class="form-control" type="text" name="search" placeholder="患者姓名" value="">
                </div>
                <div style="height: 320px; overflow-y: auto;">
                    <table class="table mt10">
                        <thead>
                        <tr>
                            <th></th>
                            <th>患者姓名</th>
                            <th>性别</th>
                            <th>年龄</th>
                            <th>电话</th>
                            <th>更新日期</th>
                        </tr>
                        </thead>
                        <tbody class="patient_box">
                        <!--患者列表-->
                        </tbody>
                    </table>
                </div>
                <div class="mt20">
                    <div class="paging l mt10 patient_page">
                    </div>
                    <button type="button" class="btn btn-primary r SelectedPatients">确认</button>
                </div>
            </li>
        </ul>
    </div>
    <div class="bombMask"></div>
</div>
<!--选择患者弹框 end-->
<!--收费弹框 start-->
<div class="bombBox" id="moneyBomb" style="display: none;">
    <div class="tableContent whiteBg moneyBomb" style=" width: 560px; height: 450px;">
        <div class="bombTit">收费信息<i class="fa fa-remove"></i></div>
        <div class="pd20">
            <ul class="list-unstyled list-justify Fee-Based" style=" max-height: 180px; overflow-y: auto;">

            </ul>

            <div class="sPaymentBox ftc">
                <div class="green ftl">应收 <span class="r"><i>0.00</i>元</span></div>
                <div class="tit1 bcb ftl mt10 mb10">支付方式</div>
                <table align="center" width="90%">
                    <tr>
                        <td width="50%">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="" value="0.00" id="pay_cash"
                                           style="float: right;"/>
                                    <label for="pay_cash" style="float: left;">现金支付:</label>
                                </div>
                                <div class="form-group" style="margin: 8px 0;">
                                    <input type="text" class="form-control" placeholder="" value="0.00"
                                           id="pay_ol_input"
                                           style="float: right;"/>
                                    <label for="pay_ol_input" style="float: left;">在线支付:</label>
                                </div>

                                <button type="button" class="btn btn-default btn-sm" title="更新现金和在线支付金额分配"
                                        id="btn_change_ol_amount">更新
                                </button>

                            </form>
                            <div style="width: 100%;margin-top:10px;font-weight: bold;">
                                在线支付到账:<span id="pay_ol"
                                             style="color: #FF0000;font-size: 16px;font-weight: bold;">0.00</span><br/>
                                在线支付类型:<span id="pay_ol_type"
                                             style="color: #FF0000;font-size: 16px;font-weight: bold;"></span>
                            </div>
                        </td>
                        <td width="50%">
                            <img src="/Public/his/img/load_icon.gif" id="pay_qr_img"/>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="bottomPageBox">
            <button type="button" class="btn btn-primary wb100" id="btn_save_pay">收费</button>
        </div>
    </div>
    <div class="bombMask"></div>
</div>

<!--收费弹框 end-->
<input type="hidden" name="_list_page" value="">
<script src="/Public/his/vendor/layer/layer.js"></script>
<script>
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $('.dateTime').datetimepicker({
        lang: 'ch',
        timepicker: false,
        format: 'Y-m-d',
        validateOnBlur: false,
    });
    var my_layer,is_iframe = self != top ? true : false;;
    if (is_iframe) {
        my_layer = parent.layer;
    } else {
        my_layer = layer;
    }
    function refund_back() {
        window.location.reload();
        layer.close(layer_idx);
    }
    //排班信息需要参数
    var _list_page = $("input[name='_list_page']").val() ? $("input[name='_list_page']").val() : 1, scheduling_page = 10;
    var department_id = $("select[name=department_id] option:selected").val() ? $("select[name=department_id] option:selected").val() : '';
    var physicianid = $("select[name=physicianid] option:selected").val() ? $("select[name=physicianid] option:selected").val() : '';
    var registeredfee_id = $("select[name=registeredfee_id] option:selected").val() ? $("select[name=registeredfee_id] option:selected").val() : '';
    var subsection_type = $("select[name=subsection_type] option:selected").val() ? $("select[name=subsection_type] option:selected").val() : '';
    var dates = $("input[name=dates]").val() ? $("input[name=dates]").val() : '';
    //患者所需信息
    var _patient_page = 1, pagesize = 10, search = '';
    //收费总金额
    var registration_amounts = $('.green').find('span').find('i').text() ? $('.green').find('span').find('i').text() : 0;
    var pkg_id = 0, stopPayStatus = 0, pkg_status = 0;
    var submit_status = true;
    $(function () {
        //初始化排班信息
        getSchedulingList(_list_page, scheduling_page, department_id, physicianid, registeredfee_id, subsection_type, dates);
        //排班信息搜索
        $(document).on('click', '.search', function () {
            department_id = $("select[name=department_id] option:selected").val() ? $("select[name=department_id] option:selected").val() : '';
            physicianid = $("select[name=physicianid] option:selected").val() ? $("select[name=physicianid] option:selected").val() : '';
            registeredfee_id = $("select[name=registeredfee_id] option:selected").val() ? $("select[name=registeredfee_id] option:selected").val() : '';
            subsection_type = $("select[name=subsection_type] option:selected").val() ? $("select[name=subsection_type] option:selected").val() : '';
            dates = $("input[name=dates]").val() ? $("input[name=dates]").val() : '';
            if (department_id || physicianid || registeredfee_id || subsection_type || dates) {
                _list_page = 1;
            }
            getSchedulingList(_list_page, scheduling_page, department_id, physicianid, registeredfee_id, subsection_type, dates);
        })
        //排班信息分页
        $('.scheduling_page').on('click', '.item', function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if (tag == 'i') {
                if ($(this).hasClass('next')) {
                    _list_page = parseInt(_list_page) + 1;
                } else {
                    _list_page = parseInt(_list_page) - 1;
                }
            } else {
                _list_page = parseInt($(this).html());
            }
            getSchedulingList(_list_page, scheduling_page, department_id, physicianid, registeredfee_id, subsection_type, dates);
        })
        //获取医生排班列表信息
        function getSchedulingList(page, scheduling_page, department_id, physicianid, registeredfee_id, subsection_type, dates) {
            $.post('<?php echo U("/Registration/getSchedulingList");?>', {
                p: page,
                pagesize: scheduling_page,
                department_id: department_id,
                physicianid: physicianid,
                registeredfee_id: registeredfee_id,
                subsection_type: subsection_type,
                dates: dates
            }, function (res) {
                var str = '';
                if (res.status == 'success') {
                    var data = res.data.list;
                    $.each(data, function (i, t) {
                        str += '<tr><td><label class="fancy-checkbox">';
                        str += '<input type="hidden" name="scheduling_subsection_id" value="' + t.scheduling_subsection_id + '">';
                        str += '<input type="hidden" name="scheduling_week_id" value="' + t.scheduling_week_id + '">';
                        str += '<input type="checkbox" name="scheduling_id" value="' + t.scheduling_id + '"><span></span></label></td>';
                        str += '<td>' + t.date + '</td>';
                        if (t.subsection_type == 1) {
                            str += '<td>上午</td>';
                        } else if (t.subsection_type == 2) {
                            str += '<td>下午</td>';
                        } else if (t.subsection_type == 3) {
                            str += '<td>晚上</td>';
                        }
                        str += '<td>' + t.department_name + '</td>';
                        str += '<td>' + t.user_name + '</td>';
                        str += '<td>' + t.registeredfee_name + '</td>';
                        str += '<td>' + t.registeredfee_aggregate_amount + '</td>';
                        str += '</tr>';
                    })
                    $('.scheduling_box').html(str);
                    _list_page = res.data.page;
                    if (res.data.dates) {
                        $("input[name=dates]").val(res.data.dates);
                    }
                    if (res.data.department_id) {
                        $("select[name=department_id]").find("option[value=" + res.data.department_id + "]").attr('selected', true);
                    }
                    if (res.data.physicianid) {
                        $("select[name=physicianid]").find("option[value=" + res.data.physicianid + "]").attr('selected', true);
                    }
                    if (res.data.registeredfee_id) {
                        $("select[name=registeredfee_id]").find("option[value=" + res.data.registeredfee_id + "]").attr('selected', true);
                    }
                    if (res.data.subsection_type) {
                        $("select[name=subsection_type]").find("option[value=" + res.data.subsection_type + "]").attr('selected', true);
                    }
                    if (res.data.page.length > 0) {
                        $('.scheduling_page').html(res.data.pager_str);
                    } else {
                        $('.scheduling_page').html('');
                    }
                    ChoiceList();
                } else {
                    $(".scheduling_box").html('<tr><td colspan="6" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                    $('.scheduling_page').html('');
                }
            })
        }

        //排班列表单选
        function ChoiceList() {
            $('.scheduling_box tr').each(function () {
                var _self = $(this);
                $(this).find(':checkbox[name=scheduling_id]').click(function () {
                    if ($(this).is(':checked')) {
                        $(this).attr('checked', true);
                        _self.siblings('tr').find(':checkbox[name=scheduling_id]').attr('checked', false);
                        var amount = _self.find('td:last-child').text();
                        $('.amount').find('i').text(amount);
                    } else {
                        $(this).attr('checked', false);
                        _self.siblings('tr').find(':checkbox[name=scheduling_id]').attr('checked', false);
                        $('.amount').find('i').text('0.00');
                    }
                })
            })
        }
        $("input[name=mobile]").bind('input propertychange', function() {
            var kw = $(this).val();
            if(kw.length==11){
                searchPatientByMobile(kw)
            }
        });
        //用手机号获取患者信息
        function searchPatientByMobile(m) {
            $.post('/Doctor/searchPatientByMobile',{m:m},function (res) {
                if(res.status==0){
                    var o=res.data;
                    $("input[name=name]").val(o.name);
                    $("input[name=birthday]").val(o.birthday);
                    $('input[name=id_card]').val(o.allergy_info);
                    $("input[name=mobile]").val(o.mobile);
                    if (o.sex == 1) {
                        $("select[name='sex']").find("option[value='1']").attr('selected', true);
                    } else {
                        $("select[name='sex']").find("option[value='2']").attr('selected', true);
                    }
                    $("textarea[name=address]").val(o.address);
                }else{

                }
            });
        }
        //选项卡切换
        $(document).on('click', '.tabBtn > li', function () {
            $(this).addClass('on').siblings('li').removeClass('on').closest('.tabBtn');
            $(this).closest('.tabBtn').siblings('.tabBox').find('> li').eq($(this).index()).addClass('on').siblings('li').removeClass('on');
        });
        //收费
            //收费弹框
            $(document).on('click', '.moneyAdd', function () {
                if(submit_status){
                    var len = $("input[name='scheduling_id']:checked").length;
                    if (len == 0 || len < 0) {
                        remindBox('选择一个挂号信息');
                        return false;
                    }
                    var scheduling_parm = $("input[name='scheduling_id']:checked");
                    var scheduling_id = scheduling_parm.val();
                    var scheduling_week_id = scheduling_parm.siblings('input[name=scheduling_week_id]').val();
                    var scheduling_subsection_id = scheduling_parm.siblings('input[name=scheduling_subsection_id]').val();
                    if (!scheduling_id && !scheduling_week_id && !scheduling_subsection_id) {
                        remindBox('选择一个挂号信息');
                        return false;
                    }
                    var name = $("input[name=name]").val();
                    if(!isChinese(name)){remindBox('姓名必须是汉字');return false;}
                    if (name.length == 0 || name.length < 0) {
                        remindBox('填写名字');
                        return false;
                    }
                    var birthday = $("input[name=birthday]").val();
                    var id_card = $('input[name=id_card]').val();
                    if (id_card.length > 0) {
                        var pass = IdentityCodeValid(id_card);
                        if (!pass) {
                            return false;
                        }
                    }
                    var mobile = $("input[name=mobile]").val();
                    var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                    if (mobile.length == 0) {
                        remindBox('手机号不能为空');
                        return false;
                    } else if (mobile.length != 11) {
                        remindBox('请输入有效的手机号码！');
                        return false;
                    } else if (!myreg.test(mobile)) {
                        remindBox('请输入有效的手机号码！');
                        return false;
                    }
                    var sex = $("select[name=sex]:selected").val();
                    var address = $("textarea[name=address]").val();
                    var registration_number = $('.registration_number').text();
                    if (registration_number == 0 || registration_number < 0) {
                        remindBox('编号失误');
                        return false;
                    }
                    var registration_amount = $('.amount i').text();
                    if (registration_amount == 0 || registration_amount < 0) {
                        remindBox('金额失误');
                        return false;
                    }
                    $.post("<?php echo U('/Registration/Registration_add');?>", {
                        name: name,
                        sex: sex,
                        birthday: birthday,
                        mobile: mobile,
                        id_card: id_card,
                        address: address,
                        scheduling_id: scheduling_id,
                        scheduling_week_id: scheduling_week_id,
                        scheduling_subsection_id: scheduling_subsection_id,
                        registration_number: registration_number,
                        registration_amount: registration_amount
                    }, function (res) {
                        if (res.status == 'success') {
                            submit_status=false;
                            pay('挂号',res.data.registration_id);
                        }
                    }, 'json')
                }else{
                    parent.layer.msg("请勿重复提交");
                }

            })
        function pay(title,registration_id){
            pay_layer_idx = layer.open({
                type: 2,
                title: title +' [ 收费 ]',
                shadeClose: true,
                maxmin:true,
                moveOut: true,
                scrollbar:false,
                shade: 0,//0.8
                area: ['780px','600px'],
                content: '/Registration/registrationGoToPay/registration_id/'+registration_id,
                zIndex: my_layer.zIndex, //重点1
                success: function(layero){
                    my_layer.setTop(layero); //重点2
                },
                cancel: function(index, layero){
                    //询问框
                    parent.layer.confirm('现金是否到账？', {title:'系统提示',
                        btn: ['已到账','待支付'] //按钮
                    }, function(){
                        //保存
                        save_pay_do();
                    }, function(){
                        layer.close(pay_layer_idx);
                        window.location.reload();
                    });
                    return false;
                }

            });
        }
        function save_pay_do(){
            var F = $("#layui-layer-iframe"+pay_layer_idx);
            var cash = F.contents().find("#pay_cash").val();
            var ol = F.contents().find("#pay_ol_input").val();
            var pkg_amount = F.contents().find(".registeredfee_aggregate_amount").text();
            var pkg_ids = F.contents().find("input[name=pkg_ids]").val();
            var pkg_status = F.contents().find("input[name=pkg_status]").val();
            if(ol.length==0)ol=0;
            if(cash.length==0)cash=0;
            if(parseFloat(ol)+parseFloat(cash)<pkg_amount){
                return false;
            }
            $.post('<?php echo U("/Registration/payOrder");?>', {
                pkg_id: pkg_ids,
                ol: ol,
                cash: cash,
                pkg_status: pkg_status
            }, function (res) {
                if (res.status == "success") {
                    remindBox('保存成功');
                    submit_status=true;
                    if(parent.refund_back){
                        parent.refund_back();
                    }else{
                        refund_back();
                    }
                } else {
                    parent.layer.msg(res.msg);
                }
            });
        }
        function show_page(my_layer,url,title,w,h) {
            w=w||'49%';
            h=h||'90%';

            layer_idx = my_layer.open({
                type: 2,
                title: title,
                shadeClose: true,
                maxmin:true,
                moveOut: true,
                scrollbar:false,
                shade: 0,//0.8
                area: [w,h],
                content: url,
                zIndex: my_layer.zIndex, //重点1
                success: function(layero){
                    my_layer.setTop(layero); //重点2
                }
            });

        }

        //时间
        $('#birthday').datetimepicker({
            lang: 'ch',
            timepicker: false,
            format: 'Y-m-d',
            validateOnBlur: false,
            onChangeDateTime: function (e) {
                var birthday = e.dateFormat('Y-m-d');
                var age = getAge(birthday);
                $("#age_label").html('年龄：'+age);
            },
            maxDate:today
        });


        //打开患者选择弹框
        $(document).on('click', '.patientAdd', function () {
            patientPool(_patient_page, pagesize, search);
            $('#patientBomb').show();
            $('body').css('overflow', 'hidden');
            // 取消或者关闭
            $('#patientBomb .bombMask, #patientBomb .fa-remove').one('click', function (event) {
                $(this).closest('#patientBomb').hide();
                $('body').removeAttr('style');
            });
        });
        //获取患者库列表
        function patientPool(patient_page, pagesize, search) {
            $.post('<?php echo U("/Registration/getPatientPool");?>', {
                p: patient_page,
                pagesize: pagesize,
                search: search
            }, function (res) {
                if (res.status == 'success') {
                    if (res.data.count > 0) {
                        var str = '';
                        $.each(res.data.list, function (i, n) {
                            str += '<tr><td><label class="fancy-checkbox">';
                            str += '<input type="checkbox" name="patient_id" value="' + n.patient_id + '">';
                            str += '<span></span></label></td>';
                            str += '<td>' + n.name + '</td>';
                            if (n.sex == 1) {
                                str += '<td>男</td>';
                            } else {
                                str += '<td>女</td>';
                            }
                            str += '<td>' + n.age + '</td>';
                            str += '<td>' + n.mobile + '</td>';
                            str += '<td>' + getdate(new Date(n.update_time * 1000)) + '</td>';
                            str += '</tr>';
                        });
                        _patient_page = res.data.page;
                        $('.patient_box').html(str);
                        if (res.data.pager_str.length > 0) {
                            $(".patient_page").html(res.data.pager_str);
                        } else {
                            $(".patient_page").html('');
                        }
                        PatientPoolChoice();
                        SelectedPatients();
                    } else {
                        $(".patient_box").html('<tr><td colspan="6" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $(".patient_page").html('');
                    }
                } else {
                    remindBox('获取失败');
                    $(".patient_box").html('<tr><td colspan="6" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                    $(".patient_page").html('');
                }
            }, 'json')
        }

        //患者库单选
        function PatientPoolChoice() {
            $('.patient_box tr').each(function () {
                var _self = $(this);
                $(this).find(':checkbox[name=patient_id]').click(function () {
                    if ($(this).is(':checked')) {
                        $(this).attr('checked', true);
                        _self.siblings('tr').find(':checkbox[name=patient_id]').attr('checked', false);
                    } else {
                        $(this).attr('checked', false);
                        _self.siblings('tr').find(':checkbox[name=patient_id]').attr('checked', false);
                    }
                })
            })
        }

        //患者库分页
        $('.patient_page').on('click', '.item', function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if (tag == 'i') {
                if ($(this).hasClass('next')) {
                    _patient_page = parseInt(_patient_page) + 1;
                } else {
                    _patient_page = parseInt(_patient_page) - 1;
                }
            } else {
                _patient_page = parseInt($(this).html());
            }
            search = $("input[name=search]").val() ? $("input[name=search]").val() : '';
            patientPool(_patient_page, pagesize, search);
        })
        //搜索患者库
        $(document).on('input', $("input[name=search]"), function () {
            search = $("input[name=search]").val();
            if (search) {
                _patient_page = 1;
            }
            patientPool(_patient_page, pagesize, search);
        })
        //选中患者
        function SelectedPatients() {
            $(document).on('click', '.SelectedPatients', function () {
                var patient_id = $('input[name=patient_id]:checked').val();
                var _self = $(this);
                $.post('<?php echo U("/Registration/getPatientInfo");?>', {patient_id: patient_id}, function (res) {
                    if (res.status == 'success') {
                        $("input[name=name]").val(res.data.name);
                        $("input[name=birthday]").val(res.data.birthday);
                        var age = getAge(res.data.birthday);
                        $("#age_label").html('年龄：'+age);
                        $('input[name=id_card]').val(res.data.id_card);
                        $("input[name=mobile]").val(res.data.mobile);
                        if (res.data.sex == 1) {
                            $("select[name='sex']").find("option[value='1']").attr('selected', true);
                        } else {
                            $("select[name='sex']").find("option[value='2']").attr('selected', true);
                        }
                        $("textarea[name=address]").val(res.data.address);
                        _self.closest('#patientBomb').hide();
                        $('body').removeAttr('style');
                    } else {
                        remindBox(res.msg);
                    }
                })
            })
        }

        // 时间格式过滤
        function getdate(time) {
            var y = time.getFullYear(),
                    m = time.getMonth() + 1,
                    d = time.getDate();
            return y + "-" + (m < 10 ? "0" + m : m) + "-" + (d < 10 ? "0" + d : d);
        }
        //计算年龄
        function getAge(beginStr) {
            var reg = new RegExp(
                    /^(\d{1,4})(-|\/)(\d{1,2})\2(\d{1,2})(\s)(\d{1,2})(:)(\d{1,2})(:{0,1})(\d{0,2})$/);

            beginStr+=' 01:01:01';

            var beginArr = beginStr.match(reg);

            var d = new Date();
            var endStr = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();

            var endArr = endStr.match(reg);

            var days = 0;
            var month = 0;
            var year = 0;

            days = endArr[4] - beginArr[4];
            if (days < 0) {
                month = -1;
                days = 30 + days;
            }

            month = month + (endArr[3] - beginArr[3]);
            if (month < 0) {
                year = -1;
                month = 12 + month;
            }

            year = year + (endArr[1] - beginArr[1]);

            var yearString = year > 0 ? year + "岁" : "";
            var mnthString = month > 0 ? month + "月" : "";
            var dayString = days > 0 ? days + "天" : "";

            /*
             * 1 如果岁 大于等于1 那么年龄取 几岁
             * 2 如果 岁等于0 但是月大于1 那么如果天等于0
             天小于3天 取小时
             * 例如出生2天 就取 48小时
             */
            var result = "";
            if (year >= 1) {
                result = yearString + mnthString;
            } else {
                if (month >= 1) {
                    result = days > 0 ? mnthString + dayString : mnthString;
                } else {
                    var begDate = new Date(beginArr[1], beginArr[3] - 1,
                            beginArr[4], beginArr[6], beginArr[8], beginArr[10]);
                    var endDate = new Date(endArr[1], endArr[3] - 1, endArr[4],
                            endArr[6], endArr[8], endArr[10]);

                    var between = (endDate.getTime() - begDate.getTime()) / 1000;
                    days = Math.floor(between / (24 * 3600));
                    var hours = Math.floor(between / 3600 - (days * 24));
                    dayString = days > 0 ? days + "天" : "";
                    result = days >= 3 ? dayString : days * 24 + hours + "小时";
                }
            }

            return result;
        }

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