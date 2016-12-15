<div class="wrap">
    <?= __("<h3>Aniversariantes do mês</h3>"); ?>
    <table class="wp-list-table widefat fixed striped">
        <thead>
            <tr>
                <td class="manage-column column-name">Nome do cliente</td>
                <td class="manage-column">Usuario</td>
                <td class="manage-column ">Data de aniversario</td>
                <td class="manage-column column-email">Email</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{$client->display_name}</td>
                <td>{$client->user_nicename}</td>
                <td>{$birthday->get_date()->format('d-m-Y')}</td>
                <td>{$client->user_email}</td>
            </tr>
        </tbody>
    </table>
</div>