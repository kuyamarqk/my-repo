<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css');?>/style.css">
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<div id="container">
	<div id="body">
		<h1>Contacts</h1>
		<p>
		<table>
				<tr>
					<th>Name</th>
					<th>Contact Number</th>
					
					<th>Action</th>
				</tr>
<?php foreach($myData->result() as $myDatas){?>
				<tr>
					<td><?= $myDatas->first_name;?> <?= $myDatas->last_name;?></td>
					<td><?= $myDatas->number;?></td>
					<td><a href="<?= base_url('main/show')?>/<?= $myDatas->id?>">Show</a> | 
						<a href="<?= base_url('main/edit')?>/<?= $myDatas->id?>">Edit</a> |
						<a href="<?= base_url('main/delete')?>/<?= $myDatas->id?>">Remove</a>
					</td>
				</tr>
<?php }?>
			</table>
		</p>
			
			<p><a href="<?= base_url('main/add')?>">Add new Contact</a></p>
	</div>	
</div>
</body>
</html>
