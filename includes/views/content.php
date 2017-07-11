<div class="wrap">
    <?= __("<h3>Aniversariantes do mês</h3>"); ?>
    <?php if (!empty(array_shift($customers))): ?>
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
                        <td><?= $customer->get_first_name() . ' ' . $customer->get_last_name(); ?></td>
                        <td><?= $customer->get_username(); ?></td>
                        <td><?= $customer->get_meta('billing_birthdate'); ?></td>
                        <td><?= $customer->get_email(); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h2>Nenhum cliente faz aniversário este mês.</h2>
    <?php endif; ?>
</div>