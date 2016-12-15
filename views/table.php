<div class="wrap">
    <?= __("<h3>Aniversariantes do mês</h3>"); ?>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <td class="manage-column column-name"><?= __('Nome do cliente'); ?></td>
                <td class="manage-column"><?= __('Usuario'); ?></td>
                <td class="manage-column "><?= __('Data de aniversário'); ?></td>
                <td class="manage-column column-email"><?= __('Email'); ?></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{$list->display_name}</td>
                <td>{$list->user_nicename}</td>
                <td>{$list->billing_birthdate->get_date()->format('d-m-Y')}</td>
                <td>{$list->user_email}</td>
            </tr>
        </tbody>
    </table>
</div>