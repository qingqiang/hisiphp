<form class="layui-form layui-form-pane" action="{:url()}" id="editForm" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">上传文件</label>
        <div class="layui-input-inline upload">
            <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{exts:'zip', accept:'file'}">请上传模块安装包</button>
            <input type="hidden" class="upload-input" name="file">
        </div>
        <div class="layui-form-mid layui-word-aux">只支持ZIP格式的安装包</div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">开始导入</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script>
layui.use(['jquery', 'laydate', 'upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    upload.render({
        elem: '.layui-upload',
        url: '{:url("admin/annex/upload?thumb=no&water=no&group=temp")}'
        ,method: 'post'
        ,before: function(input) {
            layer.msg('文件上传中...', {time:3000000});
        },done: function(res, index, upload) {
            var obj = this.item;
            if (res.code == 0) {
                layer.msg(res.msg);
                return false;
            }
            layer.closeAll();
            $(obj).parents('.upload').find('.upload-input').val(res.data.file);
            $(obj).parents('.upload').find('button').text('文件上传成功');
        }
    });
});
</script>