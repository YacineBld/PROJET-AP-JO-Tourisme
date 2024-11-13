    <h2> Liste des services </h2>

    <table class="table-affiche">
        <tr>
            <td> Id Service </td>
            <td> Libellé </td>
            <td> Adresse </td>
            <td> Prix (moyen) </td>
            <td> Téléphone </td>
            <td> Email </td>
            <td> Id type-services </td>
            <td> Opérations </td>
        </tr>

        <?php
            foreach($lesServices as $unService)
            {
                echo 
                "<tr>
                    <td>".$unService["idservice"]."</td>
                    <td>".$unService["libelle"]."</td>
                    <td>".$unService["adresse"]."</td>
                    <td>".$unService["prix"]."</td>
                    <td>".$unService["tel"]."</td>
                    <td>".$unService["email"]."</td>
                    <td>".$unService["idtypeservices"]."</td>";
            

           // Vérifier si l'utilisateur est un professionnel (role == 'pro')
        if (isset($_SESSION['role']) && $_SESSION['role'] == 'clientPro') {
            echo "<td>";
            echo "<a class='img-dif' href='index.php?page=2&action=sup&idservice=".$unService['idservice']."'>";
            echo "<img src='images/Delete.png' height='30' width='30' alt='Supprimer'>";
            echo "</a>";
            echo "<a class='img-dif' href='index.php?page=2&action=edit&idservice=".$unService['idservice']."'>";
            echo "<img src='images/Edit.png' height='30' width='30' alt='Modifier'>";
            echo "</a>";
            echo "</td>";
        } else {
            // Si l'utilisateur n'est pas un professionnel, ne pas afficher les options de modification/suppression
            echo "<td>Aucune action disponible</td>";
        }

        echo "</tr>";
    }

        ?>
    </table>
</main>
