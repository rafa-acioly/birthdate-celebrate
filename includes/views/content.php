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
        <?php foreach ($customers as $customer): ?>
            <tr>
                    <td><?= $customer->display_name ?></td>
                    <td><?= $customer->user_nicename ?></td>
                    <td><?= $customer->billing_birthdate->get_date()->format('d-m-Y') ?></td>
                    <td><?= $customer->user_email ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>