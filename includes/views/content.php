<div class="wrap">
    <?= __("<h1>Aniversariantes do mês</h1>"); ?>
    <form action="#">
        <div class="tablenav top">
            <div class="alignright actions">
                <select name="gender" class="dropdown_product_cat">
                    <option value="" selected="selected" disabled>Selecione o gênero</option>
                    <option value="all">Todos</option>
                    <option value="male">Homen</option>
                    <option value="female">Mulher</option>
                </select>
                <input type="submit" name="filter_action" class="button" value="Filtrar">
            </div>
        </div>
    </form>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <td class="manage-column column-name"><?= __('Nome do cliente'); ?></td>
                <td class="manage-column"><?= __('Usuario'); ?></td>
                <td class="manage-column "><?= __('Data de aniversário'); ?></td>
                <td class="manage-column column-email"><?= __('Email'); ?></td>
                <td class="manage-column"><?= __('Detalhes'); ?></td>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $customer->display_name ?></td>
                <td><?= $customer->user_nicename ?></td>
                <td><?= $customer->billing_birthdate->get_date()->format('d-m-Y') ?></td>
                <td><?= $customer->user_email ?></td>
                <td>
                    <a class="button tips view" href="<?= esc_url('user-edit.php?user_id='.$customer->ID); ?>">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>