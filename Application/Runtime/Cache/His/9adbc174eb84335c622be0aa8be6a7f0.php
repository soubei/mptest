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
            <div class="pd10 panel mb20 clearfix">
                <div class="fublBox mr10"><span>药品名称：</span>
                    <input type="text" name="name" class="form-control form-itmeB" placeholder="">
                </div>
                <div class="fublBox mr10"><span>药品分类：</span>
                    <select class="form-control form-itmeB" id="indexClass" name="class_id" onChange="change()">
                        <option>全部</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary r importDrugInfoBtn">导入药品信息</button>
            </div>
            <div class="panel">
                <div class="pd10">
                    <table class="table drugsTable ftc">
                        <thead>
                        <tr>
                            <th>序号</th>
                            <th>药品名称</th>
                            <th>药品分类</th>
                            <th>数量</th>
                            <th>单位</th>
                            <th>规格</th>
                            <!--<th>生产厂家</th>-->
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody id="tbodyApp"></tbody>
                    </table>
                </div>
                <div class="paging mt20 mb20 ftc" id="medicines_pager_box"></div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
<!-- 导入药品信息弹框 start -->
<div class="bombBox" id="importDrugInfoBomb" style="display: none;">
    <div class="bombContent whiteBg importDrugInfoBomb" style="min-width: 600px;">
        <div class="bombTit ftc">导入药品信息<i class="fa fa-remove"></i></div>
        <div class="pd10">
            <div class="clearfix">
                <div class="fublBox mr10"><span>药品名称：</span>
                    <input type="text" name="allName" class="form-control form-itmeB" placeholder="">
                </div>
                <div class="fublBox mr10"><span>药品分类：</span>
                    <select class="form-control form-itmeB" id="allIndexClass" onChange="allChange()">

                    </select>
                </div>
                <button type="button" class="btn btn-primary r importDrug">导入</button>
            </div>
            <table class="table MedicinesTable ftc mt10">
                <thead>
                <tr>
                    <th>
                        <label class="fancy-checkbox checkAllBtn">
                            <input type="checkbox">
                            <span>全选</span>
                        </label>
                    </th>
                    <th>药品名称</th>
                    <th>药品分类</th>
                    <th>数量</th>
                    <th>单位</th>
                    <th>规格</th>
                </tr>
                </thead>
                <tbody id="allTbody"></tbody>
            </table>
            <div class="paging mt20 mb20 ftc" id="all_medicines_pager_box"></div>
        </div>
    </div>
    <div class="bombMask"></div>
</div>
<!-- 导入药品信息弹框 end -->
<!-- END MAIN -->
<!-- Javascript -->
<style>
    #medicines_pager_box{text-align: center;width: 100%;}
    #all_medicines_pager_box{text-align: center;width: 100%;}
    .MedicinesTable td { line-height: 20px!important; }
</style>
<script>
    var _medicines_page=1;
    var _all_medicines_page=1;
    $(function() {
        //首次进入诊所已添加药品列表页面
        $(document).ready(function(){
            $(":input[name='allName']").val('');
            getMedicinesLists('','',1);
        });
        //诊所已添加药品列表搜索
        $(":input[name='name']").bind('input propertychange', function(){
            var name = $(":input[name='name']").val();
            var classId = $("#indexClass option:selected").val();
            getMedicinesLists(name, classId, 1);
        });
        //诊所已添加药品列表分页
        $("#medicines_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _medicines_page=parseInt(_medicines_page)+1;
                }else{
                    _medicines_page=parseInt(_medicines_page)-1;
                }
            }else{
                _medicines_page=parseInt($(this).html());
            }
            var name = $(":input[name='name']").val();
            var classId = $("#indexClass option:selected").val();
            getMedicinesLists(name, classId, _medicines_page);
        });
        //诊所删除已添加药品
        $(document).on('click', '.delete', function(){
            var name = $(":input[name='name']").val();
            var classId = $("#indexClass option:selected").val();
            var rid = $(this).attr('data-rid');
            promptBox('是否确定删除？', function () {
                $.post("<?php echo U('/Medicines/deleteMedicines');?>",
                    {'rid': rid},
                    function (data) {
                        if (data.status == 'success') {
                            getMedicinesLists(name, classId, 1);
                        }
                        remindBox(data.msg);
                    }
                );
            });
        });
        //导入药品信息弹框
        $(document).on('click', '.importDrugInfoBtn', function () {
            $('#importDrugInfoBomb').fadeIn();
            $(":input[name='allName']").val('');
            getAllMedicinesLists('','',1);
            $('.checkAllBtn').find('input').attr('checked',false);
            // 取消或者关闭
            $('#importDrugInfoBomb .bombMask, #importDrugInfoBomb .fa-remove').one('click', function(event) {
                $(this).closest('#importDrugInfoBomb').fadeOut();
                $('body').removeAttr('style');
            });
        });
        //全部药品列表搜索
        $(":input[name='allName']").bind('input propertychange', function(){
            var name = $(":input[name='allName']").val();
            var classId = $("#allIndexClass option:selected").val();
            getAllMedicinesLists(name, classId, 1);
        });
        //全部药品列表分页
        $("#all_medicines_pager_box").on('click','.item',function () {
            var tag = $(this)[0].tagName.toLowerCase();
            if(tag=='i'){
                if($(this).hasClass('next')){
                    _all_medicines_page=parseInt(_all_medicines_page)+1;
                }else{
                    _all_medicines_page=parseInt(_all_medicines_page)-1;
                }
            }else{
                _all_medicines_page=parseInt($(this).html());
            }
            var name = $(":input[name='allName']").val();
            var classId = $("#allIndexClass option:selected").val();
            getAllMedicinesLists(name, classId, _all_medicines_page);
            $('.checkAllBtn').find('input').attr('checked',false);
        });
        //全选
        $(document).on('click', '.checkAllBtn', function (e) {
            if($(e.target).is('input')){
                return;
            }
            if ($(this).find('input').is(':checked')) {
                $(this).closest('table').find('tbody input[type="checkbox"]').click().attr('checked', false);
            } else {
                $(this).closest('table').find('tbody input[type="checkbox"]').click().attr('checked', true);
            }
        });
        //批量导入
        $(document).on('click', '.importDrug', function(){
            var medicinesId =[];
            $('#allTbody input[name="medicinesId"]:checked').each(function(){
                medicinesId.push($(this).val());
            });
            $.post("<?php echo U('/Medicines/addMedicines');?>",
                {"medicinesId":medicinesId},
                function (data) {
                    if (data.status == 'success') {
                        getAllMedicinesLists('','',_medicines_page);
                        getMedicinesLists('','',_all_medicines_page);
                    }
                    remindBox(data.msg);
                    $('.checkAllBtn').find('input').attr('checked',false);
                },
                'json');
        });
    });

    //诊所已添加药品列表药品分类搜索
    function change(){
        var name = $(":input[name='name']").val();
        var classId = $("#indexClass option:selected").val();
        getMedicinesLists(name, classId, 1);
    }
    //加载诊所已添加药品列表
    function getMedicinesLists(name, classId, page){
        $.post("<?php echo U('/Medicines/index');?>",
            { "search": name, 'classId':classId, 'p':page, 'pagesize':10},
            function (data) {
                if (data.status=='success') {
                    if (data.data.medicinesLists.count > 0) {
                        var html = '';
                        $.each(data.data.medicinesLists.list,function (i,item) {
                            var id = i + 1;
                            html += '<tr>' +
                                '<td>'+id+'</td>' +
                                '<td>'+item.medicines_name+'</td>' +
                                '<td>'+item.medicines_class+'</td>' +
                                '<td>'+item.conversion+'</td>' +
                                '<td>'+item.unit+'</td>' +
                                '<td>'+item.conversion+item.unit+'</td>' +
                                //'<td>'+item.producter+'</td>' +
                                '<td>'+timeToDate(new Date(item.create_time * 1000))+'</td>' +
                                '<td><button type="button" class="btn btn-default btn-sm delete" data-rid="'+item.hmr_id+'">删除</button></td>' +
                                '</tr>';
                        });
                        var str = '<select class="form-control form-itmeB" id="indexClass" onChange="change()"><option value="0">全部</option>';
                        $.each(data.data.classLists,function (i,item) {
                            str +='<option value="'+item.did+'"';
                            if (data.data.class_id == item.did) {
                                str += 'selected';
                            }
                            str +='>'+item.dictionary_name+'</option>'
                        });
                        str += '</select>';
                        _medicines_page=data.data.medicinesLists.page;
                        $("#tbodyApp").html(html);
                        $("#indexClass").replaceWith(str);
                        if(data.data.medicinesLists.pager_str.length>0){
                            $("#medicines_pager_box").html(data.data.medicinesLists.pager_str);
                        }else{
                            $("#medicines_pager_box").html('');
                        }
                    } else {

                        $("#tbodyApp").html('<tr><td colspan="9" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $("#medicines_pager_box").html('');
                    }
                } else {

                    remindBox(data.msg);
                }
            },
            "json");
    }
    //全部药品列表药品分类搜索
    function allChange(){
        var name = $(":input[name='allName']").val();
        var classId = $("#allIndexClass option:selected").val();
        getAllMedicinesLists(name, classId, 1);
    }
    //加载全部药品列表
    function getAllMedicinesLists(name, classId, page){
        $.post("<?php echo U('/Medicines/medicinesLists');?>",
            { "search": name, 'classId':classId, 'p':page, 'pagesize':10},
            function (data) {
                if (data.status=='success') {
                    if (data.data.medicinesLists.count > 0) {
                        var html = '';
                        $.each(data.data.medicinesLists.list,function (i,item) {
                            html += '<tr>' +
                                '<td>' +
                                '<label class="fancy-checkbox">' +
                                '<input type="checkbox" name="medicinesId" value="'+item.medicines_id+'">' +
                                '<span></span>' +
                                '</label>' +
                                '</td>' +
                                '<td>'+item.medicines_name+'</td>' +
                                '<td>'+item.medicines_class+'</td>' +
                                '<td>'+item.conversion+'</td>' +
                                '<td>'+item.unit+'</td>' +
                                '<td>'+item.conversion+item.unit+'</td>' +
                                '</tr>';
                        });
                        var str = '<select class="form-control form-itmeB" id="allIndexClass" onChange="allChange()"><option value="0">全部</option>';
                        $.each(data.data.classLists,function (i,item) {
                            str +='<option value="'+item.did+'"';
                            if (data.data.class_id == item.did) {
                                str += 'selected';
                            }
                            str +='>'+item.dictionary_name+'</option>'
                        });
                        str += '</select>';
                        _medicines_page=data.data.medicinesLists.page;
                        $("#allTbody").html(html);
                        $("#allIndexClass").replaceWith(str);
                        if(data.data.medicinesLists.pager_str.length>0){
                            $("#all_medicines_pager_box").html(data.data.medicinesLists.pager_str);
                        }else{
                            $("#all_medicines_pager_box").html('');
                        }
                    } else {
                        $("#allTbody").html('<tr><td colspan="7" height="30" align="center" class="f_red" >暂无数据</td></tr>');
                        $("#all_medicines_pager_box").html('');
                    }
                } else {
                    remindBox(data.msg);
                }
            },
            "json");
    }
</script>
<!-- END WRAPPER -->

<script type="text/javascript">
    if(parent.endLoad){
        parent.endLoad();
    }
</script>
</body>
</html>