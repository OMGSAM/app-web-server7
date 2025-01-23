<form action="valider_paiement.php" method="POST">
    <table>
        <tr>
            <th>Jeu</th>
            <th>Nombre de parties à payer</th>
            <th>Action</th>
        </tr>
        <?php
        include 'db_connection.php';
        $result = $conn->query("SELECT * FROM Jeu");

        while ($jeu = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$jeu['nomJeu']}</td>";
            echo "<td><input type='number' name='nb_parties[{$jeu['idJeu']}]' value='0'></td>";
            echo "<td><button type='submit' name='jeu_id' value='{$jeu['idJeu']}'>Payer</button></td>";
            echo "</tr>";
        }
        ?>
    </table>
</form>
