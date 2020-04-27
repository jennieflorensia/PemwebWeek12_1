<table id="tblMovie" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th> </th>
			<th> Title </th>
			<th> Year </th>
			<th> Director </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach($data as $row)
			{
				$base_url = base_url();

				$detail = $base_url."index.php/MoviePage/ShowDetail";
				$id = $row['MovieID'];
				echo "<tr>";
					echo "<td>" .$row['MovieID'] ."</td>";
					echo "<td>" .$row['Title'] ."</td>";
					echo "<td>" .$row['Year'] ."</td>";
					echo "<td>" .$row['Director'] ."</td>";
					echo "<td>";
						echo "<a href='".base_url("index.php/MoviePage/ShowDetail?id=$id")."'
								style='margin-right:10px;color:rgb(0,200,255);'>";
							echo "<button class='btn'>";
								echo "<span class='glyphicon glyphicon-search'></span>";
							echo "</button>";
						echo "</a>";
						echo "<a href='".base_url("index.php/MoviePage/EditMovie/$id")."'
								style='margin-right:10px;color:rgb(255,215,0);'>";
							echo "<button class='btn'>";
								echo "<span class='glyphicon glyphicon-edit'></span>";
							echo "</button>";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
			}
		?>
	</tbody>
	<tfoot>
		<td> </td>
		<td> Title </td>
		<td> Year </td>
		<td> Director </td>
		<td> Action </td>
	</tfoot>
</table>