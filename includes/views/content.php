<div class="wrap">
    <h1 class="wp-heading-inline">Aniversariantes</h1>
    <button class="page-title-action" id="birthdate_celebrate_send_mails">Eviar Emails</button>
    <hr class="wp-header-end">
    <ul class="subsubsub">
        <ul class="subsubsub">
            <li class="all"><a href="" class="current">Tudo <span class="count"><?= count($customers); ?></span></a> |</li>
            <li class="publish"><a href="">Homens <span class="count"><?= count($malesQuantity) ?></span></a> |</li>
            <li class="publish"><a href="">Mulheres <span class="count"><?= count($femaleQuantity) ?></span></a></li>
        </ul>
    </ul>
    <?php if (!empty($customers)): ?>
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