
<table class="table-responsive table-striped table-bordered basic_record ">
    <caption><?= $table_name ?></caption>
<?php foreach ($menu as $mitem) { ?>
    <tr>
        <td><?= $mitem->id ?></td>
        <td><?= $mitem->home ?></td>
        <td><?= $mitem->news ?></td>
        <td><?= $mitem->about ?></td>
        <td><?= $mitem->contacts ?></td>
        <td><?= $mitem->sign_in ?></td>
        <td><?= $mitem->sign_out ?></td>
        <td><?= $mitem->arm ?></td>
        <td><?= $mitem->eng ?></td>
        <td><?= $mitem->rus ?></td>
        <td><?= $mitem->lang_id ?></td>
<?php } ?>
    </tr>
</table>
