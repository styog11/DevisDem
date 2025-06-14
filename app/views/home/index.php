<?php
$title = 'Dashboard';
ob_start();
?>
<div class="container">
    <div class="new-clients">
        <div class="count">
            <h2><?= $newClientsCount ?></h2>
            <p class="count-number">Nouveaux clients</p>
        </div>
        <div class="new-clients-progress">
            <p class="count-number"><?= $newClientsCount ?> Nouveaux clients</p>
            <p class="count-number"><?= $roundedNewClientsCount ?>%</p>
        </div>
        <div class="h-8px mx-3 w-100 bg-white bg-opacity-50 rounded">
            <div class="bg-white rounded h-8px" role="progressbar" style="width: <?= $roundedNewClientsCount ?>%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    <div class="create-client-container" onclick="redirectTo('/devisdem/public/clients?add_client=1')">
        <i class="fa fa-users" style="font-size:large;"></i>
        <div class="create-client">+Ajouter un client</div>
    </div>
    <div class="recent-clients">
        <h2>Données des Clients Récents</h2>
    </div>
    <div class="clients-list">
        <div class="table-responsive">
            <table id="recent-clients-table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Date de fiche</th>
                    <th>Détails</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($clients) && count($clients) > 0): ?>
                    <?php foreach ($clients as $client): ?>
                        <tr>
                            <td><?= htmlspecialchars($client['name']) ?></td>
                            <td><?= htmlspecialchars($client['tel']) ?></td>
                            <td><span class="badge badge-success fw-bold fs-6" style="color: white;">Nouveau Client</span></td>
                            <td><?= htmlspecialchars($client['date_devis']) ?></td>
                            <td><a href="/devisdem/public/clients/<?= $client['id'] ?>" class="btn btn-gray"><i class="fa fa-arrow-right"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucun client trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table> 
</div>
</div> 
<?php
$content = ob_get_clean();
require_once '../app/views/layouts/main.php';
?>