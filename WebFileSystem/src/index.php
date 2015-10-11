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
                        <td><?php echo strtoupper(filetype($p)); ?></td>
                        <td><?php echo filesize($p); ?></td>
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
