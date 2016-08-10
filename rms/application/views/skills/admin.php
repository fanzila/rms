		</div>
		<div data-role="content">
			<div data-role="collapsible-set" data-inset="true">
				<div data-role="collapsible">
					<h1>Create a sponsoring link</h1>
					<?$attributes = array('id' => "sponsorship", 'name' => "sponsorship");
					echo form_open("skills/save", $attributes);?>
						<table width="100%" style="border: 1px solid #dedcd7; margin-top:10px" cellpadding="8">
							<tr>
								<td colspan="2" style="background-color: #fbf19e;">Sponsorship to create :
								</td>
							</tr>
							<tr>
								<td width="6%"><label for="sponsor" id="label">Sponsor :</label></td>
								<td width="94%">
									<select style="background-color:#a1ff7c" name="sponsor" id="sponsor" data-inline="true" data-theme="a" required>
										<option value="">Sponsor</option>
										<?foreach ($users as $user) {?>
											<option value="<?=$user->id?>" <? if(isset($form['user']) AND $form['user']==$user->id) { ?> selected <? } ?>><?=$user->first_name?> <?=$user->last_name?>
											</option>
										<? } ?>
									?></select>
								</td>
							</tr>
							<tr>
								<td><label for="user" id="label">Trainee:</label></td>
								<td>
									<select style="background-color:#a1ff7c" name="user" id="user" data-inline="true" data-theme="a" required>
										<option value="">Trainee</option>
										<?foreach ($users as $user) {?>
											<option value="<?=$user->id?>" <? if(isset($form['user']) AND $form['user']==$user->id) { ?> selected <? } ?>><?=$user->first_name?> <?=$user->last_name?>
											</option>
										<? } ?>
									?></select>
								</td>
							</tr>
							<tr><td>. . . . . .</td><td><p>Ensuite se débrouiller pour avoir la sélection des skills du parrain de disponible pour sélectionner ce qu'il doit enseigner.</p></td></tr>
						</table>
						<?$attributes = array('id' => "sub", 'name' => "submit");
						echo form_submit($attributes, 'Save');?>
					</form>

					<script>
					$(document).ready(function() {

						var $form = $('#sponsorship');

						$('#sub').on('click', function() {
							$form.trigger('submit');
							return false;
						});

						$form.on('submit', function() {

							var sponsor = $('#sponsor').val();
							var user = $('#user').val();

							if(sponsor == '') {
								alert('Please fill sponsor.');
							} else if(user == 0){
								alert('Please indicate who has to learn.');
							} else if(user == sponsor){
								alert('You have to choose two different people.');
							}else {
								$.ajax({
									url: $(this).attr('action'),
									type: $(this).attr('method'),
									data: $(this).serialize(),
									dataType: 'json',
									success: function(json) {
										if(json.reponse == 'ok') {
											alert('Saved!');
										} else {
											alert('WARNING! ERROR at saving : '+ json.reponse);
										}
									}
								}).done(function(data) {
										window.location = "/skills/index/"+user;
								    }).fail(function(data) {
								    	alert('WARNING! ERROR at saving!');
								    });
							}
							return false;
						});
					});
					</script>
				</div><!--/collapsible-->
				<div data-role="collapsible">
					<h1>Sponsors map</h1>
					<?foreach ($skills_records as $skills_record) {?>
						<div data-inset="true">
						<?=$skills_record->sponsorname?> -> <?=$skills_record->username?>
						</div>
					<?}?>
				</div>
				<div data-role="collapsible">
					<h1>Skills map</h1>
					<div data-role="collapsible-set" data-inset="true">
							<?foreach ($skills as $skill) {?><!--Affichage des skills générales-->
								<?$check=0;foreach($skills_items as $skills_item){
									if($skills_item->s_name == $skill->name) $check+=1;
									if($check == 1) break;
								}?>
								<?if($check==1){?>
									<div data-role="collapsible" data-inset="true">
										<h4><?=$skill->name?></h4>
										<div data-inset="true">
											<?foreach ($skills_categories as $category) {?><!--Affichage des Catégories-->
												<?$check=0;foreach($skills_items as $skills_item){
													if($skills_item->c_name == $category->name) $check+=1;
													if($check == 1) break;
												}?>
												<?if($check==1){?>
													<div data-role="collapsible" data-inset="true">
														<h4><?=$category->name?></h4>
														<div data-inset="true">
															<?foreach($users as $user){
																$validated=0;
																foreach ($skills_items as $skills_item) {
																	if($skills_item->c_name == $category->name && $skills_item->id_user == $user->id){
																		if($skills_item->checked == true){
																			$validated=1;
																		}else{
																			$validated=0;
																			break;
																		}
																	}
																}
																if($validated == 1){
																	?><div data-inset="true"><?=$user->username?></div><?
																}
															}?>
														</div><!-- /insert for sub categories -->
													</div><!-- /collapsible -->
												<?}?>
											<?}?>
										</div><!-- /inset for categories -->
									</div><!-- /collapsible -->
								<?}?>
							<?}?>
						</div><!-- /skills filter -->
				</div>
				<div data-role="collapsible">
					<h1>Skills by person</h1>
					<select style="background-color:#a1ff7c" name="sponsor" id="sponsor" data-inline="true" data-theme="a" onchange="getContent(this)">
						<option value="">Sponsor</option>
						<?foreach ($users as $user) {?>
							<option value="<?=$user->id?>" <? if(isset($form['user']) AND $form['user']==$user->id) { ?> selected <? } ?>><?=$user->first_name?> <?=$user->last_name?>
							</option>
						<? } ?>
					?></select>
					<div data-role="collapsible-set" data-inset="true">
					</div>
				</div>
				<script type="text/javascript">
					function getContent(select) {
						var test = select.value;
						if(test!="")window.location = "/skills/index/"+test;
					}
				</script>
			</div><!--/collapsible set-->
		</div><!-- /content -->
	</div><!-- /page -->
