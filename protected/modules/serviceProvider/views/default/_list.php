<?php
$name = LanguageHelper::changeDB($data->name, $data->name_en);
?>
<ul style="display: inline-block;">
    <li>
        <a href="/serviceProvider/default/detail/id/<?php echo $data->id; ?>/type/<?php echo $_GET['id']; ?>">
            <img src="/file/logo/<?php echo $data->logo; ?>" height="100">
        </a>
    </li>
    <li>
        <a href="/serviceProvider/default/detail/id/<?php echo $data->id; ?>/type/<?php echo $_GET['id']; ?>">
            <label><?php echo $name; ?></label>
        </a>
    </li>
</ul>