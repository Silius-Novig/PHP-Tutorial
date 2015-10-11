<?php
    require_once 'dir.func.php';

    $path = 'dir';
    $info = readDirectory($path);
    //var_dump($info);
?>

<!-- html/css/div page -->
<html>
<head>

</head>

<body>
    <table width="100%" border="1" cellspacing="0" cellpadding="5" align="center" bgcolor="#abcdef">
        <tr>
            <td>编号</td>
            <td>名称</td>
            <td>类型</td>
            <td>大小</td>
            <td>可读</td>
            <td>可写</td>
            <td>可执行</td>
            <td>创建时间</td>
            <td>修改时间</td>
            <td>访问时间</td>
            <td>操作</td>
        </tr>
        <!-- 遍历文件 -->
        <?php
            if ($info['file']) {
                $i = 1;
                foreach($info['file'] as $val) {
                    $p = $path."/".$val;
        ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $val; ?></td>
                        <td>
                            <?php $pngname = is_file($p) ? "file_ico.png" : "folder_ico.png"; ?>
                            <img src="../img/<?php echo $pngname; ?>" alt = "" title="文件"/>
                        </td>
                        <td><?php echo filesize($p); echo " Bytes"; ?></td>
                        <td><?php if(is_readable($p)) {
                                echo "YES";
                            } else {
                                echo "NO";
                            } ?></td>
                        <td><?php if(is_writeable($p)) {
                                echo "YES";
                            } else {
                                echo "NO";
                            } ?></td>
                        <td><?php if(is_executable($p)) {
                                echo "YES";
                            } else {
                                echo "NO";
                            } ?></td>
                        <td><?php echo filectime($p); ?></td>
                        <td><?php echo filemtime($p); ?></td>
                        <td><?php echo fileatime($p); ?></td>
                        <td>
                            <img src="../img/show.png" alt="" width="30" height="30" title="打开" />
                            <img src="../img/delete.png" alt="" width="30" height="30" title="删除" />
                            <img src="../img/cut.png" alt="" width="30" height="30" title="剪切" />
                            <img src="../img/rename.png" alt="" width="30" height="30" title="重命名" />
                            <img src="../img/copy.png" alt="" width="30" height="30" title="复制" />
                            <img src="../img/edit.png" alt="" width="30" height="30" title="编辑" />
                        </td>
                        <!-- model to copy -->
                        <td><?php ?></td>
                    </tr>
        <?php
                    $i++;
                }
            }
        ?>
    </table>
</body>
</html>
