<div class="content">
    <h1>Просмотр файлов сервера</h1>
    <div class="has-background-white-ter px-3 py-1 is-size-4">
        Папка: <?php
        $acc_path = "/";
foreach ($path_elements as $n => $v) {
    if ($n == 0) {
        echo '<a href="/">Начало</a>&nbsp;/ ';

    } else {
        if ($v === '') {
            continue;
        }
        $acc_path .= $v . "/";
        echo '<a href="'.$acc_path.'">'.$v.'</a> / ';
    }
}
        ?>
    </div>
    <table class="table is-fullwidth is-size-5">

        <tr>
            <th width="60%">Имя файла или папки</th>
            <th width="20%">Размер</th>
            <th width="20%">Действия</th>
        </tr>

    <?php
    foreach ($files as $file) {
?>
        <tr>
            <td>
                <a href="<?php echo $file['link']; ?>">
                    <?php echo $file['name']; ?>
                </a>
            </td>
            <td class="has-text-right">
                <?php echo format_size($file['size']); ?>
            </td>
            <td>

            </td>
        </tr>
    <?php
    }
    ?>
    </table>
</div>

<a class="button is-primary" href="./?logout=1">Выйти</a>