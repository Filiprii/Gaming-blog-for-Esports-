<page-users>
	<user-profile>
		<table>
			<tr>
				<td>Korisničko ime</td>
				<td><?= $row['users_username'] ?></td>
			</tr>
			<tr>
				<td>Lozinka</td>
				<td><?= $row['users_password'] ?></td>
			</tr>
			<tr>
				<td>Datum registracije</td>
				<td><?= $row['users_date'] ?></td>
			</tr>
			<tr>
				<td>Pol</td>
				<td><?= $row['users_gender'] ?></td>
			</tr>
		</table>
		
	</user-profile>
</page-users>





