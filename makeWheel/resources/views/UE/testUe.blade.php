<!DOCTYPE html>
<html>
<head>
    @include('vendor.UEditor.head')
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
</head>
<body>
<section id="ue">
    <script id="container" name="content" type="text/plain">
        富文本编辑器
    </script>
    <input type="button" value="save">
    <script id="save" name="content" type="text/plain">
        保存内容
    </script>
</section>

<script type="text/javascript">
    //初始化UEdit
    var ue = UE.getEditor('container');
    var ue_save = UE.getEditor('save');
    ue.ready(function () {
        //此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
        //ue.execCommand('serverparam', '_token', TOKEN);
        ue.setContent('test');
    });

    $('#ue input[type=button]').on('click',function(){
        var data = ue.getContent();
        console.log(data);
        ue_save.setContent(data);
    });


</script>
</body>
</html>
